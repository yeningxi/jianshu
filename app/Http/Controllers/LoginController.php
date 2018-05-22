<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login/index');
    }

    public function login(){

        $this->validate(request(),[
           'name'=>'required',
           'password'=>'required'
        ]);
        $user = request(['name','password']);
        //dd($user);
        $is_rem = boolval(request('is_remember'));
        if(\Auth::attempt($user,$is_rem)){
            return redirect('posts');
        }else{
            return redirect()->back()->withErrors('用户名密码不匹配');
        }

    }

    public function logout(){
        \Auth::logout();
        return redirect('login');
    }

}
