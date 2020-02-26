<?php

namespace App\Http\Controllers;

use App\category;
use App\post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = Post::with(['relUSer','relCategory'])->select('*');
        $render = [];

//        if(isset($request->search)){
//            $sql->where(function ($q) use($request){
//                $q->where('name', '=', $request->search)
//                    ->orwhere('email', '=', $request->search)
//                    ->orwhere('phone', '=', $request->search)
//                    ->orwhere('fax', '=', $request->search)
//                    ->orwhere('address', '=', $request->search);
//            });
//        }
//
//        if (isset($request->status)) {
//            $sql->where('status', $request->status);
//        }
//
        $data = $sql->paginate(30);
        $data->appends($render);
//
//        $status = (isset($request->status)) ? $request->status : '';

        return view('admin.post.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status','1')->get();
        $categories = Category::where('status','1')->get();

        return view('admin.post.create',compact('users','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'user_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'is_featured'=>'required',
            'published_date'=>'required',
            'status'=>'required',
        ]);

        $posts = new Post();
        $posts->category_id = $request->category_id;
        $posts->user_id = $request->user_id;
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->is_featured = $request->is_featured;
        $posts->published_date = $request->published_date;
        $posts->status = $request->status;
        $posts->banner_post = $request->banner_post;
        $posts->slider_post = $request->slider_post;

        if($request->hasFile('image'))
        {
            $photo= $request->file('image');
            $photo->move('assets/post/',$photo->getClientOriginalName());
            $posts->image = 'assets/post/'.$photo->getClientOriginalName();
        }
        $posts->save();

        if ($posts) {
            session()->flash('success','Post stored successfully');
        } else {
            session()->flash('error','Post is wrong!');
        }
        return redirect()->route('post.index');
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
        $post = Post::findOrFail($id);
        $user = User::where('status','1')->get();
        $category = Category::where('status','1')->get();

        return view('admin.post.edit',compact('post','user','category'));
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
        $post = Post::findOrFail($id);
        $post->category_id = $request->category_id;
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->is_featured = $request->is_featured;
        $post->published_date = $request->published_date;
        $post->status = $request->status;
        $post->banner_post = $request->banner_post;
        $post->slider_post = $request->slider_post;

        if($request->hasFile('image'))
        {
            $photo= $request->file('image');
            $photo->move('assets/post/',$photo->getClientOriginalName());
            $post->image = 'assets/post/'.$photo->getClientOriginalName();
        }
        $post->save();

        if ($post) {
            session()->flash('success','Post stored successfully');
        } else {
            session()->flash('error','Post is wrong!');
        }
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Post::findOrFail($id)->delete();


        if ($delete == 1) {
            $success = true;
            $message = "Post deleted successfully";
        } else {
            $success = true;
            $message = "Post not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    public function changeActivity($id)
    {
        $post = Post::find($id);
        $status = 'Unpublished';
        if ($post->status == 'Unpublished') {
            $status = 'Published';
        }
        $post = $post->update(['status' => $status]);

        if ($post) {
            return response()->json(['success' => true, 'Status updated Successfully', 'status' => 200], 200);
        } else {
            return response()->json(['success' => false, 'Whoops! Status not updated', 'status' => 401], 200);
        }
    }
}
