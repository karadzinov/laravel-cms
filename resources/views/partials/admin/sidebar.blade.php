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
            <a href="/home">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>
        <li class="{{ Request::is('admin/node/category/*') ? 'active' : null }}">
            <a href="{{route('admin.category.index')}}" class="menu">
                <i class="menu-icon fa fa-list-ol"></i>
                <span class="menu-text"> {!! trans('titles.Categories') !!} </span>

            </a>
        </li>
        <li class="{{ Request::is('admin/meta/settings') ? 'active' : null }}">
            <a href="{{ url('admin/meta/settings') }}" class="menu">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text"> {!! trans('titles.Settings') !!} </span>
            </a>
        </li>
        <li class="{{Request::is('profile/*'.Auth::user()->name) ? 'active' : null}}">
            <a href="{{ url('/profile/'.Auth::user()->name) }}" class="menu">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> Profile </span>
            </a>
        </li>
        <li class="{{Request::is('admin/users/*') ? 'active' : null}}">
            <a href="{{ route('admin.users') }}" class="menu">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Users </span>
            </a>
        </li>
        <li class="{{Request::is('admin/scripts/*') ? 'active' : null}}">
            <a href="{{ route('admin.scripts.index')}}" class="menu">
                <i class="menu-icon fa fa-code"></i>
                <span class="menu-text"> Scripts </span>
            </a>
        </li>
        <li class="{{Request::is('admin/posts/*') ? 'active' : null}}">
            <a href="{{ route('admin.posts.index')}}" class="menu">
                <i class="menu-icon fa fa-pencil"></i>
                <span class="menu-text"> Posts </span>
            </a>
        </li>
        <li class="{{Request::is('admin/pages/*') ? 'active' : null}}">
            <a href="{{ route('admin.pages.index')}}" class="menu">
                <i class="menu-icon fa fa-newspaper-o"></i>
                <span class="menu-text"> Pages </span>
            </a>
        </li>
        <li class="{{Request::is('admin/testimonials/*') ? 'active' : null}}">
            <a href="{{ route('admin.testimonials.index')}}" class="menu">
                <i class="menu-icon fa fa-comments"></i>
                <span class="menu-text"> Testimonials </span>
            </a>
        </li>
        <li class="{{Request::is('admin/abouts/*') ? 'active' : null}}">
            <a href="{{ route('admin.about.show')}}" class="menu">
                <i class="menu-icon fa fa-id-card-o"></i>
                <span class="menu-text"> About </span>
            </a>
        </li>
        <li class="{{(Request::is('admin/faq/*') || Request::is('admin/faq-categories/*')) ? 'open active' : null}}">
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-question"></i>
                <span class="menu-text"> FAQs </span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu" style="display: none;">
                <li class="{{Request::is('admin/faq/*') ? 'active' : null}}">
                    <a href="{{ route('admin.faq.index')}}">
                        <span class="menu-text"> FAQs </span>
                    </a>
                </li>
               <li class="{{Request::is('admin/faq-categories/*') ? 'active' : null}}">
                    <a href="{{ route('admin.faq-categories.index')}}">
                        <span class="menu-text"> FAQ Categories </span>
                    </a>
                </li>
            </ul>
        </li>
        @php
            $systemRoutes = ['/activity', '/phpinfo', '/admin/logs', '/admin/routes', '/admin/active-users'];
        @endphp
        
        <li class="@if(in_array(Request::getRequestUri(), $systemRoutes)) open active @endif">
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-cog"></i>
                <span class="menu-text"> System </span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu" style="display: none;">
                <li class="{{Request::is('activity') ? 'active' : null}}">
                    <a href="{{ route('activity')}}">
                        <span class="menu-text"> Activity </span>
                    </a>
                </li>
               <li class="{{Request::is('phpinfo') ? 'active' : null}}">
                    <a href="/phpinfo">
                        <span class="menu-text"> Php Info </span>
                    </a>
                </li>  
                <li class="{{Request::is('admin/logs') ? 'active' : null}}">
                     <a href="/admin/logs">
                         <span class="menu-text"> Logs </span>
                     </a>
                 </li>
                 <li class="{{Request::is('admin/routes') ? 'active' : null}}">
                     <a href="/admin/routes">
                         <span class="menu-text"> Routes </span>
                     </a>
                 </li>
                 <li class="{{Request::is('admin/active-users') ? 'active' : null}}">
                     <a href="/admin/active-users">
                         <span class="menu-text"> Online Users </span>
                     </a>
                 </li>
            </ul>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
<!-- /Page Sidebar -->
