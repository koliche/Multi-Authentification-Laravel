<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }

    public function Dashboard(){
        return view('admin.index');
    }

    public function Login(Request $request){
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email'=> $check['email'] , 'password' => $check['password']])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully ');
        }else{
            return back()->with('error','Invailed Email Or Password');
        }
    }
}
