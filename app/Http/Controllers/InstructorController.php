<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Instructor;
use Validator;
use DataTables;
use Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.instructor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $model = Instructor::query()->orderBy('created_at', 'desc');
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
          'email' => 'required|unique:users|max:150',
          'phone_number' => 'required|max:150',
          'rekening_number' => 'required|max:150',
          'photo' => 'required',
          'gender' => 'required|max:150|in:Male,Female',
          'religion' => 'required|max:150|',
          'last_education' => 'required|max:150|',
          'birth_date' => 'required|max:150|',
          'status' => 'required|max:150|in:On,Off',
      ]);

      if ($v->fails()) {
        $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
      }else{
          $location = 'image/asset/instructor/'.$request->photoname;

          move_uploaded_file($_FILES["photo"]["tmp_name"], $location);

          $user = User::create([
              'name' => $request->name,
              'email' => $request->email,
              'level' => 2,
              'verified' => 2,
              'password' => Hash::make('123456'),
          ]);

          Instructor::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'rekening_number' => $request->rekening_number,
            'photo' => $location,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'last_education' => $request->last_education,
            'birth_date' => $request->birth_date,
            'status' => $request->status,
          ]);

        $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
      }


      echo json_encode($arrayName);
    }

    public function updated(Request $request)
    {
      $instructor = Instructor::where('id', $request->id)->first();

      $v = Validator::make($request->all(), [
          'name' => 'required|max:150',
          'email' => 'required|unique:users,email,'.$instructor->user_id.'|max:150',
          'phone_number' => 'required|max:150',
          'rekening_number' => 'required|max:150',
          'gender' => 'required|max:150|in:Male,Female',
          'religion' => 'required|max:150|',
          'last_education' => 'required|max:150|',
          'birth_date' => 'required|max:150|',
          'status' => 'required|max:150|in:On,Off',
      ]);

      if ($v->fails()) {
        $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
      }else{

          $user = User::where('id', $instructor->user_id)->update([
              'name' => $request->name,
              'email' => $request->email,
          ]);

          if ($request->photo != null) {
            unlink(public_path($instructor->photo));
            $location = 'image/asset/instructor/'.$request->photoname;

            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
            $instructor->update([
              'photo' => $location
            ]);
          }

          Instructor::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'rekening_number' => $request->rekening_number,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'last_education' => $request->last_education,
            'birth_date' => $request->birth_date,
            'status' => $request->status,
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
        $instructor = Instructor::where('id', $request->id[$i])->first();
        unlink(public_path($instructor->photo));
        User::where('id', $instructor->user_id)->delete();
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
