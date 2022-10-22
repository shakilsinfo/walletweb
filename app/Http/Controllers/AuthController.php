<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Interfaces\AuthInterface;

class AuthController extends Controller
{
    private AuthInterface $authRepository;
    function __construct(AuthInterface $authRepository){
        $this->authContainer = $authRepository;
    }
    public function userLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => '*Email field is required.',
            'password.required' => '*Password field is required.',
        ]);
        $response = $this->authContainer->checkLogin($request->all());
        if ($response['status'] == 200) {
            
            return redirect('/dashboard');
        }else{
            return back()->with('error', $response['message']);
        }
    }

    public function userLogout(){
        if (session()->has('token')) {
            $token = session()->get('token');
            $response = Http::withToken($token)->post($this->authContainer->logout());
            session()->pull('name');
            session()->pull('token');
            session()->pull('email');
            session()->pull('currency');
        }
        return redirect("/");
    }
}
