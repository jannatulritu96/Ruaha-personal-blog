@extends('frontend.layout.masters')
@section('content')
<div class="row">
                <div class="col-md-8">
                    <div class="about-wrap">
                        <div id="map-holder">
                            <div id="map_extended">
                                <p>This will be replaced with the Google Map.</p>
                            </div>
                        </div>
                        <div class="blog-outer">
                            <h3>Say Hello! Its Free</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div>
                                        <div id="sucessmessage"> </div>
                                    </div>
                                </div>
                                <form action="{{ route('sendmail') }}" method="post"  novalidate="novalidate">
                                    @csrf
                                    <div class="col-sm-4">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" style="margin-bottom: 10px;">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" style="margin-bottom: 10px;">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" style="margin-bottom: 10px;">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea name="comment" id="comment" class="form-control" rows="8" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="submit" class="form-btn">Contact us</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- xxx Sidebar xxx -->
    <div class="col-sm-4">

        <!-- xxx Widet Box xxx -->
        <div class="widgets-box">
            <div class="sidebar-head bg-2"><span>Recent Posts</span></div>
            <div class="sidebar-text">
                <ul class="sidebar-post">
                    @foreach($recent_posts as $recent_post)
                        <li>
                            <div class="image-thumb">
                                <a href="{{ route('details',$recent_post->id) }}"><img src="{{ asset($recent_post->image) }}" alt=""></a>
                            </div>
                            <div class="post-text">
                                <h4><a href="#">{{ $recent_post->relCategory->name }}</a></h4>
                                <p>{{ Str::limit($recent_post->description, 80) }}</p>
                                <div class="post-date">
                                    <i class="fa fa-clock-o"></i> {{ $recent_post->published_date }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- xxx Widet Box End xxx -->

        <!-- xxx Widet Box xxx -->
        <div class="widgets-box">
            <div class="sidebar-head"><span>Categories</span></div>
            <div class="sidebar-text">
                <ul class="category">
                    @foreach($categories as $cat)
                        <li>
                            <div class="cat-desc">
                                <div class="category-details">
                                    <span><a href="{{ route('category.post',$cat->id) }}">{{ $cat->name }}</a></span>
                                </div>
                                <div class="dots"></div>
                                <div class="category-links">
                                    <span>{{ $cat->rel_post_count }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- xxx Widet Box End xxx -->

        <!-- xxx Widet Box xxx -->
        <div class="widgets-box">
            <div class="sidebar-head"><span>Slider Posts</span></div>
            <div class="sidebar-text">
                <div class="owl-carousel" id="single-slider">
                    @foreach($sliders as $slider)
                        <div class="item">
                            <a href="#"><img alt="" src="{{ asset($slider->image) }}"></a>
                            <div class="recent-post-text">
                                <h4><a href="#">{{ $slider->title }}</a></h4>
                                <div class="post-date">
                                    <i class="fa fa-clock-o"></i> {{ $slider->published_date }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- xxx Widet Box End xxx -->
    </div>
    <!-- xxx Sidebar End xxx -->
            </div>
@endsection
