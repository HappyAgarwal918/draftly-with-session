<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class terms extends Controller
{
      public function termindex(Request $req)
    {
      $id = $_GET['form-id'];

      return view('PolicyForms.terms-and-conditions',compact('id'));
    }

     public function term(Request $req)
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

      $user -> policy_name = 'Terms and Conditions';
      $user -> unique_id = uniqid();
      $user -> c_id = $req -> c_id;
      $user -> s_id = $req -> s_id;
      $user -> platforms = $req -> platforms;
      $user -> mobile_name = $req -> mobile_name;
      $user -> website_url = $req -> website_url;
      $user -> premium = $req -> premium;

        $user -> save();

      return view('PolicyForms.terms-and-conditions-2')-> with('user',$user);
    }

  public function term1(Request $req)
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

    return view('PolicyForms.terms-and-conditions-3')-> with('user',$user);
  }

   public function term2(Request $req)
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
         'register'=>'required',
      ]);


        $user->unique_id;
    $user -> register = $req -> register;
    $user -> monitor = $req -> monitor;
    $user -> terminate = $req -> terminate;
    
       $user -> save();

     return view('PolicyForms.terms-and-conditions-4')-> with('user',$user);
   }

   public function term3(Request $req)
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
         'age'=>'required',
         'adult'=>'required',
      ]);


        $user->unique_id;
    $user -> age = $req -> age;
    $user -> adult = $req -> adult;
    $user -> adult_content_warn = $req -> adult_content_warn;
    
       $user -> save();

     return view('PolicyForms.terms-and-conditions-5')-> with('user',$user);
   }

   public function term4(Request $req)
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
         'publish'=>'required',
      ]);


        $user->unique_id;
    $user -> publish = $req -> publish;
    $user -> monitor_a = $req -> monitor_a;
    $user -> marketing = $req -> marketing;
    $user -> terminate_a = $req -> terminate_a;
    $user -> backup = $req -> backup;
    $user -> backup_guarantee = $req -> backup_guarantee;
          
       $user -> save();

     return view('PolicyForms.terms-and-conditions-6')-> with('user',$user);
   }

   public function term5(Request $req)
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
    $user -> remote = $req -> remote;
    $user -> trials = $req -> trials;
    $user -> recurring = $req -> recurring;
    $user -> auto_renewal = $req -> auto_renewal;
    $user -> uptime_guarantee = $req -> uptime_guarantee;
    $user -> downtime_compensation = $req -> downtime_compensation;
    $user -> payments_security = $req -> payments_security;

     if ($req->filled('types')) 
    {
       

        $user -> types = implode(',', $req -> types);

        
         }

     if ($req->filled('payments_method')) 
    {
       

        $user -> payments_method = implode(',', $req -> payments_method);

        
         }
          
    if ($req->filled('guarantees')) 
    {
       

        $user -> guarantees = implode(',', $req -> guarantees);

        
         }

    if ($req->filled('rights')) 
    {
       

        $user -> rights = implode(',', $req -> rights);

        
         }
       $user -> save();

     return view('PolicyForms.terms-and-conditions-7')-> with('user',$user);
   }

   public function term6(Request $req)
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
         'affiliate_links'=>'required',
         'ads'=>'required',
         'newsletters'=>'required',
      ]);


        $user->unique_id;
    $user -> affiliate_links = $req -> affiliate_links;
    $user -> ads = $req -> ads;
    $user -> newsletters = $req -> newsletters;
          
       $user -> save();

     return view('PolicyForms.terms-and-conditions-8')-> with('user',$user);
   }

   public function term7(Request $req)
   {
      // print_r($req->input());
     $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
           $user -> session_id = $session_id;
        }         


     if ($req->filled('misc_clauses')) 
    {
       

        $user -> misc_clauses = implode(',', $req -> misc_clauses);

        
         }
          
       $user -> save();

    return view('PolicyForms.terms-and-conditions-9')-> with('user',$user);
   }

   public function term8(Request $req)
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

     return view('PolicyForms.terms-and-conditions-10')-> with('user',$user);
   }

   public function term9(Request $req)
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

    return view('PolicyForms.terms-and-conditions-11')-> with('user',$user);
   }

   public function term10(Request $req)
    {
      // print_r($req->input());
      // check if data exits by session id
        $session_id =  Session::getId();
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
           $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'email'=>'required',
      ]);

      $user -> email = $req -> email;
       $user -> url = $req -> url;
      $user -> link = $req -> link;
      $user -> type = $req -> type;
                     
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

      return view('complete');
    }

    public function payment(Request $req)
    {
      // print_r($req->input());
      // check if data exits by session id
        $session_id =  Session::getId();
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
           $user = new policy;
           $user -> session_id = $session_id;
        }

        $this->validate($req,[
         'email'=>'required',
      ]);

      $user -> email = $req -> email;
      $user -> url = $req -> url;
      $user -> link = $req -> link;
      $user -> type = $req -> type;
                     
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

      return view('billing');
    }

}
?>