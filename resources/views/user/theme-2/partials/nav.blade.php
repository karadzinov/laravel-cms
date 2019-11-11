<!-- 
	AVAILABLE HEADER CLASSES

	Default nav height: 96px
	.header-md 		= 70px nav height
	.header-sm 		= 60px nav height

	.b-0 		= remove bottom border (only with transparent use)
	.transparent	= transparent header
	.translucent	= translucent header
	.sticky			= sticky header
	.static			= static header
	.dark			= dark header
	.bottom			= header on bottom
	
	shadow-before-1 = shadow 1 header top
	shadow-after-1 	= shadow 1 header bottom
	shadow-before-2 = shadow 2 header top
	shadow-after-2 	= shadow 2 header bottom
	shadow-before-3 = shadow 3 header top
	shadow-after-3 	= shadow 3 header bottom

	.clearfix		= required for mobile menu, do not remove!

	Example Usage:  class="clearfix sticky header-sm transparent b-0"
-->
<div id="header" class="navbar-toggleable-md translucent clearfix">

	<!-- TOP NAV -->
	<header id="topNav">
		<div class="container">

			<!-- Mobile Menu Button -->
			<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
				<i class="fa fa-bars"></i>
			</button>

			<!-- BUTTONS -->
			<ul class="float-right nav nav-pills nav-second-main">

				<!-- SEARCH -->
				<li class="search fullscreen dark">
					<a href="javascript:;">
						<i class="fa fa-search"></i>
					</a>
					<div class="search-box">
						<a id="closeSearch" href="javascript:void(0)">X</a>

						<form action="{{route('search')}}" method="get">
							<div class="input-group">
								<input id="search_box" type="text" placeholder="{{trans('general.search')}}" name="search" class="form-control" placeholder="{{trans('general.search')}}..." />
								<span class="input-group-btn">
									<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
								</span>
								<div id="searchResponse"></div>
							</div>
						</form>
					</div> 
				</li>
				@if($cart)
					<li class="quick-cart">
						<a href="#">
							<span class="badge badge-aqua badge-corner">{{$cart->count()}}</span>
							<i class="fa fa-shopping-cart"></i> 
						</a>
						<div class="quick-cart-box">
							<h4>{{trans('general.my-cart')}}</h4>

							<div class="quick-cart-wrapper">

								@foreach($cart as $product)
									<a href="{{$product->showRoute}}"><!-- cart item -->
										<img src="{{$product->thumbnail}}" width="45" height="45" alt="">
										<h6><span>{{$product->pivot->quantity}}x</span> {{$product->name}}</h6>
										<small>{{$product->currentPrice . $cart->currency}}</small>
									</a><!-- /cart item -->
								@endforeach

							</div>

							<!-- quick cart footer -->
							<div class="quick-cart-footer clearfix">
								<a href="{{route('cart.cart')}}" class="btn btn-primary btn-sm float-right uppercase">{{trans('general.navigation.view-cart')}}</a>
								<span class="float-left"><strong>{{trans('general.total')}}:</strong> {{$cart->totalPrice}}</span>
							</div>
							<!-- /quick cart footer -->

						</div>
					</li>
				@endif
				<!-- /SEARCH -->
				@if($languages->count()>1)
					<li class="nav-item dropdown language-switcher">
				        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="language-switcher" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          <i class="fa fa-globe"></i> 
				        </a>
				        <div class="dropdown-menu" aria-labelledby="language-switcher">
				        	<form method="POST" action="{{route('switchLanguage')}}">
				        		@csrf
				        		@foreach($languages as $language)
				        			<li>
				        				<input type="submit" name="language" class="btn btn-primary btn-block @if(App::getLocale() === $language->code) active @endif dropdown-item" value="{{$language->native}}">
				        			</li>
				        		@endforeach
				        	</form>
				        </div>
				   	</li>
				@endif
			</ul>
			<!-- /BUTTONS -->

			<!-- Logo -->
			<a class="logo float-left" href="{{route('public.home')}}">
				{{-- <img src="{{asset('assets/theme-2/images/_smarty/logo_light.png')}}" alt="" /> --}}
				<img class="nav-logo" src="{{asset('images/settings/thumbnails/'.$settings->logo)}}" alt="" />
			</a>

			<!-- 
				Top Nav 
				
				AVAILABLE CLASSES:
				submenu-dark = dark sub menu
			-->
			<div class="navbar-collapse collapse float-right nav-main-collapse submenu-dark">
				<nav class="nav-main">

					<!--
						NOTE
						
						For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
						Direct Link Example: 

						<li>
							<a href="javascript:void(0)">HOME</a>
						</li>
					-->
					<ul id="topMain" class="nav nav-pills nav-main uppercase">
						<li>
							<a href="/home">{{trans('general.navigation.home')}}</a>
						</li>
						<li class="dropdown {{-- active --}}"><!-- POSTS -->
							<a class="dropdown-toggle" href="{{route('posts.index')}}">
								{{trans('general.navigation.posts')}}
							</a>
							@include($path . 'partials/categories/tree')
						</li>
						<li class="dropdown"><!-- PAGES -->
							<a class="dropdown-toggle" href="{{route('pages.index')}}">
								{{trans('general.navigation.pages')}}
							</a>
							<ul class="dropdown-menu">
								@foreach($pages as $page)
									<li>
										<a href="{{$page->showRoute}}">
											{!!$page->title!!}
										</a>
									</li>
								@endforeach
							</ul>
						</li>
						<li>
							<a href="{{route('products.index')}}">
								{{trans('general.navigation.products')}}
							</a>
						</li>
						<li>
							<a href="{{route('contact')}}">
								{{trans('general.navigation.contact')}}
							</a>
						</li>
						<li>
							<a href="{{route('about')}}">
								{{trans('general.navigation.about')}}
							</a>
						</li>
						<li>
							<a href="{{route('faq.index')}}">
								{{trans('general.navigation.faq')}}
							</a>
						</li>
						@role('admin')
							<li>
								<a href="{{route('admin.home')}}">{{trans('general.go-to-admin')}}</a>
							</li>
						@endrole
						@auth
							<li class="dropdown resp-active"><!-- BLOG and SHOP -->
								<a class="dropdown-toggle" href="#">
									Profile
								</a>
								<ul class="dropdown-menu">
									<!-- BLOG -->
									<li>
										<h4>
											<a href="{{route('purchases.index')}}">
												<i class="fa fa-bank"></i> 
												{{trans('general.my-purchases')}}
											</a>
										</h4>
									</li>
									<li>
										<h4>
											<a href="{{ route('logout') }}" onclick="event.preventDefault();
		                                                         document.getElementById('logout-form').submit();">
		                                        <i class="fa fa-sign-out"></i> 
		                                        {{trans('general.header.logout')}}
		                                    </a>
		                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                                        @csrf
		                                    </form>
										</h4>
									</li>
								</ul>
							</li>
						@else
							<li class="dropdown resp-active"><!-- BLOG and SHOP -->
								<a class="dropdown-toggle" href="#">
									{{trans('auth.login')}} &amp; {{trans('auth.register')}}
								</a>
								<ul class="dropdown-menu">

									<!-- BLOG -->
									<li>
										<h4><a href="{{route('login')}}"><i class="fa fa-sign-in"></i>  {{trans('auth.login')}}</a></h4>
									</li>
									<!-- SHOP -->
									<li>
										<h4><a href="{{route('login')}}"><i class="fa fa-registered"></i>  {{trans('auth.register')}}</a></h4>
									</li>
								</ul>
							</li>
						@endauth
					</ul>

				</nav>
			</div>

		</div>
	</header>
	<!-- /Top Nav -->

</div>