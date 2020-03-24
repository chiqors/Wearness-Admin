<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProject;
use Validator;
use DataTables;

class CategoryProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.category-project.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = CategoryProject::query()->orderBy('created_at', 'desc');
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
            'category' => 'required|max:150',
            'desc' => 'required|',                                    
        ]);
  
        if ($v->fails()) {
          $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{          
            CategoryProject::create([
                'category' => $request->category,
                'desc' => $request->desc,
            ]);          
  
          $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
        }
  
  
        echo json_encode($arrayName);
    }

    public function updated(Request $request)
    {
        $v = Validator::make($request->all(), [
            'category' => 'required|max:150',
            'desc' => 'required|',                                    
        ]);
  
        if ($v->fails()) {
          $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{          
            CategoryProject::where('id', $request->id)->update([
                'category' => $request->category,
                'desc' => $request->desc,            
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
            $device = CategoryProject::find($request->id[$i]);
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
