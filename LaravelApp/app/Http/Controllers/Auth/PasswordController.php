<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailLogInCode; 
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class PasswordController extends Controller
{

    

    public function showForgotPassword()
    {
        if (Auth::check()) {
            return redirect('/');
        } 
        else {
            
            return view('auth.forgotpassword.forgotpassword');
        }
    }

    public function showEnterTempCode(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        } 
        else {
            $email = $request->session()->get('email');
            return view('auth.forgotpassword.entertempcode',['email' => $email]); // or any other redirect
        }
    }

    public function showResetPassword(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        } 
        else {
            $email = $request->session()->get('email');
            return view('auth.forgotpassword.registrationentercode',['email' => $email]); // or any other redirect
        }
    }

    public function generateCode()
    {
        $token = str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
        return $token;
    }

    private function sendEmail($userEmail, $code)
    {
 
        $data = ['token' => $code];
        Mail::to($userEmail)->send(new EmailLogInCode($data));
    }

    public function emailCode(Request $request)
    {
        // !!some validation here if input is empty, error message 
        $code = $this->generateCode();
        $email = $request->input('email');

        $this->sendEmail($email, $code);
        // !!save to db
        // !!have some king of timer then delete from temp
        // !!have an ajax to delete temp at close of tab


        // route to enter login code muna!
        return Redirect::route('entertempcode.form')->with('email', $request->input('email'));
    }

    // public function verifyTemporaryLoginCode(Request $request)
    // {
    //     // Assuming you have stored the generated temporary login code in the database
    //     $storedCode = // Retrieve the stored code from your storage mechanism (e.g., database)

    //     // Retrieve the submitted login code from the form
    //     $submittedCode = $request->input('temporary_code');

    //     // Verify the submitted temporary login code against the stored code
    //     $codeIsValid = $storedCode === $submittedCode;

    //     if ($codeIsValid) {
    //         // If the code is valid, manually log in the user
    //         // You might want to replace the following with your actual user retrieval logic
    //         $user = // Retrieve the user associated with this temporary code

    //         // Log in the user
    //         Auth::login($user);

    //         // Redirect based on user role (similar to your existing logic)
    //         return redirect()->route('home.form');
    //     } else {
    //         // If the code is not valid, handle the invalid code

    //         // You can redirect back to the login form with an error message
    //         return redirect()->route('login.form')->withErrors(['login' => 'Invalid login code']);
    //     }
    // }

    public function changePassword(Request $request)
    {

    }
}
