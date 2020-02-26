<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!-- Mirrored from mannatstudio.com/html/ruaha/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 06:30:19 GMT -->
<body class="wide">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<!-- xxx Loader Start xxx -->
<div id="pageloader">
    <div class="loader-item">
        <img src="{{ asset('frontend/images/preloader.gif') }}" alt='loader' />
        <div>Loading...</div>
    </div>
</div>
<!-- xxx End xxx -->
    <head>
        @include('frontend.layout._head')
    </head>

<!-- xxx Header Start xxx -->
    <header>
        @include('frontend.layout.header')
    </header>
<!-- xxx Header End xxx -->
    @yield('content')
<!-- xxx Body Content xxx -->

<!-- xxx Footer xxx -->
<footer>
    @include('frontend.layout.footer')
</footer>
<!-- xxx Footer End xxx -->

@include('frontend.layout.script')
</body>


<!-- Mirrored from mannatstudio.com/html/ruaha/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 06:32:26 GMT -->
</html>

