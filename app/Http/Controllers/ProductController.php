<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // xu ly do du lieu ra view
        $data = [];
        $data['allPd'] = DB::table('products')->get()->toArray();
        return view('product.index',$data);
    }
}
