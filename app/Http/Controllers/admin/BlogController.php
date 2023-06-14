<?php
  
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        if(auth()->user()->admin == 1){

            return view('admin.Blog.Blog');
        }
    }

    public function all()
    {
        return view('admin.Blog.All');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
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
        
            $request->file('featured_image')->move(public_path('images'), $fileName);
   
            
             $url = asset('images/'.$fileName); 
            
        }



     $user = new post;
    // Create and save post with validated data
     $user -> title = $request -> title;
     $user -> link = $request -> link;
     $user -> featured_image = $url;
     $user -> editor1 = $request -> editor1;

       $user -> save();

    // Redirect the user to the created post with a success notification
    // return redirect(route('admin.Blogs'))->with('notification', 'Post created!');
	}

    public function destroy($id)
    {
        $user=post::findOrFail($id);
        $user->delete();
        return back()->with('success','Blog deleted Successfully');
    }

    public function restore($id)
    {
        $user=post::onlyTrashed($id);
        $user->restore();
        return back()->with('success','Blog Restored Successfully');
    }

}