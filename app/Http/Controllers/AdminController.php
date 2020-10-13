<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->input('admin_email');
        $admin_password = $request->input('admin_password');
        $result = DB::table('admin')->where('email', $admin_email)->where('password', $admin_password)->first();

        if($result) {
            Session::put('admin_name', $result->first_name.' '.$result->last_name);
            Session::put('admin_id', $result->admin_id);
//            return Redirect::to('/admin/dashboard');
            return redirect()->route('admin.dashboard');
        } else {
            Session::put('message', 'Email addres / username and password do not match.');
            return Redirect::to('/admin');
        }
    }

    public function logOut()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');

    }
}
