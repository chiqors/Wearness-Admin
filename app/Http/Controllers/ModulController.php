<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modul;
use Validator;
use DataTables;
use File;
use Zipper;
use Str;


class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.modul.index');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Modul::query()->orderBy('created_at', 'desc');
        return Datatables::eloquent($model)->addIndexColumn()->toJson();
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
            'title' => 'required|max:150',
            'desc' => 'required|',                                    
            'type' => 'required|',
            'file' => 'required|',            
            'filename' => 'required|',            
            'status' => 'required|',            
            'premium' => 'required'
        ]);
  
        if ($v->fails()) {
          $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{          
            $location = 'modulss/'.$request->filename;
            $locationExtract = 'modulss/extra/'.$request->filename;            

            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
            if($request->type == 'Flip pdf'){
                Zipper::make($location)->extractTo($locationExtract);                           
            }

            Modul::create([
              'title' => $request->title,
              'desc' => $request->desc,
              'type' => $request->type,
              'file' => $request->filename,
              'status' => $request->status,
              'premium' => $request->premium
            ]);
  
          $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
        }
  
  
        echo json_encode($arrayName);
    }

    public function updated(Request $request)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'desc' => 'required|',                                    
            'type' => 'required|',            
            'status' => 'required|',            
        ]);
  
        if ($v->fails()) {
          $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{  
            $modul = Modul::where('id', $request->id)->first();
            
            if($modul->type != $request->type && $request->file == 'null'){               
                $error = array('Media change' => 'You change media please fill the file form', );
                $arrayName = array('respon' => 'error', 'msg' => $error, 'image' => true, 'data' => $request->all());
            }else{
                if($request->file != 'null'){
                    $location = 'modulss/'.$request->filename;
                    $locationExtract = 'modulss/extra/'.$request->filename;           
                    unlink(public_path('modulss/'.$modul->file));
    
    
                    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
                    if($request->type == 'Flip pdf'){                
                        Zipper::make($location)->extractTo($locationExtract); 
                    }
    
                    if($modul->type == 'Flip pdf'){
                        File::deleteDirectory(public_path('modulss/extra/'.$modul->file));
                    }
                    
                    $modul->update([
                        'file' => $request->filename                    
                    ]);
                }            
    
                $modul->update([
                  'title' => $request->title,
                  'desc' => $request->desc,
                  'type' => $request->type,
                  'status' => $request->status,
                  'premium' => $request->premium
                ]);
                $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
            }
            
  
        }
  
  
        echo json_encode($arrayName);
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
        //
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
        $arrayName = array('respon' => 'success', 'msg' => 'Deleted', 'image' => true, 'data' => $request->all());
        for ($i=0; $i < count($request->id) ; $i++) {
            $modul = Modul::where('id', $request->id[$i])->first();
            $location = 'modulss/'.$request->filename;
            $locationExtract = 'modulss/extra/'.$request->filename;           
            unlink(public_path('modulss/'.$modul->file));
            if($modul->type == 'Flip pdf'){
                File::deleteDirectory(public_path('modulss/extra/'.$modul->file));
            }
            Modul::find($modul->id)->delete();
        }
        echo json_encode($arrayName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
