<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use App\Models\UserCredentials;
use App\Models\UserTemp;
use App\Models\UserRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Support\Facades\Mail;
use App\Mail\EmailConfirmation; 
use Illuminate\Support\Facades\View;

class RegistrationController extends Controller
{
    // [1] function to return view (GET request)
    public function showView()
    {
        if (Auth::check()) {
            return redirect('/');
        } 
        else {
            return view('auth.registration.registration'); // or any other redirect
        }

    }
    
    public function showConfirm(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        } 
        else {
            $email = $request->session()->get('email');
            return view('auth.registration.registrationentercode',['email' => $email]); // or any other redirect
        }
    }
    
    public function register(Request $request)
    {

       // create [1] info, [2] credentials, [3] role

            // [1]
            $user_info = UserInfo::create();

            $dataToInsert = UserTemp::where('email', $request->input('email'))->first();

            if ($dataToInsert) {
                // [2]
                UserCredentials::create([
                    'user_id' => $user_info->id,
                    'email' => $dataToInsert->email,
                    'user_name' => $dataToInsert->user_name,
                    'password' => $dataToInsert->password,
                ]);

                // [3] 
                $defaultRole = 'user';
                $roleData = [
                    'user_id' => $user_info->id,
                    'role_' => $defaultRole, 
                ];
                UserRoles::create($roleData);

            } else {
                
            }
    }

    public function saveToTemp(Request $request)
    {
        
        $checkEmail = UserCredentials::where('email', $request->input('email'))->first();// 1st validation 
        $checkUsername = UserCredentials::where('user_name', $request->input('username'))->first();
        if($checkEmail){
            return Redirect::route('registration.form')
            ->withErrors(['email' => 'The email '."'".$request->input('email')."'".' is already used']);
        } 
        if($checkUsername){
            return Redirect::route('registration.form')
            ->withErrors(['username' => 'The username ' .$request->input('username').' is already used']);
        }
        $request->validate([// 2nd validation
            'email' => 'required|string|max:100',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:50',
        ]);

        try
        {
            $token = str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);//generate code
            $tempData = [
                'email' => $request->input('email'), 
                'user_name' => $request->input('username'), 
                'password' => bcrypt($request->input('password')), 
                'confirmation_code' =>  $token,
            ];
            UserTemp::create($tempData);//save to temp table
            $this->sendConfirmationEmail($request->input('email'), $token);//send code to email
            return Redirect::route('confirm.form')->with('email', $request->input('email'));// redirect to another form
        }
        catch(\Exception $e)
        {
            \Log::error('Email sending failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['email' => 'Email not sent successfully. Please check your email address.']);
        }

    }


    private function sendConfirmationEmail($userEmail, $code)
    {
 
        $data = ['token' => $code];
        Mail::to($userEmail)->send(new EmailConfirmation($data));
    }

    public function confirmCode(Request $request)
    {
        //!!!!!!!! RUN A TIMER HERE, IF RUNSOUT then delete from temp
        //!!!!!!!! send ajax if tab is closed to delete email
        //!!!!!!!! turn line of codes into function inside save to temp

        $code = $request->input('confirmation_code');
        $email = $request->input('email');

        // look into temporary table if the email and code match
        $userTemp = UserTemp::where('email', $email)
                   ->where('confirmation_code', $code)
                   ->first();
        if ($userTemp) 
        {
            $this->register($request);
        } 
        else 
        {
            return Redirect::route('confirm.form')->with('email', $request->input('email'))->withErrors('wrong confirmation code');
        } 
        UserTemp::where('email', $request->input('email'))->delete();
        return view('auth.registration.regsuccess');       
    }


}


