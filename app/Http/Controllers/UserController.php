<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use Auth;
use App\Http\Controllers\Controller;
use DB;
use Mail;
use Session;

class UserController extends Controller
{
      public function acceptableindex(Request $req)
    {
      $id = $_GET['form-id'];

      return view('PolicyForms.acceptable-use-policy',compact('id'));
    }

    public function acceptable(Request $req)
    {  
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

      $this->validate($req,[
        'c_id'=>'required',
        'platforms'=>'required',
        'premium'=>'required',
       ]);

      $user -> c_id = $req -> c_id;
      $user -> platforms = $req -> platforms;
      $user -> mobile_name = $req -> mobile_name;
      $user -> website_url = $req -> website_url;
      $user -> premium = $req -> premium;

      $user -> save();

      return view('PolicyForms.acceptable-use-policy-2',compact('id'));
    }

    public function acceptable1(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'company'=>'required',
      ]);

      $user->unique_id;
      $user -> company = $req -> company;
      
      $user -> save();

      return view('PolicyForms.acceptable-use-policy-3',compact('id'));
    }

    public function acceptable2(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'register'=>'required',
      ]);
      $user->unique_id;
      $user -> register = $req -> register;
      $user -> share = $req -> share;
      $user -> anon_use = $req -> anon_use;
      
      $user -> save();

      return view('PolicyForms.acceptable-use-policy-4',compact('id'));
    }

    public function acceptable3(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'publish'=>'required',
      ]);

      $user->unique_id;
      $user -> publish = $req -> publish;
      $user -> objectionable = $req -> objectionable;
      $user -> remove = $req -> remove;
      $user -> adult = $req -> adult;
      
      $user -> save();

      return view('PolicyForms.acceptable-use-policy-5',compact('id'));
    }

    public function acceptable4(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'sell'=>'required',
      ]);

      $user->unique_id;
      $user -> sell = $req -> sell;
      $user -> payments_method = $req -> payments_method;
      $user -> diff_name = $req -> diff_name;
            
      $user -> save();

      return view('PolicyForms.acceptable-use-policy-6',compact('id'));
    }

    public function acceptable5(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'upload'=>'required',
         'install'=>'required',
      ]);

      $user->unique_id;
      $user -> upload = $req -> upload;
      $user -> execute = $req -> execute;
      $user -> install = $req -> install;
            
      $user -> save();

      return view('PolicyForms.acceptable-use-policy-7',compact('id'));
    }

    public function acceptable6(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'send'=>'required',
      ]);

      $user->unique_id;
      $user -> send = $req -> send;
      $user -> bulk = $req -> bulk;
      $user -> purchased = $req -> purchased;
      $user -> suspend = $req -> suspend;

      $user -> save();

      return view('PolicyForms.acceptable-use-policy-8',compact('id'));
    }

    public function acceptable7(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'action'=>'required',
      ]);

      $user->unique_id;
      $user -> action = $req -> action;
      $user -> court = $req -> court;
      $user -> notifyy = $req -> notifyy;
            
      $user -> save();

      return view('PolicyForms.acceptable-use-policy-9',compact('id'));
    }

    public function acceptable8(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'suspendd'=>'required',
      ]);

      $user->unique_id;
      $user -> suspendd = $req -> suspendd;
      $user -> backup = $req -> backup;
      $user -> backup_fee = $req -> backup_fee;
      $user -> actions = $req -> actions;
            
            
        $user -> save();

      return view('PolicyForms.acceptable-use-policy-10',compact('id'));
    }

    public function acceptable9(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        
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
      
      return view('PolicyForms.acceptable-use-policy-11',compact('id'));

    }

    public function acceptable10(Request $req)
    {
      $id = $_GET['form-id'];
     
      $user = policy::where('unique_id',$id)->first();

        $this->validate($req,[
         'notify'=>'required',
      ]);

      $user->unique_id;
      $user -> notify = $req -> notify;
                  
        $user -> save();

      return view('PolicyForms.acceptable-use-policy-12',compact('id'));
    }
 

}

?>
