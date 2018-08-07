<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.product');
    }

    public function add()
    {
        return view('admin.product.add');
    }

    public function handleadd(Request $request)
    {
        dd($request);
    }
}
