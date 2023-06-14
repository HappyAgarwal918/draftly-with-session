<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Session;

class contacts extends Controller
{
     public function index(Request $req)
     {
     	$user = new contact;

    	$user -> name = $req -> name;
    	$user -> email = $req -> email;
    	$user -> subject = $req -> subject;
    	$user -> message = $req -> message;
    	

        $user -> save();

        Session::flash('success', 'Here is your success message');

     return Redirect() -> back();
     }
}
