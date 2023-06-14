<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\Http\Controllers\Controller;
use DB;
use Session;

class privacys extends Controller
{
      public function privacyindex(Request $req)
    {
      $id = $_GET['form-id'];

      return view('PolicyForms.privacy-policy',compact('id'));
    }

     public function privacy(Request $req)
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

      $user -> policy_name = 'Privacy Policy';
      $user -> unique_id = uniqid();
      $user -> c_id = $req -> c_id;
      $user -> s_id = $req -> s_id;
      $user -> platforms = $req -> platforms;
      $user -> mobile_name = $req -> mobile_name;
      $user -> website_url = $req -> website_url;
      $user -> premium = $req -> premium;

        $user -> save();

      return view('PolicyForms.privacy-policy-2')-> with('user',$user);
    }

  public function privacy1(Request $req)
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

    return view('PolicyForms.privacy-policy-3')-> with('user',$user);
  }

   public function privacy2(Request $req)
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
    $user -> register_social = $req -> register_social;
    $user -> info_access = $req -> info_access;
    $user -> info_delete = $req -> info_delete;
    
     if ($req->filled('info_delete_method')) 
    {
       

        $user -> info_delete_method = implode(',', $req -> info_delete_method);

        
         }
    
       $user -> save();

     return view('PolicyForms.privacy-policy-4')-> with('user',$user);
   }

   public function privacy3(Request $req)
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
         'interact'=>'required',
      ]);
        $user->unique_id;
    $user -> interact = $req -> interact;
    $user -> info_visible = $req -> info_visible;
    
       $user -> save();

     return view('PolicyForms.privacy-policy-5')-> with('user',$user);
   }

   public function privacy4(Request $req)
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
         'share'=>'required',
      ]);
        $user->unique_id;
    $user -> publish = $req -> publish;
    $user -> share = $req -> share;
          
       $user -> save();

     return view('PolicyForms.privacy-policy-6')-> with('user',$user);
   }

   public function privacy5(Request $req)
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
         'california'=>'required',
         'europe'=>'required',
         'teens'=>'required',
      ]);
        $user->unique_id;
    $user -> california = $req -> california;
    $user -> europe = $req -> europe;
    $user -> teens = $req -> teens;
    $user -> children = $req -> children;
    $user -> children_info = $req -> children_info;
    
     if ($req->filled('children_info_misc')) 
    {
       

        $user -> children_info_misc = implode(',', $req -> children_info_misc);

        
         }
          
       $user -> save();

     return view('PolicyForms.privacy-policy-7')-> with('user',$user);
   }

   public function privacy6(Request $req)
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
    $user -> remote_share = $req -> remote_share;
    $user -> payments_store = $req -> payments_store;
    $user -> payments_security = $req -> payments_security;

     if ($req->filled('payments_method')) 
    {
       

        $user -> payments_method = implode(',', $req -> payments_method);

        
         }
          
       $user -> save();

     return view('PolicyForms.privacy-policy-8')-> with('user',$user);
   }

   public function privacy7(Request $req)
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
         'remarketing'=>'required',
         'newsletters'=>'required',
      ]);
        $user->unique_id;
    $user -> affiliate_links = $req -> affiliate_links;
    $user -> ads = $req -> ads;
    $user -> remarketing = $req -> remarketing;
    $user -> newsletters = $req -> newsletters;
    $user -> newsletters_remote = $req -> newsletters_remote;
    $user -> newsletters_unsubscr = $req -> newsletters_unsubscr;
          
          
       $user -> save();

    return view('PolicyForms.privacy-policy-9')-> with('user',$user);
   }

   public function privacy8(Request $req)
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
         'geo'=>'required',
         'features'=>'required',
         'derivative'=>'required',
         'third_party'=>'required',
      ]);
        $user->unique_id;
    $user -> geo = $req -> geo;
    $user -> features = $req -> features;
    $user -> derivative = $req -> derivative;
    $user -> third_party = $req -> third_party;

     if ($req->filled('info')) 
    {
       

        $user -> info = implode(',', $req -> info);

        
         }
          
          
       $user -> save();

     return view('PolicyForms.privacy-policy-10')-> with('user',$user);
   }

   public function privacy9(Request $req)
   {
      // print_r($req->input());
    $session_id =  Session::getId();

        // check if data exits by session id
        $user = policy::where('session_id',$session_id)->first();
        if(!isset($user->id)){
         $user = new policy;
         $user->unique_id;
           $user -> session_id = $session_id;
        }    
     if ($req->filled('purpose')) 
    {
       

        $user -> purpose = implode(',', $req -> purpose);

        
         }
          
       $user -> save();

     return view('PolicyForms.privacy-policy-11')-> with('user',$user);
   }

   public function privacy10(Request $req)
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
         'sell_a'=>'required',
         'law'=>'required',
         'breach'=>'required',
      ]);
        $user->unique_id;
    $user -> sell_a = $req -> sell_a;
    $user -> merger = $req -> merger;
    $user -> law = $req -> law;
    
     if ($req->filled('breach')) 
    {
       

        $user -> breach = implode(',', $req -> breach);

        
         }
          
          
       $user -> save();

     return view('PolicyForms.privacy-policy-12')-> with('user',$user);
   }

   public function privacy11(Request $req)
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

     return view('PolicyForms.privacy-policy-13')-> with('user',$user);
   }

   public function privacy12(Request $req)
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

    return view('PolicyForms.privacy-policy-14')-> with('user',$user);
   }


}

?>
