<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\Http\Controllers\Controller;
use DB;
use Session;

class disclaimers extends Controller
{
      public function disclaimerindex(Request $req)
    {
      $id = $_GET['form-id'];

      return view('PolicyForms.disclaimer',compact('id'));
    }
    public function disclaimer(Request $req)
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

      $user -> policy_name = 'Disclaimer Policy';
      $user -> unique_id = uniqid();
      $user -> c_id = $req -> c_id;
      $user -> s_id = $req -> s_id;
      $user -> platforms = $req -> platforms;
      $user -> platforms_other = $req -> platforms_other;
      $user -> mobile_name = $req -> mobile_name;
      $user -> website_url = $req -> website_url;
      $user -> ebook_name = $req -> ebook_name;
      $user -> landing_url = $req -> landing_url;
      $user -> course_name = $req -> course_name;
      $user -> podcast_name = $req -> podcast_name;
      $user -> video_name = $req -> video_name;
      $user -> premium = $req -> premium;

        $user -> save();

      return view('PolicyForms.disclaimer-2')-> with('user',$user);
    }

  public function disclaimer1(Request $req)
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

    return view('PolicyForms.disclaimer-3')-> with('user',$user);
  }

   public function disclaimer2(Request $req)
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
         'writer'=>'required',
         'original'=>'required',
      ]);
        $user->unique_id;
    $user -> writer = $req -> writer;
    $user -> original = $req -> original;
    
     if ($req->filled('specialty')) 
    {
       

        $user -> specialty = implode(',', $req -> specialty);

        
         }
    
      $user -> save();

    return view('PolicyForms.disclaimer-4')-> with('user',$user);
  }

   public function disclaimer3(Request $req)
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
         'copy'=>'required',
         'share'=>'required',
      ]);
        $user->unique_id;
    $user -> copy = $req -> copy;
    $user -> share = $req -> share;
    
      $user -> save();

    return view('PolicyForms.disclaimer-5')-> with('user',$user);
  }

  public function disclaimer4(Request $req)
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
    $user -> identify = $req -> identify;
    $user -> influence = $req -> influence;
    
      $user -> save();

    return view('PolicyForms.disclaimer-6')-> with('user',$user);
  }

  public function disclaimer5(Request $req)
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
    $user -> monitor = $req -> monitor;
    $user -> reuse = $req -> reuse;
    $user -> terminate = $req -> terminate;
    
      $user -> save();

    return view('PolicyForms.disclaimer-7')-> with('user',$user);
  }

  public function disclaimer6(Request $req)
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
         'testimonials'=>'required',
      ]);
        $user->unique_id;
    $user -> testimonials = $req -> testimonials;
    $user -> modify = $req -> modify;
    $user -> compensate = $req -> compensate;
    
      $user -> save();

    return view('PolicyForms.disclaimer-8')-> with('user',$user);
  }

  public function disclaimer7(Request $req)
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
      ]);
        $user->unique_id;
    $user -> affiliate_links = $req -> affiliate_links;
    $user -> affiliate_links_amazon = $req -> affiliate_links_amazon;
    $user -> ads = $req -> ads;
    
      $user -> save();

    return view('PolicyForms.disclaimer-9')-> with('user',$user);
  }

  public function disclaimer8(Request $req)
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
         'advise'=>'required',
         'accuracy'=>'required',
         'modifications'=>'required',
      ]);
        $user->unique_id;
    $user -> advise = $req -> advise;
    $user -> accuracy = $req -> accuracy;
    $user -> modifications = $req -> modifications;
    
      $user -> save();

    return view('PolicyForms.disclaimer-10')-> with('user',$user);
  }

  public function disclaimer9(Request $req)
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

    return view('PolicyForms.disclaimer-11')-> with('user',$user);
  }

  public function disclaimer10(Request $req)
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

   return view('PolicyForms.disclaimer-12')-> with('user',$user);
  }

}
?>