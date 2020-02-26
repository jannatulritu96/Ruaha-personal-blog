<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item">
                <h4 class="sidebar-link  waves-effect waves-dark profile-dd text-center">
                    {{--                    <img src="{{ asset('assets/assets/images/users/1.jpg') }}" class="rounded-circle ml-2" width="30">--}}
                    <span>{{ Auth::user()->name }}</span>
                </h4>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link  waves-effect waves-dark" href="{{ route('dashboard') }}">
                    <i class="fa fa-table"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link  waves-effect waves-dark" href="{{ route('user.index') }}">
                    <i class="fa fa-table"></i>
                    <span>Author</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link  waves-effect waves-dark" href="{{ route('category.index') }}">
                    <i class="fa fa-table"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link  waves-effect waves-dark" href="{{ route('dashboard') }}">
                    <i class="fa fa-table"></i>
                    <span>Posts</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
