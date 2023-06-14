<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\Http\Controllers\Controller;
use DB;
use Session;

class refunds extends Controller
{
      public function refundindex(Request $req)
    {
      $id = $_GET['form-id'];

      return view('PolicyForms.refund-policy',compact('id'));
    }

    public function refund(Request $req)
    {
       // print_r($req->input()); 
      $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'c_id'=>'required',
         'platforms'=>'required',
         'premium'=>'required',
      ]);


      $user -> policy_name = 'Refund Policy';
      $user -> unique_id = uniqid();
      $user -> c_id = $req -> c_id;
      $user -> s_id = $req -> s_id;
      $user -> platforms = $req -> platforms;
      $user -> mobile_name = $req -> mobile_name;
      $user -> website_url = $req -> website_url;
      $user -> premium = $req -> premium;

        $user -> save();

      return view('PolicyForms.refund-policy-2')-> with('user',$user);
    }

  public function refund1(Request $req)
  {
     // print_r($req->input());
    $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'company_name'=>'required',
      ]);

        $user->unique_id;
    $user -> company_name = $req -> company_name;

      $user -> save();

    return view('PolicyForms.refund-policy-3')-> with('user',$user);
  }

   public function refund2(Request $req)
   {
      // print_r($req->input());
    $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'sell'=>'required',
               ]);

        $user->unique_id;
    $user -> sell = $req -> sell;
    
       $user -> save();

     return view('PolicyForms.refund-policy-4')-> with('user',$user);
   }

   public function refund3(Request $req)
   {
      // print_r($req->input());
    $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'trials'=>'required',
      ]);


        $user->unique_id;
    $user -> trials = $req -> trials;
    $user -> trials_days = $req -> trials_days;
    $user -> trials_functional = $req -> trials_functional;
    
       $user -> save();

     return view('PolicyForms.refund-policy-5')-> with('user',$user);
   }

   public function refund4(Request $req)
   {
      // print_r($req->input());
    $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'accept'=>'required',
      ]);

        $user->unique_id;
    $user -> accept = $req -> accept;
    $user -> days = $req -> days;
    $user -> money_back = $req -> money_back;
    $user -> refuse = $req -> refuse;
    $user -> prorate = $req -> prorate;

     if ($req->filled('conditions')) 
    {
       

        $user -> conditions = implode(',', $req -> conditions);

        
         }
          
       $user -> save();

     return view('PolicyForms.refund-policy-6')-> with('user',$user);
   }

   public function refund5(Request $req)
   {
      // print_r($req->input());
    $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'offer'=>'required',
      ]);
        $user->unique_id;
    $user -> offer = $req -> offer;
    $user -> fee = $req -> fee;
          
       $user -> save();

     return view('PolicyForms.refund-policy-7',compact('user'));
   }

   public function refund6(Request $req)
   {
      // print_r($req->input());
    $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'contacts'=>'required',
      ]);

        $user->unique_id;
    $user -> contact_form = $req -> contact_form;
    $user -> contact_email = $req -> contact_email;
    $user -> contact_address = $req -> contact_address;

     if ($req->filled('contacts')) 
    {
       

        $user -> contacts = implode(',', $req -> contacts);

        
         }
          
       $user -> save();

     return view('PolicyForms.refund-policy-8')-> with('user',$user);
   }


}
?>