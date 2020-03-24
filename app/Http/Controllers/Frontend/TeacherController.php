<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FrontendTeacher;
use Validator;
use DataTables;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.frontend.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = FrontendTeacher::query()->orderBy('created_at', 'desc');
        return DataTables::eloquent($model)->addIndexColumn()->toJson();
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
            'name' => 'required|max:150',            
            'quote' => 'required|max:150',            
            'expertise' => 'required|max:150',            
            'photo' => 'required',            
        ]);
  
        if ($v->fails()) {
          $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{
            $location = 'image/asset/teacher/'.$request->photoname;
  
            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);            
  
            FrontendTeacher::create([
              'name' => $request->name,
              'expertise' => $request->expertise,
              'photo' => $location,              
              'quote' => $request->quote,              
            ]);
  
          $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
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
    public function updated(Request $request)
    {
     $teacher = FrontendTeacher::where('id', $request->id)->first();

      $v = Validator::make($request->all(), [
          'name' => 'required|max:130',          
          'quote' => 'required|max:130',          
          'expertise' => 'required|max:130',          
      ]);

      if ($v->fails()) {
        $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
      }else{
          if ($request->photo != null) {
            unlink(public_path($teacher->photo));
            $location = 'image/asset/teacher/'.$request->photoname;

            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
            $teacher->update([
              'photo' => $location
            ]);
          }

          FrontendTeacher::where('id', $request->id)->update([
            'name' => $request->name,
            'quote' => $request->quote,         
            'expertise' => $request->expertise,         
          ]);

        $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
      }


      echo json_encode($arrayName);
    }

    public function update(Request $request, $id)
    {
      $arrayName = array('respon' => 'success', 'msg' => 'Deleted', 'image' => true, 'data' => $request->all());
      for ($i=0; $i < count($request->id) ; $i++) {
        $teacher = FrontendTeacher::where('id', $request->id[$i])->first();
        unlink(public_path($teacher->photo));
        FrontendTeacher::where('id', $request->id[$i])->delete();
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
