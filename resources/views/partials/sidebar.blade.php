<div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input type="text" class="searchinput">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li>
            <a href="/">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>
        <li class="{{ Request::is('node/category') ? 'active' : null }}">
            <a href="/node/category" class="menu">
                <i class="menu-icon fa fa-list-ol"></i>
                <span class="menu-text"> {!! trans('titles.Categories') !!} </span>

            </a>
        </li>
        <li class="{{ Request::is('meta/settings') ? 'active' : null }}">
            <a href="{{ url('/meta/settings') }}" class="menu">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text"> {!! trans('titles.Settings') !!} </span>

            </a>
        </li>
        <li class="{{Request::is('profile/'.Auth::user()->name) ? 'active' : null}}">
            <a href="{{ url('/profile/'.Auth::user()->name) }}" class="menu">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Profile </span>

            </a>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
<!-- /Page Sidebar -->
