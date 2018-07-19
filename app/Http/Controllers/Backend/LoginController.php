<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        // load vao 1 view
        return view('admin.login.login');
    }

    public function handleLogin(Request $request){
        // echo "<pre>";
        // print_r($request);
        //$_POST['txtEmail'] ?? 'sally';
        //dd($request->input('txtEmail'));
        //dd($request->all());
        // dd($request->txtEmail);
        // if($request->has('txtEmail')){
        //     $input = $request->except('txtPass');
        //     dd($input);
        // } else {
        //     dd('Not found');
        // }
        $email = $request->txtEmail;
        $pass  = $request->txtPass;
        if($email == '' || $pass == ''){
            return redirect()->route('admin.showForm',['state'=>'fail']);
        } else {
            if($email === 'admin@gmail.com' && $pass === '123'){
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.showForm',['state'=>'err']);
            }
        }
    }
}
