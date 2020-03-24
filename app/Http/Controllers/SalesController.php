<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Device;
use DataTables;
use Validator;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['device'] = Device::where('status', 'On stock')->get();
        return view('page.sales.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Sales::query()->orderBy('created_at', 'desc')->with('device')->has('device');
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
            'buyer' => 'required|max:150',
            'type' => 'required|',                                    
            'device' => 'required|',                                    
            'date' => 'required|',
        ]);
  
        if ($v->fails()) {
          $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{          
            Sales::create([
              'buyer' => $request->buyer,              
              'type' => $request->type,
              'device_id' => $request->device,
              'date' => $request->date,              
            ]);          

            Device::find($request->device)->update([
                'status' => 'On sold'
            ]);
  
          $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'reload' => 'true', 'data' => $request->all());
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
        $arrayName = array('respon' => 'success', 'msg' => 'Deleted', 'reload' => 'true');
        for ($i=0; $i < count($request->id) ; $i++) {
            $sale = Sales::find($request->id[$i]);
            $device = Device::find($sale->device_id);
            if ($device->status == 'On sold') {
                $device->update([
                    'status' => 'On stock'
                ]);
            }
            $sale->delete();
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
