<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\registeration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class registerations extends Controller
{
    //
     public function index(Request $req)
     {
     	$user = new registeration;

    	$user -> name = $req -> name;
    	$user -> email = $req -> email;
    	$user -> password = $req -> password;
    	$user -> terms = $req -> terms;
    	

        $user -> save();

        

     return Redirect() -> back();
     }

}
