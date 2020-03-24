<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VerifyUser;
use App\VerifyMail;
use App\Customer;
use App\Device;
use App\DevTable;
use Validator;
use DataTables;
use Hash;
use Mail;
use App\Mail\ActivationEmail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['app'] = DevTable::first();
        return view('page.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $model = Customer::query()->orderBy('created_at', 'desc');
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
          'religion' => 'required|max:150',
          'job' => 'required|max:150',
          'gender' => 'required|max:150|in:Male,Female',
          'address' => 'required|max:150|',
          'institution' => 'required|max:150|',
          'birth_date' => 'required|max:150|',
          'status' => 'required|max:150|in:On,Off',
      ]);

      if ($v->fails()) {
        $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
      }else{
        $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make('123456'),
        ]);
        $verifyUser = VerifyUser::create([
          'user_id' => $user->id,
          'token' => sha1(time())
        ]);

        Mail::to($user->email)->send(new ActivationEmail($user));

        Customer::create([
          'user_id' => $user->id,
          'name' => $request->name,
          'email' => $request->email,
          'phone_number' => $request->phone_number,          
          'religion' => $request->religion,
          'job' => $request->job,
          'gender' => $request->gender,
          'address' => $request->address,
          'institution' => $request->institution,
          'birth_date' => $request->birth_date,
          'status' => $request->status,
          'added' => 'admin',
        ]);

        if($request->photo != null){
          $location = 'image/asset/customer/'.$request->photoname;

          move_uploaded_file($_FILES["photo"]["tmp_name"], $location);       
          Customer::where('user_id', $user->id)->update(['photo' => $location]);
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
      $arrayName = array('respon' => 'success', 'msg' => 'Deleted', 'image' => true, 'data' => $request->all());
      for ($i=0; $i < count($request->id) ; $i++) {
        $customer = Customer::where('id', $request->id[$i])->first();
        // if($customer->photo != null){
        //   unlink(public_path($customer->photo));
        // }        
        Device::where('user_id', $customer->user_id)->update(['status' => 'Delete', 'user_id' => null]);
        User::where('id', $customer->user_id)->delete();
      }
      echo json_encode($arrayName);
    }

    public function updated(Request $request)
    {
      $customer = Customer::where('id', $request->id)->first();

      $v = Validator::make($request->all(), [
        'name' => 'required|max:150',
        'email' => 'required|unique:users,email,'.$customer->user_id.'|max:150',        
        'phone_number' => 'required|max:150',
        'religion' => 'required|max:150',
        'job' => 'required|max:150',
        'gender' => 'required|max:150|in:Male,Female',
        'address' => 'required|max:150|',
        'institution' => 'required|max:150|',
        'birth_date' => 'required|max:150|',
        'status' => 'required|max:150|in:On,Off',
    ]);

    if ($v->fails()) {
      $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
    }else{
      $user = User::where('id', $customer->user_id)->update([
        'name' => $request->name,
        'email' => $request->email,        
      ]);      
      
      Customer::where('id', $request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,          
        'religion' => $request->religion,
        'job' => $request->job,
        'gender' => $request->gender,
        'address' => $request->address,
        'institution' => $request->institution,
        'birth_date' => $request->birth_date,
        'status' => $request->status,
      ]);

      if($request->email != $customer->email){
        $verifyUser = VerifyUser::create([
          'user_id' => $customer->user_id,
          'token' => sha1(time())
        ]);

        $users = User::find($customer->user_id);

        Mail::to($request->email)->send(new ActivationEmail($users));
      }

      if($request->photo != null){
        if($customer->photo != null){
          unlink(public_path($customer->photo));
        }

        $location = 'image/asset/customer/'.$request->photoname;

        move_uploaded_file($_FILES["photo"]["tmp_name"], $location);       
        Customer::where('id', $request->id)->update(['photo' => $location]);
      }

      $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
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
