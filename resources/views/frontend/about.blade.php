@extends('frontend.layout.masters')
@section('content')
    <!-- xxx Breadcrumb Start xxx -->
    <section>
        <div class="breadcrumb">
            <small>who i am</small>
            <h1>About Ruaha</h1>
        </div>
    </section>
    <!-- xxx Breadcrumb End xxx -->
<div class="row">
        <div class="col-sm-8">
            <div class="about-wrap">
                <img src="images/about-us.png" alt="Slider Image">
                <div class="blog-text">
                    <p>Integer at purus facilisis, rhoncus tellus sed, elementum nulla. In eleifend purus blandit purus bibendum, eu porttitor leo scelerisque. Integer velit sem, lacinia nec tellus a, molestie pulvinar risus. Praesent eget metus id metus lobortis dictum. Nulla id convallis ligula, id aliquet est. Fusce ac nulla placerat, posuere orci eu, tempor tortor. Phasellus vehicula odio lacus, non posuere libero tempor vel. Nam pellentesque erat ut urna vulputate, a eleifend dolor elementum. Ut porta magna eget ligula tincidunt, eget volutpat dolor iaculis. <br> <br></p>
                    <blockquote>
                        <p>Courage is not the absence of fear, but rather the judgement that something else is more important than fear.</p>
                        <footer><cite title="Source Title">Ambrose Redmoon</cite></footer>
                    </blockquote>
                    <p><img src="images/office-1.png" alt="Slider Image" class="alignleft img-thumbnail">Bacon ipsum dolor sit amet strip steak ham hock magna ball tip, leberkas est ut drumstick sed sunt frankfurter. Veniam doner turducken pariatur, enim ham hock bresaola short loin beef ribs. Bacon ipsum dolor sit amet strip steak ham hock magna ball tip, leberkas est ut drumstick sed sunt frankfurter.</p><p>  Bacon ipsum dolor sit amet strip steak. Veniam doner turducken pariatur, enim ham. Bacon ipsum dolor sit amet strip steak ham hock magna ball tip, leberkas est ut drumstick sed sunt frankfurter.</p>
                    <p>Veniam doner turducken pariatur, enim ham hock bresaola short loin beef ribs. Bacon ipsum dolor sit amet strip steak ham hock magna ball tip, leberkas est ut drumstick sed sunt frankfurter. Bacon ipsum dolor sit amet strip steak. Veniam doner turducken pariatur, enim ham. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, fugiat necessitatibus! Autem voluptate consequuntur magnam vel, quo, adipisci consectetur saepe?</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <div id="sucessmessage"> </div>
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
