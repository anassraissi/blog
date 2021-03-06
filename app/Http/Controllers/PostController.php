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
        $post=Post::find($id);
       return View('posts.update_post',['post'=>$post])->with('categories', Category::all());
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
     $this->validate($request,[
         'title' => 'required',
         'content' => 'required',
         'category_id' => 'required',
     ]);
     $post=Post::find($id);
     if($request->hasfile($post->featured)){
        $featured=$request->featured;
        $featured_new_name= time().$featured->getClientOrignialName();
        $featured->move('uploads/posts',$featured_new_name);
     }
       $post->title= $request->title;
       $post->content= $request->content;
      
       $post->category_id=$request->category_id;
       $post->save();   

         Session::flash("message","you update a post");
         return redirect()->route('posts');

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
    public function Trashed(){
         $post=Post::onlyTrashed()->get();
         return View('posts.trashed',['posts' => $post]);

       
    }
    public function kill($id){
       $post=Post::withTrashed()->where('id',$id)->first();
       $post->forceDelete();
       Session::flash("message","you deleting a post permanently");
       return redirect()->back();

    }
    public function restore($id){
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash("message","you restore a post");
        return redirect()->back();
 
     }
}   
