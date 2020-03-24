<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppSetting;
use Validator;
use DataTables;

class AppSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.app-setting.index');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = AppSetting::query()->orderBy('created_at', 'desc');
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
        'name' => 'required|max:150',
        'tagline' => 'required|max:150|',        
        ]);

        if ($v->fails()) {
        $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{      
        $appsetting = AppSetting::find($request->id);
        $appsetting->update([
            'name' => $request->name,
            'tagline' => $request->tagline,                
        ]);      

        if($request->photo != null){
            if($appsetting->logo != null){
                unlink(public_path($appsetting->logo));
            }

            $location = 'image/asset/'.$request->photoname;

            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);       
            $appsetting->update(['logo' => $location]);
        }

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
