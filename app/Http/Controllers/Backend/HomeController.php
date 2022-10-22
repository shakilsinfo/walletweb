<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Alert;
class HomeController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }

    public function userList(){

        $userList = User::where('user_type','customer')->get();

        return view('backend.userList',compact('userList'));
    }
    public function userDelete($id)
    {
        $findUser = User::findOrFail($id);
        
        try {
            $bug = 0;
            $findUser->delete();
        } catch (\Exception $e) {
            $bug = $e->getMessage();
        }
        if ($bug === 0) {
            Alert::success('success', 'User Successfully deleted.');
            return redirect()->route('userList');
        } else {
            Alert::error('error', $bug);
            return redirect()->back();
        } 
    }
}
