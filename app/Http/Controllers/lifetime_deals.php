<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lifetime_deal;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Hash;

class lifetime_deals extends Controller
{
     public function index(Request $req)
     {
     	$user = new lifetime_deal;

    	$this->validate($req,[
         'email'=>'required',
      ]);

      $user -> email = $req -> email;            
        $user -> save();

        $email = $req -> email;
        $check_user = User::where('email',$email)->first();
        if(empty($check_user)){
          $user = User::create([
            'email' => $email,
             'password' => Hash::make('password'),
        ]);

        $user->sendEmailVerificationNotification();
        }

      return view('payment');
    }
}
