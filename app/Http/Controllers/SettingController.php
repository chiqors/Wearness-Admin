<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Hash;
use App\User;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.setting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required|unique:users,email,'.Auth::user()->id.'|max:150',            
        ]);


        if ($v->fails()) {        
            return back()->withErrors($v);
        }else{
            User::find(Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);     

            return back()->with('success', 'Profile updated');
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
        $user = User::find($id);
        $v = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
            'password_now' => ['required', function ($attribute, $value, $fail) use ($user) {
            if (!\Hash::check($value, $user->password)) {
                return $fail(__('The current password is incorrect.'));
            }
            }],
        ]);        

        if ($v->fails()) {        
            return back()->withInput()->withErrors($v);
        }else{
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'Password has change');
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
        //
    }
}
