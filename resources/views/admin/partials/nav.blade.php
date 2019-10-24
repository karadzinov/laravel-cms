<div class="navbar navbar-fixed-top">
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
                                <a class="" id="chat-link" title="{{trans('admin.chat')}}" href="javascript:void(0)">
                                    <i class="icon glyphicon glyphicon-comment"></i>
                                    <span id="notificationsNumber" class="badge"></span>
                                </a>
                            </li>
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar" title="View your public profile">
                                        <img src="{{Auth::user()->image}}">
                                    </div>
                                    <section>
                                        <h2>
                                            <span class="profile">
                                                <span>  {{Auth::user()->name}}</span>
                                            </span>
                                        </h2>
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
                                                <span class="caption">{{trans('admin.change-photo')}}</span>
                                            {{-- @else --}}
                                                {{-- <div class="user-avatar-nav"></div> --}}
                                            {{-- @endif --}}
                                        </div>
                                    </li>
                                    <!--Avatar Area-->
                                    <li class="edit">
                                        <a href="{{ url('/profile/'.Auth::user()->name) }}" class="pull-left">{!! trans('titles.profile') !!}</a>
                                        <a href="{{ url('/profile/'.Auth::user()->name.'/edit') }}" class="pull-right">{{trans('admin.settings')}}</a>
                                    </li>
                                    <!--Theme Selector Area-->
                                    <li class="theme-area">
                                        <ul class="colorpicker" id="skin-changer">
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#5DB2FF;" rel="/assets/css/skins/blue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#2dc3e8;" rel="/assets/css/skins/azure.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#03B3B2;" rel="/assets/css/skins/teal.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#53a93f;" rel="/assets/css/skins/green.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#FF8F32;" rel="/assets/css/skins/orange.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#cc324b;" rel="/assets/css/skins/pink.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#AC193D;" rel="/assets/css/skins/darkred.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#8C0095;" rel="/assets/css/skins/purple.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#0072C6;" rel="/assets/css/skins/darkblue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#585858;" rel="/assets/css/skins/gray.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#474544;" rel="/assets/css/skins/black.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="javascript:void(0)" style="background-color:#001940;" rel="/assets/css/skins/deepblue.min.css"></a></li>
                                        </ul>
                                    </li>
                                    <!--/Theme Selector Area-->
                                    <li class="dropdown-footer">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('admin.logout') }}
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
                            no space mu<input type="submit" name="language" class="btn btn-warning btn-sm admin-language-switcher" value="sr">vost be between these elements-->
                        <!-- languages -->
                        </ul>
                        @if($languages->count() > 1)
                            <div class="setting">
                                <a id="btn-setting" title="Language Switcher" href="javascript:void(0)">
                                    <i class="icon fa fa-globe"></i>
                                </a>
                            </div>
                            <div class="setting-container">
                                <form id="language-switcher-form" method="POST" action="{{route('switchLanguage')}}">
                                    @foreach($languages as $language)
                                        @csrf
                                        <input type="submit" name="language" class="btn btn-warning btn-sm admin-language-switcher @if(App::getLocale() === $language->code) active @endif" value="{{$language->native}}">
                                    @endforeach
                                </form>
                            </div>
                        @endif
                        <!-- languages -->
                    @endguest
                                                                <!-- Settings -->
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>