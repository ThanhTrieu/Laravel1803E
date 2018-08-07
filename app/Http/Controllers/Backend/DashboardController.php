<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// su dung model
use App\Models\Admin;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // lay ra session da dang nhap thanh cong
        $user = Session::get('userAdmin');
        // $user = $_SESSION['userAdmin'] ?? '';
        return view('admin.dashboard.dashboard');
    }
}
