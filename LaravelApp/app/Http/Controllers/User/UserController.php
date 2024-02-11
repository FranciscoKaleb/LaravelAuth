<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCredentials;


class UserController extends Controller
{
    public function index()
    {
        $user_credentials = Auth::user(); // Retrieve the authenticated user
        $user_info = $user_credentials->userInfo;
        $user_role = $user_info->roles;

        if ($user_role->role_ === 'admin') 
        {
            return view('user.admin.home', ['userInfo' => $user_info]);
        }
        else
        {
            return view('user.regular.home', ['userInfo' => $user_info]);
        }
    }
    public function showUserProfile($user_name)
    {
        // Retrieve user by username
        $user = UserCredentials::where('user_name', $user_name)->firstOrFail();
        
        //if user = auth:user()
            // then show view with every info and personal functionality(update, add, delete)
        //else if auth:user->role_ == admin
            // show everything
        //else 
            //show what the user set as public

        // Return a view with the user data
        return view('user.show', compact('user'));
    }

    public function checkUserName(Request $request)
    {
        // Logic to check if the username exists
        $usernameExists = UserCredentials::where('user_name', $request->input('username'))->first(); // Perform your logic here
        if($usernameExists)
        {
            return 'true';
        }
        else
        {
            return 'false';
        }
        //return response()->json(['exists' => $usernameExists]);
        
    }

    public function checkEmail(Request $request)
    {
        // Logic to check if the email exists
        $emailExists = UserCredentials::where('email', $request->input('email'))->first(); // Perform your logic here
        if($emailExists)
        {
            return 'true';
        }
        else
        {
            return 'false';
        }
        //return response()->json(['exists' => $usernameExists]);
        
    }

    
}
