<?php
  
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class LegalController extends Controller
{

    public function index()
    {
        if(auth()->user()->admin == 1){

            return view('admin.Legal.Legal');
        }
    }

    

}