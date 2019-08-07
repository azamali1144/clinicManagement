<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    // Show Dashboard Page
    public function index(Request $request)
    {

        $n_users = User::all()->count();
        $n_roles = Role::all()->count();
        $n_perms = Permission::all()->count();
        $n_logged = Auth::user()->name;

        $data = [
            'n_users' => $n_users,
            'n_roles' => $n_roles,
            'n_perms' => $n_perms,
            'n_logged' => $n_logged
        ];

        if (Auth::check()) {
            if(count(Auth::user()->roles) > 0){
                $request->session()->put('role', Auth::user()->roles[0]->name);
            }
        }

        return view('admin.dashboard', $data);
    }

}
