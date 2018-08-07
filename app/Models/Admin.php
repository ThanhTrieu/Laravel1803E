<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // dinh nghia model su dung cho bang nao du lieu nao
    protected $table = 'admins';

    public function checkLoginAdmin($email, $password)
    {
        $infoAdmin = Admin::where(['email'=> $email,'password'=> $password,'status' => 1])->first();
        return $infoAdmin;
    }
}
