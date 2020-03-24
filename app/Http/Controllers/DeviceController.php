<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use Validator;
use DataTables;
use Str;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.device.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $model = Device::query()->with('user')->orderBy('created_at', 'desc');
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
          'device_name' => 'required|max:150',
          'serial_number' => 'required|max:150',
          'version' => 'required|max:150',
          'release_year' => 'required|max:150',
          'photo' => 'required',
          'price' => 'required|numeric|',
          'input_count' => 'required|numeric|max:1000',
      ]);

      if ($v->fails()) {
        $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
      }else{
        for ($i=0; $i < $request->input_count ; $i++) {
          $location = 'image/asset/device/0'.$request->photoname;
          $location2 = 'image/asset/device/'.$i.''.$request->photoname;

          move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
          copy(public_path('/'.$location), $location2);

          Device::create([
            'device_name' => $request->device_name,
            'serial_number' => Str::random(10),
            'version' => $request->version,
            'release_year' => $request->release_year,
            'photo' => $location2,
            'price' => $request->price,
            'status' => 'On stock',
          ]);
        }

        $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
      }


      echo json_encode($arrayName);
    }

    public function updated(Request $request)
    {
      $v = Validator::make($request->all(), [
          'device_name' => 'required|max:150',
          'serial_number' => 'required|max:150',
          'version' => 'required|max:150',
          'release_year' => 'required|max:150',
          'price' => 'required|numeric|',
      ]);

      if ($v->fails()) {
        $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
      }else{
          $device = Device::find($request->id);
          if ($request->photo != null) {
            unlink(public_path($device->photo));
            $location = 'image/asset/device/'.$request->photoname;

            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
            $device->update([
              'photo' => $location
            ]);
          }

          $device->update([
            'device_name' => $request->device_name,
            'version' => $request->version,
            'release_year' => $request->release_year,
            'price' => $request->price,            
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

      $arrayName = array('respon' => 'success', 'msg' => 'Deleted', 'image' => true, 'data' => $request->all());
      for ($i=0; $i < count($request->id) ; $i++) {
        $device = Device::find($request->id[$i]);
        unlink(public_path($device->photo));
        $device->delete();
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
