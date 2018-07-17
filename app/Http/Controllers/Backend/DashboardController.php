<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return "Hello controller";
    }

    public function demo(Request $request, $bacdsd){
        return $bacdsd;
        //return $request->id;
    }
}
