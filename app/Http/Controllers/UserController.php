<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UserController extends Controller{

	public function create(){

		return view('users.create');
	}


	public function show(User $user){

       return view('users.show', compact('user'));


	}

	//注册提交
	public function store(Request $request){

		$this->validate($request, [
           'name' => 'required|max:50',
           'email'=> 'required|email|unique:users|max:225',
           'password' => 'required|confirmed|min:6'
		]);

		//保存用户信息
		
		$user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
		]);
		session()->flash('success','欢迎，您将在这里开启一段新的旅程');
		return redirect()->route('users.show', [$user]);
	}

}
