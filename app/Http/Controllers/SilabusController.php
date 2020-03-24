<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Silabus;
use Validator;
use DataTables;
use File;
use Zipper;

class SilabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.silabus.index');                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Silabus::query()->orderBy('created_at', 'desc');
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
        $silabus = Silabus::where('id', $request->id)->first();

        $v = Validator::make($request->all(), [
            'title' => 'required|max:150',            
        ]);

        if ($v->fails()) {
            $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{
         
            if ($request->photo != null) {
                // unlink(public_path($instructor->photo));
                $location = 'silabuss/'.$request->photoname;
                $locationExtract = 'silabuss/extra/'.$request->photoname;

                if($silabus->file != null){
                    File::deleteDirectory(public_path('silabuss/extra/'.$silabus->file));
                    unlink(public_path('silabuss/'.$silabus->file));
                }

                move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
                Zipper::make($location)->extractTo($locationExtract);
                $silabus->update([
                    'file' => $request->photoname                    
                ]);
            }

            Silabus::where('id', $request->id)->update([
                'title' => $request->title,
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
    public function update(Request $request, $id)
    {
        //
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
