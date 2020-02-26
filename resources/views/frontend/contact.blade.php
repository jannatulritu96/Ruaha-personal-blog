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
                                <form action="#" method="post" id="contact_form" novalidate="novalidate">
                                    <div class="col-sm-4">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea name="comment" id="comment" class="form-control" rows="8" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="form-btn">Contact us</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="widgets-box">
                        <div class="sidebar-head"><span>Newsletter Signup</span></div>
                        <div class="sidebar-text">
                            <p>Sign up to receive latest updates with Ruaha Blog!</p>
                            <div class="newsletter-input">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Email Here">
                            </div>
                            <div class="newsletter-btn">
                                <button type="submit" class="btn-default">Send <i class="fa fa-check-circle"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="widgets-box">
                        <div class="sidebar-head"><span>Categories</span></div>
                        <div class="sidebar-text">
                            <ul class="category">
                                <li>
                                    <div class="cat-desc">
                                        <div class="category-details">
                                            <span><a href="#">Entertainment</a></span>
                                        </div>
                                        <div class="dots"></div>
                                        <div class="category-links">
                                            <span>(10)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="cat-desc">
                                        <div class="category-details">
                                            <span><a href="#">Sports</a></span>
                                        </div>
                                        <div class="dots"></div>
                                        <div class="category-links">
                                            <span>(05)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="cat-desc">
                                        <div class="category-details">
                                            <span><a href="#">Travel</a></span>
                                        </div>
                                        <div class="dots"></div>
                                        <div class="category-links">
                                            <span>(15)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="cat-desc">
                                        <div class="category-details">
                                            <span><a href="#">Lifestyle</a></span>
                                        </div>
                                        <div class="dots"></div>
                                        <div class="category-links">
                                            <span>(25)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="cat-desc">
                                        <div class="category-details">
                                            <span><a href="#">Jobs</a></span>
                                        </div>
                                        <div class="dots"></div>
                                        <div class="category-links">
                                            <span>(105)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="cat-desc">
                                        <div class="category-details">
                                            <span><a href="#">Movies</a></span>
                                        </div>
                                        <div class="dots"></div>
                                        <div class="category-links">
                                            <span>(02)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="cat-desc">
                                        <div class="category-details">
                                            <span><a href="#">Music</a></span>
                                        </div>
                                        <div class="dots"></div>
                                        <div class="category-links">
                                            <span>(07)</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widgets-box">
                        <div class="sidebar-head"><span>From Flickr</span></div>
                        <div class="sidebar-text">
                            <ul id="basicuse" class="photo-thumbs"></ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
