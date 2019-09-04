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
        <li class="{{ Request::is('admin/home') ? 'active' : null }}">
            <a href="{{route('admin.home')}}">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> {{trans('sidebar.dashboard')}} </span>
            </a>
        </li>
        <li>
            <a href="{{route('public.home')}}">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> {{trans('sidebar.user-home-page')}} </span>
            </a>
        </li>
        <li class="{{Request::is('profile/'.Auth::user()->name . '/*') ? 'active' : null}}">
            <a href="{{ url('/profile/'.Auth::user()->name) }}" class="menu">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> {{trans('sidebar.profile')}} </span>
            </a>
        </li>
        <li class="{{Request::is('admin/users*') ? 'active' : null}}">
            <a href="{{ route('admin.users') }}" class="menu">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> {{trans('sidebar.users')}} </span>
            </a>
        </li>
        <li class="{{Request::is('admin/slides*') ? 'active' : null}}">
            <a href="{{ route('admin.slides.index')}}" class="menu">
                <i class="menu-icon fa fa-sliders"></i>
                <span class="menu-text"> {{trans('sidebar.slides')}} </span>
            </a>
        </li>
        <li class="{{Request::is('admin/posts/*') ? 'active' : null}}">
            <a href="{{ route('admin.posts.index')}}" class="menu">
                <i class="menu-icon fa fa-pencil"></i>
                <span class="menu-text"> {{trans('sidebar.posts')}} </span>
            </a>
        </li>
        <li class="{{ Request::is('admin/node/category*') ? 'active' : null }}">
            <a href="{{route('admin.category.index')}}" class="menu">
                <i class="menu-icon fa fa-list-ol"></i>
                <span class="menu-text"> {{trans('sidebar.categories')}} </span>

            </a>
        </li>
        <li class="{{Request::is('admin/pages/*') ? 'active' : null}}">
            <a href="{{ route('admin.pages.index')}}" class="menu">
                <i class="menu-icon fa fa-newspaper-o"></i>
                <span class="menu-text"> {{trans('sidebar.pages')}} </span>
            </a>
        </li>
        <li class="{{Request::is('admin/about*') ? 'active' : null}}">
            <a href="{{ route('admin.about.show')}}" class="menu">
                <i class="menu-icon fa fa-id-card-o"></i>
                <span class="menu-text"> {{trans('sidebar.about')}} </span>
            </a>
        </li>
        <li class="{{ Request::is('admin/meta/settings*') ? 'active' : null }}">
            <a href="{{ url('admin/meta/settings') }}" class="menu">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text"> {{trans('sidebar.settings')}} </span>
            </a>
        </li>
        <li class="{{Request::is('admin/partners*') ? 'active' : null}}">
            <a href="{{ route('admin.partners.index')}}" class="menu">
                <i class="menu-icon fa fa-handshake-o"></i>
                <span class="menu-text"> {{trans('sidebar.partners')}} </span>
            </a>
        </li>
        <li class="{{Request::is('admin/testimonials/*') ? 'active' : null}}">
            <a href="{{ route('admin.testimonials.index')}}" class="menu">
                <i class="menu-icon fa fa-comments"></i>
                <span class="menu-text"> {{trans('sidebar.testimonials')}} </span>
            </a>
        </li>
        <li class="{{(Request::is('admin/faq/*') || Request::is('admin/faq-categories/*')) ? 'open active' : null}}">
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-question"></i>
                <span class="menu-text"> {{trans('sidebar.faqs')}} </span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu" style="display: none;">
                <li class="{{Request::is('admin/faq/*') ? 'active' : null}}">
                    <a href="{{ route('admin.faq.index')}}">
                        <span class="menu-text"> {{trans('sidebar.faqs')}} </span>
                    </a>
                </li>
               <li class="{{Request::is('admin/faq-categories/*') ? 'active' : null}}">
                    <a href="{{ route('admin.faq-categories.index')}}">
                        <span class="menu-text"> {{trans('sidebar.faq-categories')}} </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{Request::is('admin/scripts/*') ? 'active' : null}}">
            <a href="{{ route('admin.scripts.index')}}" class="menu">
                <i class="menu-icon fa fa-code"></i>
                <span class="menu-text"> {{trans('sidebar.scripts')}} </span>
            </a>
        </li>
        <li class="{{Request::is('admin/translations*') ? 'active' : null}}">
            <a href="{{ route('admin.translations.index')}}" class="menu">
                <i class="menu-icon fa fa-book"></i>
                <span class="menu-text"> {{trans('sidebar.translations')}} </span>
            </a>
        </li>
        @php
            $systemRoutes = ['/activity', '/phpinfo', '/admin/logs', '/admin/active-users'];
        @endphp
        
        <li class="@if(in_array(Request::getRequestUri(), $systemRoutes)) open active @endif">
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-cog"></i>
                <span class="menu-text"> {{trans('sidebar.system')}} </span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu" style="display: none;">
                <li class="{{Request::is('activity') ? 'active' : null}}">
                    <a href="{{ route('activity')}}">
                        <span class="menu-text"> {{trans('sidebar.activity')}} </span>
                    </a>
                </li>
               <li class="{{Request::is('phpinfo') ? 'active' : null}}">
                    <a href="/phpinfo">
                        <span class="menu-text"> {{trans('sidebar.php-info')}} </span>
                    </a>
                </li>  
                <li class="{{Request::is('admin/logs') ? 'active' : null}}">
                     <a href="/admin/logs">
                         <span class="menu-text"> {{trans('sidebar.logs')}} </span>
                     </a>
                 </li>
                 <li class="{{Request::is('admin/active-users') ? 'active' : null}}">
                     <a href="/admin/active-users">
                         <span class="menu-text"> {{trans('sidebar.online-users')}} </span>
                     </a>
                 </li>
            </ul>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
<!-- /Page Sidebar -->
