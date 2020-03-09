<?php

namespace App\Http\Controllers;

use App\Assigntag;
use App\category;
use App\post;
use App\SubCategory;
use App\Tag;
use App\User;
//use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sql = Post::with(['relUSer', 'relCategory', 'relAssigntag'])->select('*');
        $users = User::where('permission', '1')->get();
        $categories = Category::where('status', '1')->get();
        $render = [];
        $tags = Tag::get();

//        if(isset($request->search)){
//            $sql->where(function ($q) use($request){
//                $q->where('name', '=', $request->search)
//                    ->orwhere('email', '=', $request->search)
//                    ->orwhere('phone', '=', $request->search)
//                    ->orwhere('fax', '=', $request->search)
//                    ->orwhere('address', '=', $request->search);
//            });
//        }

        if (isset($request->user_id)) {
            $sql->where('user_id', 'like', '%'.$request->user_id.'%');
            $render['user_id'] = $request->user_id;
        }
        if (isset($request->category_id)) {
            $sql->where('category_id', 'like', '%'.$request->category_id.'%');
            $render['category_id'] = $request->category_id;
        }

        if (isset($request->status)) {
            $sql->where('status', $request->status);
        }

//        if (isset($request->tag_id)) {
//            $sql = Post::select('posts.*', 'assign_tags.tag_id')
//                ->join('assign_tags', 'posts.id', '=', 'assign_tags.post_id')
//                ->where('assign_tags.tag_id', $request->tag_id)
//                ->paginate(10);
//        }

        $data = $sql->paginate(30);
        $data->appends($render);

        $status = (isset($request->status)) ? $request->status : '';

        return view('admin.post.index', compact('data', 'tags','status','users','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('permission', '1')->get();
        $categories = Category::where('status', '1')->get();
        $sub_categories = SubCategory::with('relCategory')->where('status', '1')->get();

        return view('admin.post.create', compact('users', 'categories', 'sub_categories'));
    }


    public function subCat($id){
        $sub_categories = SubCategory::where('status', '1')->where('cat_id',$id)->get();
        $sub_cat = ' <option>Select Sub Category</option>';
        foreach ($sub_categories as $sub_category) {
            $sub_cat .=  '<option value="'.$sub_category->cat_id.'">'.$sub_category->name.'</option>';
        }
        return response()->json(['data'=>$sub_cat]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'is_featured' => 'required',
            'published_date' => 'required',
            'status' => 'required',
        ]);

        $posts = new Post();
        if (Auth::user()->type == 1) {
            $posts->user_id = $request->user_id;
        } else {
            $posts->user_id = auth()->user()->id;
        }
        $posts->category_id = $request->category_id;
        $posts->sub_category = $request->sub_category;
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->is_featured = $request->is_featured;
        $posts->published_date = $request->published_date;
        $posts->status = $request->status;
        $posts->banner_post = $request->banner_post;
        $posts->slider_post = $request->slider_post;

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photo->move('assets/post/', $photo->getClientOriginalName());
            $posts->image = 'assets/post/' . $photo->getClientOriginalName();
        }
        $posts->save();

        if ($posts) {
            session()->flash('success', 'Post stored successfully');
        } else {
            session()->flash('error', 'Post is wrong!');
        }
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $user = User::where('permission', '1')->get();
        $category = Category::where('status', '1')->get();
        $sub_category = SubCategory::where('status', '1')->get();

        return view('admin.post.edit', compact('post', 'user', 'category', 'sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//        dd($request->all());
        $post = Post::findOrFail($id);
        if (Auth::user()->type == 1) {
            $post->user_id = $request->user_id;
        } else {
            $post->user_id = auth()->user()->id;
        }
        $post->category_id = $request->category_id;
        $post->sub_category = $request->sub_category;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->is_featured = $request->is_featured;
        $post->published_date = $request->published_date;
        $post->status = $request->status;
        $post->banner_post = $request->banner_post;
        $post->slider_post = $request->slider_post;


        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photo->move('assets/post/', $photo->getClientOriginalName());
            $post->image = 'assets/post/' . $photo->getClientOriginalName();
        }
        $post->save();

        if ($post) {
            session()->flash('success', 'Post stored successfully');
        } else {
            session()->flash('error', 'Post is wrong!');
        }
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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
        $status = 0;
        if ($post->status == 0) {
            $status = 1;
        }
        $post = $post->update(['status' => $status]);

        if ($post) {
            return response()->json(['success' => true, 'Status updated Successfully', 'status' => 200], 200);
        } else {
            return response()->json(['success' => false, 'Whoops! Status not updated', 'status' => 401], 200);
        }
    }

    public function addTag(Request $request)
    {

        $post_id = $request->id;
        $tag_ids = $request->tag_ids;
        foreach ($tag_ids as $tag_id) {
            $check = Assigntag::where(['post_id' => $post_id, 'tag_id' => $tag_id])->count();
            if ($check <= 0) {
                Assigntag::create(['post_id' => $post_id, 'tag_id' => $tag_id]);
            }

        }

        return response()->json(['status' => 'success']);
    }

    public function tagDestroy($id)
    {
        $delete = Assigntag::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
