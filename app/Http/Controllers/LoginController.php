<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{


    public function showLoginPage() {
        if(!Auth::check()) {
            return view("admin/login/index");
        } else {
            return Redirect::to('/admin/');
        }
    }


    public function processLogin(Request $request) {
        if(!Auth::check()) {
            $credentials = array(
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            );
            $rules = array(
                'email' => 'required',
                'password' => 'required',
            );
            $validator = Validator::make($credentials, $rules);
            if ($validator->fails()) {
                Session::flash('message', 'Username or password is empty!');
                return Redirect::to('/')->withErrors($validator)->withInput();
            } else {
                if (Auth::attempt($credentials)) {
                    if(Auth::user()->role == 'ADMIN'){
                        return Redirect::to('/admin/');
                    }
                } else {
                    Session::flash('message', 'Invalid Credentials!');
                    return Redirect::to('/');
                }
            }

        } else {
            return Redirect::to('/admin/');
        }
    }



    public function processLogout() {
        Auth::logout();
        Session::flash('message', 'You are successfully logged out.');
        return Redirect::to('/');
    }

}
