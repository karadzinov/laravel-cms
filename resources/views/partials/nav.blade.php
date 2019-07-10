<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="{{ url('/') }}" class="navbar-brand">

                    <small>
                        </small></a><small><a href="{{url('/')}}" class="logo-cms">{!! config('app.name', trans('titles.app')) !!}</a>
                    </small>
                
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ trans('titles.login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ trans('titles.register') }}</a></li>
                    @else
                        <ul class="account-area">
                            <li>
                                <a class="wave in" id="chat-link" title="Chat" href="#">
                                    <i class="icon glyphicon glyphicon-comment"></i>
                                </a>
                            </li>
                            <li class="">
                                <a class="login-area dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar" title="View your public profile">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span>  {{Auth::user()->name}}</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>  {{Auth::user()->name}}</a></li>
                                    <li class="email"><a>  {{Auth::user()->email}}</a></li>
                                    <!--Avatar Area-->
                                    <li>
                                        <div class="avatar-area">
                                            {{-- @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1) --}}
                                                <img src="{{Auth::user()->image}}" alt="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}" class="img-responsive">
                                                <span class="caption">Change Photo</span>
                                            {{-- @else --}}
                                                {{-- <div class="user-avatar-nav"></div> --}}
                                            {{-- @endif --}}
                                        </div>
                                    </li>
                                    <!--Avatar Area-->
                                    <li class="edit">
                                        <a href="{{ url('/profile/'.Auth::user()->name) }}" class="pull-left">{!! trans('titles.profile') !!}</a>
                                        <a href="{{ url('/profile/'.Auth::user()->name.'/edit') }}" class="pull-right">Setting</a>
                                    </li>
                                    <!--Theme Selector Area-->
                                    <li class="theme-area">
                                        <ul class="colorpicker" id="skin-changer">
                                            <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/assets/css/skins/blue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/assets/css/skins/azure.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/assets/css/skins/teal.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/assets/css/skins/green.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/assets/css/skins/orange.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/assets/css/skins/pink.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/assets/css/skins/darkred.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/assets/css/skins/purple.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/assets/css/skins/darkblue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/assets/css/skins/gray.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/assets/css/skins/black.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/assets/css/skins/deepblue.min.css"></a></li>
                                        </ul>
                                    </li>
                                    <!--/Theme Selector Area-->
                                    <li class="dropdown-footer">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                    @endguest
                                                                <!-- Settings -->
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>