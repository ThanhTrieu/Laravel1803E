<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function __construct()
    {
        // se khai bao - su dung middleware o day
        //$this->middleware('checkLoginUser:users');
        $this->middleware('checkLoginUser:admin')->only(['check','abc']);
        //$this->middleware('checkLoginUser:users')->except('check');
    }
    public function show()
    {
        return "Hello word";
    }

    public function check()
    {
        return "Demo middleware Controller";
    }
    public function abc(){
        return "abc";
    }
}
