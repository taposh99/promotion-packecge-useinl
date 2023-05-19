<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Request $request)
    {
         //dd($request);
     

      
        // $blog = new Blog();
        // $blog->blog = $request->blog;
        // $blog['is_active'] = ($blog['status'] === 'active') ? true : false;
        // $blog => $status;
     
        // $blog->save();



        $status = ($request->input('status') === 'active') ? true : false;

        Blog::create([
            'status' => $status,
            'blog' => $request->input('blog'),
        ]);

        
        toastr()->success('Data has been saved successfully!');
        return back();
    
        // return redirect('/all-blog')->with('message', 'Success');
    }

    public function allBlog()
    {
        return view('allBlog', [
            'blogs' => Blog::all(),
          
        ]);
    }
    public function editblog($id)
    {
        return view('edit-blog', [
            'blog' => Blog::find($id)
        ]);
    }
    public function updateBlog(Request $request)
    {

        $blog = Blog::find($request->blog_id);
        $blog->blog = $request->blog;
        $blog->status = $request->input('status');
       
   
        $blog->save();
        toastr()->success('Update successfully!');
        return redirect('/all-blog');
    }
    public function deleteblog(Request $request)
    {
        $blog = Blog::find($request->blog_id);
      
        $blog->delete();
        toastr()->success('Update successfully!');
        return back();
    }

      //change status

      public function changeStatus($id){
        $getStatus = Blog::select('status')->where('id',$id)->first();
        if($getStatus->status==1){
            $status = 0;
        }else{
            $status = 1;
        }
        Blog::where('id',$id)->update(['status'=>$status]);
        toastr()->success('status Update successfully!');       
         return redirect()->back();
    }
}
