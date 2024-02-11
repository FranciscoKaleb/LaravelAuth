<?php
// app/Http/Controllers/SampleController.php

namespace App\Http\Controllers;

use App\Models\UserInfo; // Make sure to import the UserInfo model
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function getAll()
    {
        // Retrieve all data from the userinfo table
        $userInfo = UserInfo::all();

        // Echo the data (for demonstration purposes; normally, you'd pass it to a view)
        foreach ($userInfo as $user) {
            echo "ID: {$user->id}, First Name: {$user->first_name}, Last Name: {$user->last_name}, ";
            echo "Birth Date: {$user->birth_date}, Gender: {$user->gender}, Phone Number: {$user->phone_number}<br>";
        }

        // Alternatively, you can return the data as JSON
        // return response()->json($userInfo);
    }
    
    public function getParticular(){
        // Retrieve only the first_name and last_name columns from the userinfo table
        $userInfo = UserInfo::select('first_name', 'last_name')->get();

        // Echo the data (for demonstration purposes; normally, you'd pass it to a view)
        foreach ($userInfo as $user) {
            echo "First Name: {$user->first_name}, Last Name: {$user->last_name}<br>";
        }
        // Alternatively, you can return the data as JSON
        // return response()->json($userInfo);
    }

    function passToView(){
         // Retrieve only the first_name and last_name columns from the userinfo table
         $userInfo = UserInfo::select('first_name', 'last_name')->get();

         // Pass the data to the 'sample.index' view
         return view('sample', ['userInfo' => $userInfo]);
    }
}
?>