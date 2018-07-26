<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// su dung model
use App\Models\Admin;
use App\Models\Product;
use App\Models\Size;

class DashboardController extends Controller
{
    public function join(){
        //$pd = Product::find(1);
        //$data = $pd->sizes()->with('products');
        //$data = (array) $data;
        //echo "<pre>";
        //print_r($data);
        //dd($data);
        $data = Product::find(1)->with('sizes')
                       ->join('sizes','products.sizeid','=','sizes.id')
                       ->get();
        //$data = (array) $data;
        //dd($data['id']);
        // foreach($data as $key => $item){
        //     print_r($item->id);
        //     echo "<br/>";
        // }
        $test = Size::find(1)->products()->get();
        dd($test);
    }
    public function orm()
    {
        $data = Admin::all();
        // DB::table('admins')->get();
        //dd($data);
        // foreach ($data as $key => $val) {
        //     echo $val->username;
        //     echo "<br/>";
        // }
        $data2 = Admin::find(1);
        // DB::table('admins')->where('id',1)->first();
        //dd($data2->username);
        $data3 = Admin::where(['role'=> -1, 'status' => 1])->
                    orWhere('password','12345')
                    ->get();
        //dd($data3);
        $data4 = Admin::max('id');
        // BD::table('admins')->avg('id');
        // BD::table('admins')->select("");
        //dd($data4);
        $like = Admin::where('username','LIKE','%abc%')->get();
    }
    public function index()
    {
        //$admin = DB::table('admins')->get()->toArray();
        // get() : lay tat ca du lieu ra
        // select * from admins;
        // $admin = DB::table('admins')->get();
        // foreach ($admin as $key => $val) {
        //     echo $val->username;
        //     echo "<br/>";
        // }
        // die;
        //dd($admin);
        //select chi ra chinh xac du lieu cua cac truong can lay
        $admin = DB::table('admins')->select('username','password')->get();
        $admin2 = DB::table('admins')->select('username','password')->first();
        $admin3 = DB::table('admins')
                    ->select('username','password')
                    ->where('username','LIKE','%abc%')
                    //->where(['id' => 1,'status' => 1])
                    //->orWhere('role',-1)
                    //->where('status',1)
                    ->first();
        //dd($admin3->username);
        /*
        DB::table('admins')->insert([
            [
                'username' => 'test',
                'password' => 'sasas'
            ],
            [
                'username' => 'test',
                'password' => 'sasas'
            ]
        ]);
        */

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
