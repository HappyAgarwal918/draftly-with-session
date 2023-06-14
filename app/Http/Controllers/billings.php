<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\billing;
use App\Http\Controllers\Controller;
use DB;
use Session;

class billings extends Controller
{
     public function index(Request $req)
    {
    	 $user = new billing;


    $user -> first_name = $req -> first_name;
    $user -> last_name = $req -> last_name;
    $user -> company = $req -> company;
    $user -> address = $req -> address;
    $user -> city = $req -> city;
    $user -> zip = $req -> zip;
    $user -> c_id = $req -> c_id;
    $user -> s_id = $req -> s_id;
    $user -> phone = $req -> phone;
    $user -> unique_id = $req -> unique_id; 
    
      $user -> save();


      return view('payment');

    }

}