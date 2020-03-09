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
            @if(Auth::user()->type == 1)
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
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="fa fa-cubes"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link  waves-effect waves-dark" href="{{ route('category.index') }}">
                                <i class="fa fa-table"></i>
                                <span>Category</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link  waves-effect waves-dark" href="{{ route('sub_category.index') }}">
                                <i class="fa fa-table"></i>
                                <span>Sub Category</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <i class="fa fa-cubes"></i>
                    <span class="hide-menu">Post</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a class="sidebar-link  waves-effect waves-dark" href="{{ route('post.index') }}">
                            <i class="fa fa-table"></i>
                            <span>Posts</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link  waves-effect waves-dark" href="{{ route('tags.index') }}">
                            <i class="fa fa-table"></i>
                            <span>Tags</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
