<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\DevTable;
use Auth;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blog'] = Blog::orderBy('created_at', 'desc')->get();
        $data['dev'] = DevTable::first();
        return view('page.blog.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            "title" => "required|max:150",
            "content" => "required",
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else{
            $image = $request->file('cover');
            $new_name = rand(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path("upload/image/blog"), $new_name);
            
            $content=$request->input("content");
            $title=$request->input("title");
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName("img");
            
            foreach($images as $k => $img){
            $data = $img->getAttribute("src");
            list($type, $data) = explode(";", $data);
            list(, $data)      = explode(",", $data);
            $data = base64_decode($data);
            $image_name= "/upload/image/blog" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute("src");
            $img->setAttribute("src", $image_name);
            }
            
            $content = $dom->saveHTML();
            $summernote = new Blog;
            $summernote->title = $title;
            $summernote->content=$content;
            $summernote->cover = 'upload/image/blog/'.$new_name;
            $summernote->user_id = Auth::user()->id;
            $summernote->save();
            
            return back()->with('success', 'Data berhasil di tambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blog'] = Blog::find($id);
        return view('page.blog.edit', $data);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            "title" => "required",
            "content" => "required",
            'cover' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $blog = Blog::find($id);

        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }else{

            if($request->cover != null){
                $image = $request->file('cover');
                $new_name = rand(). '.' . $image->getClientOriginalExtension();
                $image->move(public_path("upload/image/blog"), $new_name);

                if($blog->cover != null){
                    unlink(public_path($blog->cover));
                }

                $location = 'upload/image/blog/'.$new_name;

                $blog->update(['cover' => $location]);
            }
            
            $content=$request->input("content");
            $title=$request->input("title");
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName("img");
            
            foreach($images as $k => $img){
                $data = $img->getAttribute("src");                
                if ($data[20] == 6) {                    
                list($type, $data) = explode(";", $data);
                list(, $data)      = explode(",", $data);
                $data = base64_decode($data);
                $image_name= "/upload/image/blog/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute("src");
                $img->setAttribute("src", $image_name);
                }
            }
            
            $content = $dom->saveHTML();            
            $blog->update(['title' => $title, 'content' => $content]);

            
            return back()->with('success', 'Data berhasil di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arrayName = array('respon' => 'success', 'msg' => 'Deleted', 'reload' => 'true');
                
        $blog = Blog::find($id);
        if($blog->cover !=null){
            unlink(public_path($blog->cover));            
        }
        $blog->delete();

        echo json_encode($arrayName);
    }
}
