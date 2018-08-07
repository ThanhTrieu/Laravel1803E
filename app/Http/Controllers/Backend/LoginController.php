<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class LoginController extends Controller
{
    public function login()
    {
        // load vao 1 view
        return view('admin.login.login');
    }

    public function logout(Request $request)
    {
        // can huy cac session da tao ra tu login
        $request->session()->forget('idAdmin');
        $request->session()->forget('userAdmin');
        $request->session()->forget('emailAdmin');
        $request->session()->forget('rolelAdmin');
        return redirect()->route('admin.showForm');
    }

    public function handleLogin(Request $request, Admin $admin){
        $email = $request->txtEmail;
        $pass  = $request->txtPass;
        if($email == '' || $pass == ''){
            return redirect()->route('admin.showForm',['state'=>'fail']);
        } else {
            //dd($admin->checkLoginAdmin($email,md5($pass)));
            $infoAdmin = $admin->checkLoginAdmin($email,md5($pass));

            if(isset($infoAdmin->id) && $infoAdmin->id > 0){
                // luu vao session
                $request->session()->put('idAdmin', $infoAdmin->id);
                $request->session()->put('userAdmin', $infoAdmin->username);
                $request->session()->put('emailAdmin', $infoAdmin->email);
                $request->session()->put('rolelAdmin', $infoAdmin->role);
                // $_SESSION['idAdmin'] = $infoAdmin->id;
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.showForm',['state'=>'err']);
            }
        }
    }
}
