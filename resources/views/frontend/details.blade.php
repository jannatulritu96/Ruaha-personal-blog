@extends('frontend.layout.masters')
@section('content')
    <div class="row">

        <div class="col-sm-8">
            <!-- xxx Post Loop xxx -->
                <div class="blog-post">
                    <div class="item-thumbs">
                        <img src="{{ asset($posts->image) }}" alt="Slider Image">
                    </div>
                    <div class="blog-outer">
                        <div class="meta">
                            <span><a href="#"><i class="fa fa-tag"></i> {{ $posts->relCategory->name }}</a></span>
                            <span class="date">{{ $posts->published_date }}</span>
                            <span><a href="#" data-toggle="tooltip" title="" data-original-title="25" class="like-icons"><i class="fa fa-heart-o"></i></a></span>
                            <span><a href="#" data-toggle="tooltip" title="" data-original-title="12" class="comments-icon"><i class="fa fa-comments-o"></i></a></span>
                        </div>
                        <h3 class="blog-title"><a href="#">{{ $posts->title }}</a></h3>
                        <div class="admin-text">
                            <p><img src="{{ asset($posts->relUser->image) }}" alt="" class="img-circle" style="width: 10%"></p>
                            <i>By <a href="#">{{ $posts->relUser->name }}</a></i>
                        </div>
                    </div>
                    <div class="blog-text">
                        {{ $posts->description }}
                    </div>
                    <div class="blog-bottom">
                        <div class="social-icons pull-left">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="pull-right"><a href="#" class="more-links">Read More</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>


            <div class="pagination-wrap text-right">
                <ul class="pagination">
                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
            <!-- xxx Pagination End xxx -->
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

