<?php
  
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\img;


class Dashboard extends Controller
{

     public function index()
    {
        if(auth()->user()->admin == 1){

            return view('admin.Dashboard.Dashboard');
        }
    }

public function store(Request $request)
	{
   		 // Validate posted form data
    // $validated = $request->validate([
    //     'title' => 'required|string|unique:posts|min:5|max:100',
    //     'editor1' => 'required|string|min:5|max:2000',
    // ]);


        if($request->hasFile('featured_image')) {
            $originName = $request->file('featured_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('featured_image')->move(public_path('logo'), $fileName);
   
            
             $url = asset('logo/'.$fileName); 
            
        }



     $logo = img::where('id', 1)->first();
    	$logo -> featured_image = $url;

    	$logo -> save();

    	return view('admin.Dashboard.Dashboard')->with('success','logo Changed Successfully');

    // Redirect the user to the created post with a success notification
    // return redirect(route('admin.Blogs'))->with('notification', 'Post created!');
	}
}