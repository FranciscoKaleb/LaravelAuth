<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
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

            return view('user.admin.home', ['userInfo' => $user_info]); 
            // NOTE: the key part is the variable that can be used in the blade view
        
            //$userProducts = $userInfo->userProducts;
            //return view('home', ['user' => $user_credentials, 'userInfo' => $userInfo]);
            
        } 
        else {
            return redirect()->route('login.form'); 
        }
    }


}
