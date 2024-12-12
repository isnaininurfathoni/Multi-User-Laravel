<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    
    function index(){
        return view('login');

    }

    function login(Request $request){
        
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email Wajib diisi',
            'password.required'=>'Password Wajib diisi'
        ]);

        $logininfo=[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($logininfo)){
            if(Auth::user()->role == 'administrator'){
                return redirect('/featurs');
            }elseif(Auth::user()->role == 'teknisi'){
                return redirect('/featurs');
            }elseif(Auth::user()->role == 'superuser'){
                return redirect('/featurs');
            }
        }else{
            return redirect('/')->withErrors('Email dan Password tidak terdaftar')->withInput();
        }

        
    }

    function logout()
        {
            Auth::logout();
            return redirect('');
        }
    function register(){
        return view('register');
    }

    function create(Request $request){
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
        ],[
            'name.required'=>'Nama wajib di isi',
            'email.required'=>'Email Wajib diisi',
            'email.unique'=>'Email sudah terdaftar,gunakan email lain',
            'password.required'=>'Password Wajib diisi',
            'password.min'=>'Minimal Password 8 karakater',

        ]);
        
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);

        $logininfo=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($logininfo)){
            if(Auth::user()->role == 'administrator'){
                return redirect('/featurs');
            }elseif(Auth::user()->role == 'teknisi'){
                return redirect('/featurs');
            }elseif(Auth::user()->role == 'superuser'){
                return redirect('/featurs');
            }
        }else{
            return redirect('/')->withErrors('Email dan Password tidak sesuai')->withInput();
        }
    }


}
