<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Request $request)
    {
        // dd($request);



        // $blog = new Blog();
        // $blog->blog = $request->blog;
        // $blog['is_active'] = ($blog['status'] === 'active') ? true : false;
        // $blog => $status;

        // $blog->save();



        // $status = ($request->input('status') === 'active') ? true : false;
        // $image = $request->file('image');
        // $imageName = time() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $imageName);

        // Blog::create([
        //     'status' => $status,
        //     'blog' => $request->input('blog'),
        //     'blog' => $request->input('title'),
        //     'blog' => $request->input('banner'),
        //     'blog' => $request->input('details'),

        //     $post = new Blog;
        //     'status' => $status;
        // $post->title = $validatedData['title'];
        // $post->image = $imageName;
        // $post->details = $validatedData['details'];
        // $post->save();


        // ]);

        $imageName = time() . '.' . $request->banner->extension();
        $request->banner->move(public_path('images/banner'), $imageName);
        $status = ($request->input('status') === 'active') ? true : false;


        Blog::create([
            'status' => $status,
            'blog' => $request->blog,
            'title' => $request->title,
            'details' => $request->details,
            'banner' => $imageName,


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
    public function update(Request $request, Blog $up_blogs)
    {

        $status = ($request->input('status') === 'active') ? true : false;

        // $imageName = '';
        // if ($request->hasfile('banner')) {
        //     $file = $request->file('banner');
        //     $imageName = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images/banner'), $imageName);
        // }
        // $imageName = time() . '.' . $request->banner->extension();
        // $request->banner->move(public_path('images/banner'), $imageName);
        if ($up_blogs) {
            // Store the previous image path
            $previousImage = $up_blogs->banner;
    
            // Check if a new image was uploaded
            if ($request->hasFile('banner')) {
                // Delete the previous image if it exists
                if ($previousImage) {
                    Stroge::disk('public')->delete($previousImage);
                }
    
                // Upload and save the new image
                $imageName = time() . '.' . $request->banner->extension();
                $request->banner->move(public_path('images/banner'), $imageName);
                // $imagePath = $request->file('banner')->store('images/banner', 'public');
          
            }
        }

            //    $imageName = time() . '.' . $request->banner->extension();
            //     $request->banner->move(public_path('images/banner'), $imageName);  
         
   
      
    


        $up_blogs = Blog::find($request->blog_id);
        $up_blogs->blog = $request->blog;
        $up_blogs->title = $request->title;
        $up_blogs->details = $request->details;
     
        // $up_blogs->banner = $imageName;
        $up_blogs->banner = $imageName;
     
   
        $up_blogs->status = $status;
        $up_blogs->save();
        toastr()->success('Update successfully!');
        return redirect('/all-blog');
    }
    public function deleteblog(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $banner = str_replace('\\', '/', public_path('/images/banner/' . $blog->banner));
        if (is_file($banner)){
            unlink($banner);
            $blog->delete();
            toastr()->success('Deleted  successfully!');
            return redirect()->route('all.blog');
        }else {
            $blog->delete();
            toastr()->success('Deleted  successfully!');
            return back();
        }
        $blog->delete();
        toastr()->success('Update successfully!');
        return back();
    }


    // $employee = Employee::find($id);
    // $image = str_replace('\\', '/', public_path('/upload/' . $employee->image));
    // if (is_file($image)){
    //     unlink($image);
    //     $employee->delete();
    //     toastr()->success('Deleted  successfully!');
    //     return redirect()->route('employee');
    // }else {
    //     $employee->delete();
    //     toastr()->success('Deleted  successfully!');
    //     return redirect()->back();
    // }




    //change status

    public function changeStatus($id)
    {
        $getStatus = Blog::select('status')->where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Blog::where('id', $id)->update(['status' => $status]);
        toastr()->success('status Update successfully!');
        return redirect()->back();
    }
}
