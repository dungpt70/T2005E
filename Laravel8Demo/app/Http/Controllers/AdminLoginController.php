<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // hien thi ra form login cua admin
    // get
    public function getLoginForm(){
        if (Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view("admin.auth.login");
    }
    // thuc hien xac thuc tai khoan nguoi dung admin
    //post
    public function login(Request $request){
        // validate
        
        // xac thuc
        $cre = $request->only(['username', 'password']);
        if (Auth::guard('admin')->attempt($cre)){
            // thong bao thanhcong
            return redirect()->route('admin.dashboard');
        }
        else{
            return back()->withErrors([
                'username' => 'Tên đăng nhập không khớp.',
                'password' => 'Mật khẩu không đúng',
            ]);
        }
    }
    
    // logout -> post
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.getlogin');
    }
}