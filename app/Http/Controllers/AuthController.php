<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {

        $response = Http::post('http://127.0.0.1:8001/api/login/',[
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        $data = $response->json();

        if(isset($data['error'])){
            return back()->with('error',$data['error']);
        }

        Session::put('user_id',$data['user_id']);
        Session::put('email',$data['email']);

        return redirect('/poll');

    }

    public function register(Request $request)
    {

        $response = Http::post('http://127.0.0.1:8001/api/register/',[
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        $data = $response->json();

        if(isset($data['error'])){
            return back()->with('error',$data['error']);
        }

        return redirect('/login')->with('message','Register success');

    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}