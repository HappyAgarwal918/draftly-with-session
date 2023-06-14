<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\custom_clause;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class custom_clauses extends Controller
{
     public function index(Request $req)
     {
     	$user = new custom_clause;

     	$user -> title = $req -> title;
     	$user -> text = $req -> text;
     	$user -> unique_id = $req -> unique_id;           
        $user -> save();

        return view('custom-clause-home');
     }

      public function destroy($id)
    {
    	$user=custom_clause::findOrFail($id);
    	$user->delete();
    	return back()->with('success','User deleted Successfully');
    }

}