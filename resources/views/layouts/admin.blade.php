@include('partials._admin_head')
@include('partials._admin_navigation')
{{-- the siebar starts here --}}
@yield('sidebar')
{{-- end sidebar --}}
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Username</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li class="parent "><a data-toggle="collapse" href="#users">
            <em class="fa fa-navicon">&nbsp;</em> Users <span data-toggle="collapse" href="#users" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="users">
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> All Users
                </a></li>
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> Create User
                </a></li>
     
            </ul>
        </li>
        
        <li class="parent "><a data-toggle="collapse" href="#posts">
            <em class="fa fa-navicon">&nbsp;</em> Posts <span data-toggle="collapse" href="#posts" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="posts">
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> All Posts
                </a></li>
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> Create Post
                </a></li>

            </ul>
        </li>
        
        <li class="parent "><a data-toggle="collapse" href="#categories">
            <em class="fa fa-navicon">&nbsp;</em> Categories<span data-toggle="collapse" href="#categories" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="categories">
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> All Categories
                </a></li>
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> Create Category
                </a></li>
 
            </ul>
        </li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
            <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
                </a></li>
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
                </a></li>
                <li><a class="" href="#">
                    <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
                </a></li>
            </ul>
        </li>
        <li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
        <li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
        <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
        <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>

        <li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->
{{-- start main content section --}}

@yield('main_content')
{{-- end main_content section --}}

<script src="{{asset('/js/admin/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('/js/admin/bootstrap.min.js')}}"></script>
@include('partials._admin_footer')