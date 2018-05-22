<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register/index');
    }

    public function register(){
        $this->validate(request(),[
            'name'=>'required|max:30|min:3|unique:users,name',
            'email'=>'required|max:30|min:3|unique:users,email|email',
            'password'=>'required|min:6|max:20|confirmed'
        ]);

        User::create([
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password'))
        ]);

        return redirect('/login');

    }

}
