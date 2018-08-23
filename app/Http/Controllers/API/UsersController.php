<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use \Firebase\JWT\JWT;

class UsersController extends Controller
{
    private $tokenKey = 'lphp1803e';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JWT $jwt)
    {
        $token = $request->header('Authorization');
        // kiem tra token co hop le hay ko
        $decodeToken = $jwt->decode($token, $this->tokenKey, array('HS256'));
        $mess = [];
        $mess['mess'] = '';

        if($decodeToken){
            $data = $request->data;
            $user = $data['user'];
            $pass = $data['pass'];

            $mess['mess'] = DB::table('admins')->Where([
                'username' => $user,
                'password' => md5($pass)
            ])-> first();
        }
        return response()->json($mess);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $idData = $request->header('id');
        $data = DB::table('admins')->where('id',$idData)->first();
        return response()->json($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request, JWT $jwt)
    {
        $token = $request->header('Authorization');
        // kiem tra token
        $decodeToken = $jwt->decode($token, $this->tokenKey, array('HS256'));
        $mess = [];
        $mess['result'] = '';
        if($decodeToken){
            $id = $request->header('id');
            $id = is_numeric($id) ? $id : 0;
            if($id > 0){
                $mess['result'] = DB::table('admins')->where('id', $id)->delete();
            }
        }
        return respone()->json($mess);
    }
}
