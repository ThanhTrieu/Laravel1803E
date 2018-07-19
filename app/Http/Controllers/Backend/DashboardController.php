<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // truyen du lieu ra view
        $data = [];
        $data['lstInfoST'] = [
            [
                'msv' => 1,
                'name' => 'NVA',
                'gender' => 1,
                'email' => 'test@gmail.com',
                'money' => 2300000
            ],
            [
                'msv' => 2,
                'name' => 'NTB',
                'gender' => 0,
                'email' => 'test123@gmail.com',
                'money' => 4500000
            ],
            [
                'msv' => 3,
                'name' => 'NVC',
                'gender' => 1,
                'email' => 'test12@gmail.com',
                'money' => 2000000
            ]
        ];
        return view('admin.dashboard.dashboard',$data);
    }

    public function demo(Request $request, $bacdsd){
        return $bacdsd;
        //return $request->id;
    }

    public function sum(Request $request){
        $number1 = $request->num1;
        $number2 = $request->num2;

        $data = [];
        $data['sum'] = 0;
        $data['mess']= '';

        if(is_numeric($number1) && is_numeric($number2)){
            $data['sum'] = $number1 + $number2;
            $data['mess']= 'ok';
        } else {
            $data['mess']= 'err';
        }
        echo json_encode($data);
    }
}
