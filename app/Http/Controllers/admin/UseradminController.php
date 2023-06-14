<?php
  
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\policy;
use DB;
use Carbon\Carbon;
use session;

class UseradminController extends Controller
{

     public function index()
    {
        if(auth()->user()->admin == 1){

            return view('admin.User.User');
        }
    }

    public function edit()
    {
    	return view('admin.User.Useredit');
    }

    public function destroy($id)
    {
    	$user=User::findOrFail($id);
    	$user->delete();
    	return back()->with('success','User deleted Successfully');
    }

    public function restore($id)
    {
        $user=User::onlyTrashed($id);
        $user->restore();
        return back()->with('success','User Restored Successfully');
    }

    // public function destroyPolicy($unique_id)
    // {
    //     $user=policy::findOrFail($unique_id);
    //     $user->delete();
    //     return back()->with('success','User deleted Successfully');
    // }

    public function addnew()
    {
        return view('admin.User.Register');
    }

    public function addUser(Request $req)
    {
         $email = $req -> email;
        $check_user = User::where('email',$email)->first();
        if(empty($check_user)){
            
             $user = array("name" => $req->name,"email" => $email,'password' => Hash::make($req['password']),"created_at"=> Carbon::now(),"updated_at"=> now(),'email_verified_at' => now());
                DB::table('users')->insert($user);

        }
     
       return redirect()->back()->with('message', 'User Added Successfully!');



        //return back()->with('success','User added Successfully');
    }

}