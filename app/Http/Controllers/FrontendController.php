<?php

namespace App\Http\Controllers;

use App\category;
use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::with('relUser','relCategory')->where('status','published')->get();

        $banners = Post::where('banner_post','Approve')->with('relUser','relCategory')->get();

        $sliders = Post::where('banner_post','Approve')->with('relUser','relCategory')->get();

        $recent_posts = Post::With('relCategory')->where('status','published')->orderBy('id','Desc')->limit(3)->get();

        $categories = Category::withCount('relPost')->get();


//        $total_post = Category::With('relPost')->where('status','published')->count();

        return view('frontend.home',compact('posts','sliders','recent_posts','categories','banners'));
    }

    public function contact()
    {

        return view('frontend.contact');
    }

    public function about()
    {

        return view('frontend.about');
    }
}
