<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\Http\Controllers\Controller;
use DB;
use Session;

class dmcas extends Controller
{
      public function dmcaindex(Request $req)
    {
      $id = $_GET['form-id'];

      return view('PolicyForms.dmca-policy',compact('id'));
    }
    
    public function dmca(Request $req)
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

      $user -> policy_name = 'DMCA Policy';
      $user -> unique_id = uniqid();  
      $user -> c_id = $req -> c_id;
      $user -> s_id = $req -> s_id;
      $user -> platforms = $req -> platforms;
      $user -> mobile_name = $req -> mobile_name;
      $user -> website_url = $req -> website_url;
      $user -> premium = $req -> premium;

        $user -> save();

      return view('PolicyForms.dmca-policy-2')-> with('user',$user);
    }

  public function dmca1(Request $req)
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

    
      $user -> save();

    return view('PolicyForms.dmca-policy-3')-> with('user',$user);

  }

   public function dmca2(Request $req)
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
         'users'=>'required',
         'fair_use'=>'required',
      ]);

        $user->unique_id;
    $user -> users = $req -> users;
    $user -> fair_use = $req -> fair_use;
    
       $user -> save();

     return view('PolicyForms.dmca-policy-4')-> with('user',$user);
   }

   public function dmca3(Request $req)
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
         'formatting'=>'required',
         'court'=>'required',
      ]);

        $user->unique_id;
    $user -> formatting = $req -> formatting;
    $user -> instructions = $req -> instructions;
    $user -> court = $req -> court;
    
       $user -> save();

     return view('PolicyForms.dmca-policy-5')-> with('user',$user);
   }

   public function dmca4(Request $req)
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
         'actions'=>'required',
      ]);

        $user->unique_id;
    $user -> actions = $req -> actions;
          
       $user -> save();

     return view('PolicyForms.dmca-policy-6')-> with('user',$user);
   }

   public function dmca5(Request $req)
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

     return view('PolicyForms.dmca-policy-7')-> with('user',$user);
   }

   public function dmca6(Request $req)
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

  return view('PolicyForms.dmca-policy-8')-> with('user',$user);
   }
   
}
?>
