<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('layouts.login');
    }

    public function login(Request $request){
        try{
            return $this->authenticate($request->email,$request->password);
        }catch(\Exception $e){
            return redirect('login')->with('error', $e->getMessage());
        }
    }

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function authenticate($email, $password)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        } else if (Auth::attempt(['username' => $email, 'password' => $password])) {
            return redirect('/');
        } else{
            return redirect('login')->with('error', 'auth.failed');
        }
    }

}
