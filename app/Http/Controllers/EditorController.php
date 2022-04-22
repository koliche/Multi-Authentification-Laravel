<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function EditorIndex(){
        return view('editor.editor_login');
    }


    public function EditorDashboard(){
        return view('editor.index');
    }   

    public function EditorLogin(Request $request){
        $check = $request->all();
        if (Auth::guard('editor')->attempt(['email'=> $check['email'] , 'password' => $check['password']])){
            return redirect()->route('editor.dashboard')->with('error','Editor Login Successfully ');
        }else{
            return back()->with('error','Invailed Email Or Password');
        }
    }

    public function EditorLogout(){
        Auth::guard('editor')->logout();
        return redirect()->route('editor_login_form')->with('error','Editor Logout Successfully !');
    }
}
