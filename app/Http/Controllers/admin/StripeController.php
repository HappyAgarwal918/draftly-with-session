<?php
  
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\stripe;

class StripeController extends Controller
{

     public function index()
    {
        if(auth()->user()->admin == 1){

            return view('admin.Payment.Payment');
        }
    }

    public function stripe()
    {
        if(auth()->user()->admin == 1){

            return view('admin.Payment.Stripe');
        }
    }

    public function edit()
    {
    	return view('admin.Payment.EditStripe');
    }

    public function editPrice(Request $req)
    {
        $id = $req -> id;

    	$Stripekey = stripe::where('id', $id)->first();
    	$Stripekey -> values = $req -> values;

    	$Stripekey -> save();

    	return view('admin.Payment.Stripe')->with('success','Updated Successfully');
    }

   
}