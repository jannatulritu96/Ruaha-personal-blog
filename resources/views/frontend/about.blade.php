@extends('frontend.layout.masters')
@section('content')
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
