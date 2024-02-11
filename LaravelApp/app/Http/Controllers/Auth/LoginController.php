<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function showView()
    {
        if (Auth::check()) {
            return redirect('/');
        } 
        else {
            //return redirect()->route('registration.form'); // or any other redirect
            return view('auth.login.login');
        }
    }

    

    public function loginPost(Request $request)
    {
        $loginField = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        $credentials = [
            $loginField => $request->input('login'),
            'password' => $request->input('password'), // Bcrypt-hashed password
        ];

        if (Auth::attempt($credentials))
        {
           
            // $user_credentials = Auth::user(); // Retrieve the authenticated user
            // $user_info = $user_credentials->userInfo;
            // $user_role = $user_info->roles;

            // if ($user_role->role_ === 'admin') 
            // {
            //     return redirect()->route('admin.form'); 
            //     // NOTE: the key part is the variable that can be used in the blade view
            // }    

            // elseif ($user_role->role_ === 'user') 
            // {
            //     //return view('home', ['userInfo' => $user_info]);
            //     return redirect()->route('home.form');
            // }


            return redirect()->route('dashboard.form');
        }

        return redirect()->route('login.form')->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    

}

