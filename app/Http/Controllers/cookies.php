<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\Http\Controllers\Controller;
use DB;
use Session;

class cookies extends Controller
{
      public function cookieindex(Request $req)
    {
      $id = $_GET['form-id'];

      return view('PolicyForms.cookie-policyy',compact('id'));
    }

     public function cookie(Request $req)
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
         'website_url'=>'required',
         'premium'=>'required',
      ]);

      $user -> policy_name = 'Cookie Policy';
      $user -> unique_id = uniqid();
      $user -> c_id = $req -> c_id;
      $user -> s_id = $req -> s_id;
      $user -> website_url = $req -> website_url;
      $user -> premium = $req -> premium;

        $user -> save();

      return view('PolicyForms.cookie-policyy-2')-> with('user',$user);
    }

  public function cookie1(Request $req)
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
         'company'=>'required',
      ]);
        $user->unique_id;
    $user -> company = $req -> company;
    $user -> company_name = $req -> company_name;

    
      $user -> save();

    return view('PolicyForms.cookie-policyy-3')-> with('user',$user);
  }

   public function cookie2(Request $req)
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
         'privacy_policy'=>'required',
      ]);
        $user->unique_id;
    $user -> privacy_policy = $req -> privacy_policy;
    $user -> privacy_policy_url = $req -> privacy_policy_url;
    
       $user -> save();

     return view('PolicyForms.cookie-policyy-4')-> with('user',$user);
   }

   public function cookie3(Request $req)
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
         'essential'=>'required',
         'functionality'=>'required',
         'third_party'=>'required',
      ]);
        $user->unique_id;
    $user -> essential = $req -> essential;
    $user -> functionality = $req -> functionality;
    $user -> third_party = $req -> third_party;
    $user -> ads = $req -> ads;
    $user -> cookies_ads_personal_info = $req -> cookies_ads_personal_info;
    $user -> cookies_analytical = $req -> cookies_analytical;
    $user -> cookies_social = $req -> cookies_social;
    
       $user -> save();

     return view('PolicyForms.cookie-policyy-5')-> with('user',$user);
   }

   public function cookie4(Request $req)
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
         'cookies_disable'=>'required',
      ]);
        $user->unique_id;
    $user -> cookies_disable = $req -> cookies_disable;
          
       $user -> save();

     return view('PolicyForms.cookie-policyy-6')-> with('user',$user);
   }

   public function cookie5(Request $req)
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
         'beacons'=>'required',
      ]);
        $user->unique_id;
    $user -> beacons = $req -> beacons;
          
       $user -> save();

     return view('PolicyForms.cookie-policyy-7')-> with('user',$user);
   }

   public function cookie6(Request $req)
   {
      // print_r($req->input());
    $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }
        
        $user->unique_id;
        $user -> contact_form = $req -> contact_form;
        $user -> contact_email = $req -> contact_email;
        $user -> contact_address = $req -> contact_address;

     if ($req->filled('contacts')) 
    {
       

        $user -> contacts = implode(',', $req -> contacts);

        
         }
          
       $user -> save();

     return view('PolicyForms.cookie-policyy-8')-> with('user',$user);
   }

   public function cookie7(Request $req)
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
         'notify'=>'required',
      ]);

        $user->unique_id;
        $user -> notify = $req -> notify;        
          
       $user -> save();

     return view('PolicyForms.cookie-policyy-9')-> with('user',$user);
   }
}

?>