<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RegularController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showView()
    {
        if (Auth::check()) {
            $user_credentials = Auth::user(); // Retrieve the authenticated user
            $user_info = $user_credentials->userInfo;

            return view('user.regular.home', ['userInfo' => $user_info]);
            
            //$userProducts = $userInfo->userProducts;
            //return view('home', ['user' => $user_credentials, 'userInfo' => $userInfo]);
            
        } 
        else {
            return redirect()->route('login.form'); 
        }
    }


}
