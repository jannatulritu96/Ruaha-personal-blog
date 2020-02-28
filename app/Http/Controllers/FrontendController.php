<?php

namespace App\Http\Controllers;

use App\category;
use App\Mail\ContactMail;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {

        $posts = Post::with('relUser','relCategory')->where('status','published')->inRandomOrder()->get();

        $banners = Post::where('banner_post','Approve')->with('relUser','relCategory')->orderBy('id','Desc')->limit(6)->get();

        $sliders = Post::where('slider_post','Approve')->with('relUser','relCategory')->get();

        $recent_posts = Post::With('relCategory')->where('status','published')->orderBy('id','Desc')->limit(3)->get();

        $categories = Category::withCount('relPost')->where('status','1')->get();

        return view('frontend.home',compact('posts','sliders','recent_posts','categories','banners'));
    }

    public function contact()
    {
        $categories = Category::withCount('relPost')->get();

        $posts = Post::with('relUser','relCategory')->where('status','published')->orderBy('id','DESC')->get();

        $sliders = Post::where('slider_post','Approve')->with('relUser','relCategory')->get();

        $recent_posts = Post::With('relCategory')->where('status','published')->orderBy('id','Desc')->limit(3)->get();

        return view('frontend.contact',compact('posts','sliders','recent_posts','categories'));
    }



    public function sendmail(Request $request){
        $myEmail = 'jannatulritu96@gmail.com';

        $details = (object) [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'comment' => $request->comment
        ];
        Mail::to($myEmail)->send(new ContactMail($details));

    }

    public function about()
    {
        $categories = Category::withCount('relPost')->get();

        $posts = Post::with('relUser','relCategory')->where('status','published')->get();

        $sliders = Post::where('slider_post','Approve')->with('relUser','relCategory')->get();

        $recent_posts = Post::With('relCategory')->where('status','published')->orderBy('id','Desc')->limit(3)->get();

        return view('frontend.about',compact('categories','posts','sliders','recent_posts'));
    }

    public function category_post($id)
    {

        $categories = Category::withCount('relPost')->get();

//        $cats = Category::select(['id','name'])->where('status','Active')->get();

        $posts = Post::with('relUser','relCategory')->where('status','published')->orderBy('id','DESC')->get();

        $sliders = Post::where('slider_post','Approve')->with('relUser','relCategory')->get();

        $recent_posts = Post::With('relCategory')->where('status','published')->orderBy('id','Desc')->limit(3)->get();



        return view('frontend.category_posts',compact('posts','sliders','recent_posts','categories','cats'));

    }
    public function details($id)
    {


        $posts = Post::where('id',$id)->with('relUser','relCategory')->where('status','published')->findOrFail($id);

        $sliders = Post::where('slider_post','Approve')->with('relUser','relCategory')->get();

        $categories = Category::withCount('relPost')->get();

        $recent_posts = Post::With('relCategory')->where('status','published')->orderBy('id','Desc')->limit(3)->get();

        return view('frontend.details',compact('posts','sliders','recent_posts','categories'));

    }

}
