<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Http\UploadedFile;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return View('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        if($categories->count()==0)
        {
        Session::flash("info","you may create atlist a category");

        }
         return View('Posts.create_post',['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
              'title' => 'required',
                'featured' => 'required|image',
              'content' => 'required',   
             'category_id'=>'required'       
       ]);
               $featured=$request->featured;
               $featured_new_name=time().$featured->getClientOriginalName();
               $featured->move('uploads/posts',$featured_new_name);
               $post=Post::create([
                'title' =>  $request->title,
                'featured' => 'uploads/posts/'.$featured_new_name,
              'content' => $request->content, 
             'category_id'=>$request->category_id,
             'slug' => str_slug($request->title)
               ]);

               Session::flash("message","you create a post");
               return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        Session::flash("message","you deleting a post");
        return redirect()->back();
    }
}
