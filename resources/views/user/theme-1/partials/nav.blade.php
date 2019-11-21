<!-- header start -->
<!-- classes:  -->
<!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
<!-- "dark": dark version of header e.g. class="header dark clearfix" -->
<!-- "full-width": mandatory class for the full-width menu layout -->
<!-- "centered": mandatory class for the centered logo layout -->
<!-- ================ --> 
<header class="header fixed clearfix">
	
	<div class="container">
		<div class="row">
			<div class="col-md-3 ">
				<!-- header-left start -->
				<!-- ================ -->
				<div class="header-left clearfix">
					
					<!-- logo -->
					<div id="logo" class="logo">
						<a href="/home">
							<img class="logo_image" id="logo_img" src="{{asset('images/settings/thumbnails/'.$settings->logo)}}" alt="{{$settings->title}}">
						</a>
					</div>

					<!-- name-and-slogan -->
					<div class="site-slogan">
						{{$settings->slogan}}
					</div>

				</div>
				<!-- header-left end -->

			</div>
			<div class="col-md-9">
	
				<!-- header-right start -->
				<!-- ================ -->
				<div class="header-right clearfix">
					
				<!-- main-navigation start -->
				<!-- classes: -->
				<!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
				<!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
				<!-- "with-dropdown-buttons": Mandatory class that adds extra space, to the main navigation, for the search and cart dropdowns -->
				<!-- ================ -->
				<div class="main-navigation animated with-dropdown-buttons">

					<!-- navbar start -->
					<!-- ================ -->
					<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">

							<!-- Toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="navbar-collapse-1">
								<!-- main-menu -->
								<ul class="nav navbar-nav ">
									<!-- mega-menu end -->
									<li class="dropdown ">
										<a href="{{route('posts.index')}}" class="dropdown-toggle" data-toggle="dropdown">
											{{trans('general.navigation.posts')}}
										</a>
										@include($path . 'partials/categories/tree', ['categories'=>$categories->where('name', '=', 'posts')->first()->children])
									</li>
									<li class="dropdown ">
										<a href="{{route('pages.index')}}" class="dropdown-toggle" data-toggle="dropdown">
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
									<li class="dropdown ">
										<a href="{{route('products.index')}}" class="dropdown-toggle" data-toggle="dropdown">
											{{trans('general.navigation.products')}}
										</a>
										@include($path . 'partials/categories/tree', ['categories'=>$categories->where('name', '=', 'products')->first()->children])
									</li>
									<li>
										<a href="{{route('contact')}}">{{trans('general.navigation.contact')}}</a>
									</li>
									<li>
										<a href="{{route('about')}}">{{trans('general.navigation.about')}}</a>
									</li>
									<li>
										<a href="{{route('faq.index')}}">
											{{-- <i class="fa fa-question-circle"></i> --}}
											{{trans('general.navigation.faq')}}
										</a>
									</li>
								</ul>
								<!-- main-menu end -->
								
								<!-- header dropdown buttons -->
								<div class="header-dropdown-buttons hidden-xs ">
									<div class="btn-group dropdown">
										<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
											<i class="icon-search"></i>
										</button>
										<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
											<li>
												<form method="GET" action="{{route('search')}}" role="search" class="search-box margin-clear">
													<div class="form-group has-feedback">
														<input name="search" id="search_box" type="text" class="form-control" placeholder="{{trans('general.search')}}">
														<i class="icon-search form-control-feedback"></i>
													</div>
													<div id="searchResponse"></div>
												</form>
											</li>
										</ul>

									</div>
									@if($cart)
										<div class="btn-group dropdown">
											<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-basket-1"></i><span class="cart-count default-bg">{{$cart->count()}}</span></button>
											<ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
												<li>
													<table class="table table-hover">
														<thead>
															<tr>
																<th class="quantity">{{trans('general.navigation.quantity-short')}}</th>
																<th class="product">{{trans('general.navigation.product')}}</th>
																<th class="amount">{{trans('general.navigation.subtotal')}}</th>
															</tr>
														</thead>
														<tbody>
															@foreach($cart as $product)
																<tr>
																	<td class="quantity">{{$product->pivot->quantity}} x</td>
																	<td class="product"><a href="template/shop-product.html">{{$product->name}}</a><span class="small">{{$product->short_description}}</span></td>
																	<td class="amount pull-right">{{$product->formatedCurrentPrice.$cart->currency}}</td>
																</tr>
															@endforeach
															<tr>
																<td class="total-quantity" colspan="2">{{trans('general.total')}} {{$cart->count()}} {{trans('general.items')}}</td>
																<td class="total-amount">{{$cart->totalPrice}}</td>
															</tr>
														</tbody>
													</table>
													<div class="panel-body text-right">
														<a href="{{route('cart.cart')}}" class="btn btn-group btn-gray btn-sm">{{trans('general.navigation.view-cart')}}</a>
														<a href="{{route('purchases.checkoutCart')}}" class="btn btn-group btn-gray btn-sm">{{trans('general.checkout')}}</a>
													</div>
												</li>
											</ul>
										</div>
									@endif
									@if(count($languages)>1)
										<div class="btn-group dropdown">
											<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" title="">
												<i class="fa fa-globe"></i>
											</button>
											<ul class="dropdown-menu dropdown-animation language-switcher-area">
												<li>
													<form method="POST" action="{{route('switchLanguage')}}">
														@csrf
														@foreach($languages as $language)
															<input type="submit" name="language" class="btn btn-default btn-sm language-switcher @if(App::getLocale() === $language->code) active @endif" value="{{$language->native}}">
														@endforeach
													</form>
												</li>
											</ul>
										</div>
									@endif
									@role('admin')
										<a id="go-to-admin" href="{{route('admin.home')}}" class="btn btn-warning pull-rigth">{{trans('general.go-to-admin')}}</a>
									@endrole
								</div>
								<!-- header dropdown buttons end-->
								
							</div>

						</div>
					</nav>
					<!-- navbar end -->

				</div>
				<!-- main-navigation end -->
				</div>
				<!-- header-right end -->
	
			</div>
		</div>
	</div>
	
</header>
<!-- header end -->