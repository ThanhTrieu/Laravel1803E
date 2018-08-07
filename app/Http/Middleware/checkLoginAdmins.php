<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class checkLoginAdmins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private function getSessionUserAdmin()
    {
        $username = Session::get('userAdmin');
        return $username;
    }
    private function getSessionIdAdmin()
    {
        $id = Session::get('idAdmin');
        $id = is_numeric($id) ? $id : 0;
        return $id;
    }

    public function handle($request, Closure $next)
    {
        // kiem tra login chua
        $user = $this->getSessionUserAdmin();
        $id = $this->getSessionIdAdmin();
        if($id <= 0 || $user == ''){
            return redirect()->route('admin.showForm');
        }
        return $next($request);
    }
}
