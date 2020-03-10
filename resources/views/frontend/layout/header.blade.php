<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                A Bright Sunny Day Or Some Line Of Text
            </div>
            <div class="col-sm-6">
                <div class="social-icons">
                    <ul>
                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Twitter"><i
                                    class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Facebook"><i
                                    class="fa fa-facebook"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Pinterest"><i
                                    class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Google Plus"><i
                                    class="fa fa-google-plus"></i></a></li>
                        <li>
                            <div class="box-search">
                                <input class="search-input" type="search" placeholder="Search"/>
                                <div class="icon"></div>
                            </div>
                            <a href="#" class="icon"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="nav-wrap">
    <div class="container">
        <div id="menuzord" class="menuzord red pull-left">
            <a href="javascript:void(0)" class="menuzord-brand"><img src="{{ asset('frontend/images/logo.png') }}"
                                                                     alt="Ruaha Logo"></a>
            <ul class="menuzord-menu">
                <li class="active"><a href="{{ route('home') }}">Home</a>
                </li>
                <li><a href="{{ route('about') }}">About Me</a></li>
                <li><a href="#">Category</a>
                    <ul class="dropdown">
                        @foreach($categories as $cat)
                            <li><a href="{{ route('category.post',$cat->id) }}">{{ $cat->name }}
                                    .............{{ $cat->rel_post_count }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="#">My account</a>
                    <ul class="dropdown">
                        @if (Auth::check())
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('post.create') }}">Create post</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i
                                        class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Sign in</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"></div>
