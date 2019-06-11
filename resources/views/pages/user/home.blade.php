@extends('layouts/master')
@section('content')
	<!-- header-container start -->
	<div class="header-container">
		
		
		<!-- header-top start -->
		<!-- classes:  -->
		<!-- "dark": dark version of header top e.g. class="header-top dark" -->
		<!-- "colored": colored version of header top e.g. class="header-top colored" -->
		<!-- ================ -->
		<div class="header-top dark ">
			<div class="container">
				<div class="row">
					<div class="col-xs-3 col-sm-6 col-md-9">
						<!-- header-top-first start -->
						<!-- ================ -->
						<div class="header-top-first clearfix">
							<ul class="social-links circle small clearfix hidden-xs">
								<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
								<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
								<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
								<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
								<li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>
								<li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
								<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
							</ul>
							<div class="social-links hidden-lg hidden-md hidden-sm circle small">
								<div class="btn-group dropdown">
									<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
									<ul class="dropdown-menu dropdown-animation">
										<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
										<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
										<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
										<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
										<li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>
										<li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
										<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										<li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
									</ul>
								</div>
							</div>
							<ul class="list-inline hidden-sm hidden-xs">
								<li><i class="fa fa-map-marker pr-5 pl-10"></i>One Infinity Loop Av, Tk 123456</li>
								<li><i class="fa fa-phone pr-5 pl-10"></i>+12 123 123 123</li>
								<li><i class="fa fa-envelope-o pr-5 pl-10"></i> theproject@mail.com</li>
							</ul>
						</div>
						<!-- header-top-first end -->
					</div>
					<div class="col-xs-9 col-sm-6 col-md-3">

						<!-- header-top-second start -->
						<!-- ================ -->
						<div id="header-top-second"  class="clearfix">

							<!-- header top dropdowns start -->
							<!-- ================ -->
							<div class="header-top-dropdown text-right">
								<div class="btn-group">
									<a href="page-signup.html" class="btn btn-default btn-sm"><i class="fa fa-user pr-10"></i> Sign Up</a>
								</div>
								<div class="btn-group dropdown">
									<button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown"><i class="fa fa-lock pr-10"></i> Login</button>
									<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
										<li>
											<form class="login-form margin-clear">
												<div class="form-group has-feedback">
													<label class="control-label">Username</label>
													<input type="text" class="form-control" placeholder="">
													<i class="fa fa-user form-control-feedback"></i>
												</div>
												<div class="form-group has-feedback">
													<label class="control-label">Password</label>
													<input type="password" class="form-control" placeholder="">
													<i class="fa fa-lock form-control-feedback"></i>
												</div>
												<button type="submit" class="btn btn-gray btn-sm">Log In</button>
												<span class="pl-5 pr-5">or</span>
												<button type="submit" class="btn btn-default btn-sm">Sing Up</button>
												<ul>
													<li><a href="#">Forgot your password?</a></li>
												</ul>
												<span class="text-center">Login with</span>
												<ul class="social-links circle small colored clearfix">
													<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
													<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
													<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
												</ul>
											</form>
										</li>
									</ul>
								</div>
							</div>
							<!--  header top dropdowns end -->
						</div>
						<!-- header-top-second end -->
					</div>
				</div>
			</div>
		</div>
		<!-- header-top end -->
		
		<!-- header start -->
		<!-- classes:  -->
		<!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
		<!-- "dark": dark version of header e.g. class="header dark clearfix" -->
		<!-- "full-width": mandatory class for the full-width menu layout -->
		<!-- "centered": mandatory class for the centered logo layout -->
		<!-- ================ --> 
		<header class="header  fixed    clearfix">
			
			<div class="container">
				<div class="row">
					<div class="col-md-3 ">
						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">
							
							<!-- header dropdown buttons -->
							<div class="header-dropdown-buttons visible-xs">
								<div class="btn-group dropdown">
									<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></button>
									<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
										<li>
											<form role="search" class="search-box margin-clear">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="Search">
													<i class="icon-search form-control-feedback"></i>
												</div>
											</form>
										</li>
									</ul>
								</div>
								<div class="btn-group dropdown">
									<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-basket-1"></i><span class="cart-count default-bg">8</span></button>
									<ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
										<li>
											<table class="table table-hover">
												<thead>
													<tr>
														<th class="quantity">QTY</th>
														<th class="product">Product</th>
														<th class="amount">Subtotal</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="quantity">2 x</td>
														<td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
														<td class="amount">$199.00</td>
													</tr>
													<tr>
														<td class="quantity">3 x</td>
														<td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
														<td class="amount">$299.00</td>
													</tr>
													<tr>
														<td class="quantity">3 x</td>
														<td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
														<td class="amount">$1499.00</td>
													</tr>
													<tr>
														<td class="total-quantity" colspan="2">Total 8 Items</td>
														<td class="total-amount">$1997.00</td>
													</tr>
												</tbody>
											</table>
											<div class="panel-body text-right">
												<a href="shop-cart.html" class="btn btn-group btn-gray btn-sm">View Cart</a>
												<a href="shop-checkout.html" class="btn btn-group btn-gray btn-sm">Checkout</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- header dropdown buttons end-->
							
							<!-- logo -->
							<div id="logo" class="logo">
								<a href="index.html"><img id="logo_img" src="{{asset('assets/images/logo_light_blue.png')}}" alt="The Project"></a>
							</div>

							<!-- name-and-slogan -->
							<div class="site-slogan">
								Multipurpose HTML5 Template
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
						<div class="main-navigation  animated with-dropdown-buttons">

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

											<!-- mega-menu start -->
											<li class="dropdown active mega-menu">
												<a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Home</a>
												<ul class="dropdown-menu">
													<li>
														<div class="row">
															<div class="col-md-12">
																<h4 class="title"><i class="fa fa-laptop pr-10"></i> Demos</h4>
																<div class="row">
																	<div class="col-sm-6 col-md-3">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li class="active"><a href="index.html"><i class="icon-home pr-10"></i>Home Default</a></li>
																			<li ><a href="index-corporate-1.html"><i class="icon-suitcase pr-10"></i>Corporate 1</a></li>
																			<li ><a href="index-corporate-2.html"><i class="icon-suitcase pr-10"></i>Corporate 2</a></li>
																			<li ><a href="index-corporate-3.html"><i class="icon-suitcase pr-10"></i>Corporate 3</a></li>
																			<li ><a href="index-corporate-4.html"><i class="icon-suitcase pr-10"></i>Corporate 4 <span class="badge">v1.2</span></a></li>
																			<li ><a href="index-corporate-5.html"><i class="icon-suitcase pr-10"></i>Corporate 5 (Law Firm) <span class="badge">New</span></a></li>
																			<li ><a href="index-shop.html"><i class="icon-basket-1 pr-10"></i>Commerce 1</a></li>
																		</ul>
																	</div>
																	<div class="col-sm-6 col-md-3">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li ><a href="index-shop-2.html"><i class="icon-basket-1 pr-10"></i>Commerce 2</a></li>
																			<li ><a href="index-portfolio.html"><i class="icon-briefcase pr-10"></i>Portfolio/Agency</a></li>
																			<li ><a href="index-medical.html"><i class="fa fa-ambulance pr-10"></i>Medical</a></li>
																			<li ><a href="index-restaurant.html"><i class="fa fa-cutlery pr-10"></i>Restaurant</a></li>
																			<li ><a href="index-restaurant-2.html"><i class="fa fa-cutlery pr-10"></i>Restaurant 2 <span class="badge">NEW</span></a></li>
																			<li ><a href="index-wedding.html"><i class="icon-heart pr-10"></i>Wedding</a></li>
																			<li ><a href="index-landing.html"><i class="fa fa-star pr-10"></i>Landing Page</a></li>
																		</ul>
																	</div>
																	<div class="col-sm-6 col-md-3">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li ><a href="index-landing-2.html"><i class="fa fa-star pr-10"></i>Landing Page 2 <span class="badge">NEW</span></a></li>
																			<li ><a href="page-coming-soon.html"><i class="fa fa-clock-o pr-10"></i>Coming Soon</a></li>
																			<li ><a href="index-one-page.html"><i class="icon-home pr-10"></i>One Page Version</a></li>
																			<li ><a href="index-construction.html"><i class="fa fa-building pr-10"></i>Construction <span class="badge">v1.1</span></a></li>
																			<li ><a href="index-education.html"><i class="fa fa-graduation-cap pr-10"></i>Education <span class="badge">v1.1</span></a></li>
																			<li ><a href="index-hotel.html"><i class="fa fa-bed pr-10"></i>Hotel <span class="badge">v1.1</span></a></li>
																			<li ><a href="index-blog.html"><i class="fa fa-pencil pr-10"></i>Blog <span class="badge">v1.1</span></a></li>
																		</ul>
																	</div>
																	<div class="col-sm-6 col-md-3">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li ><a href="index-blog-2.html"><i class="fa fa-pencil pr-10"></i>Blog 2<span class="badge">NEW</span></a></li>
																			<li ><a href="index-beauty.html"><i class="fa fa-magic pr-10"></i>Beauty Center <span class="badge">v1.1</span></a></li>
																			<li ><a href="index-gym.html"><i class="fa fa-heartbeat pr-10"></i>Gym <span class="badge">v1.2</span></a></li>
																			<li ><a href="index-resume.html"><i class="fa fa-user pr-10"></i>Resume <span class="badge">v1.2</span></a></li>
																			<li ><a href="index-agency.html"><i class="fa fa-users pr-10"></i>Agency <span class="badge">v1.2</span></a></li>
																			<li ><a href="index-logistics.html"><i class="fa fa-truck pr-10"></i>Logistics <span class="badge">v1.2</span></a></li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</li>
												</ul>
											</li>
											<!-- mega-menu end -->
											<!-- mega-menu start -->
											<li class="dropdown  mega-menu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
												<ul class="dropdown-menu">
													<li>
														<div class="row">
															<div class="col-lg-8 col-md-9">
																<h4 class="title">Pages</h4>
																<div class="row">
																	<div class="col-sm-4">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li ><a href="page-about.html"><i class="fa fa-angle-right"></i>About Us 1</a></li>
																			<li ><a href="page-about-2.html"><i class="fa fa-angle-right"></i>About Us 2</a></li>
																			<li ><a href="page-about-3.html"><i class="fa fa-angle-right"></i>About Us 3</a></li>
																			<li ><a href="page-about-4.html"><i class="fa fa-angle-right"></i>About Us 4</a></li>
																			<li ><a href="page-about-me.html"><i class="fa fa-angle-right"></i>About Me</a></li>
																			<li ><a href="page-team.html"><i class="fa fa-angle-right"></i>Our Team - Options 1</a></li>
																			<li ><a href="page-team-2.html"><i class="fa fa-angle-right"></i>Our Team - Options 2</a></li>
																			<li ><a href="page-team-3.html"><i class="fa fa-angle-right"></i>Our Team - Options 3</a></li>
																			<li ><a href="page-coming-soon.html"><i class="fa fa-angle-right"></i>Coming Soon Page</a></li>
																			<li ><a href="page-faq.html"><i class="fa fa-angle-right"></i>FAQ page</a></li>
																		</ul>
																	</div>
																	<div class="col-sm-4">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li ><a href="page-services.html"><i class="fa fa-angle-right"></i>Services 1</a></li>
																			<li ><a href="page-services-2.html"><i class="fa fa-angle-right"></i>Services 2</a></li>
																			<li ><a href="page-services-3.html"><i class="fa fa-angle-right"></i>Services 3</a></li>
																			<li ><a href="page-contact.html"><i class="fa fa-angle-right"></i>Contact 1</a></li>
																			<li ><a href="page-contact-2.html"><i class="fa fa-angle-right"></i>Contact 2</a></li>
																			<li ><a href="page-contact-3.html"><i class="fa fa-angle-right"></i>Contact 3</a></li>
																			<li ><a href="page-login.html"><i class="fa fa-angle-right"></i>Login 1</a></li>
																			<li ><a href="page-login-2.html"><i class="fa fa-angle-right"></i>Login 2 - Fullsreen</a></li>
																			<li ><a href="page-signup.html"><i class="fa fa-angle-right"></i>Sign Up 1</a></li>
																			<li ><a href="page-signup-2.html"><i class="fa fa-angle-right"></i>Sign Up 2 - Fullsreen</a></li>
																		</ul>
																	</div>
																	<div class="col-sm-4">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li ><a href="page-404.html"><i class="fa fa-angle-right"></i>404 error</a></li>
																			<li ><a href="page-404-2.html"><i class="fa fa-angle-right"></i>404 error - Parallax</a></li>
																			<li ><a href="page-affix-sidebar.html"><i class="fa fa-angle-right"></i>Sidebar - Affix Menu</a></li>
																			<li ><a href="page-left-sidebar.html"><i class="fa fa-angle-right"></i>Left Sidebar</a></li>
																			<li ><a href="page-right-sidebar.html"><i class="fa fa-angle-right"></i>Right Sidebar</a></li>
																			<li ><a href="page-two-sidebars.html"><i class="fa fa-angle-right"></i>Two Sidebars</a></li>
																			<li ><a href="page-two-sidebars-left.html"><i class="fa fa-angle-right"></i>Two Sidebars Left</a></li>
																			<li ><a href="page-two-sidebars-right.html"><i class="fa fa-angle-right"></i>Two Sidebars Right</a></li>
																			<li ><a href="page-no-sidebars.html"><i class="fa fa-angle-right"></i>No Sidebars</a></li>
																			<li ><a href="page-sitemap.html"><i class="fa fa-angle-right"></i>Sitemap</a></li>
																		</ul>
																	</div>
																</div>
															</div>
															<div class="col-lg-4 col-md-3 hidden-sm">
																<h4 class="title">Premium HTML5 Template</h4>
																<p class="mb-10">The Project is perfectly suitable for corporate, business and company webpages.</p>
																<img src="{{asset('assets/images/section-image-3.png')}}" alt="The Project">
															</div>
														</div>
													</li>
												</ul>
											</li>
											<!-- mega-menu end -->
											<li class="dropdown ">
												<a class="dropdown-toggle" data-toggle="dropdown" href="#">Features</a>
												<ul class="dropdown-menu">
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Headers <span class="badge">v1.2</span></a>
														<ul class="dropdown-menu">
															<li ><a href="features-headers-default.html">Default/Semi-Transparent</a></li>
															<li ><a href="features-headers-default-dark.html">Dark/Semi-Transparent</a></li>
															<li ><a href="features-headers-gradient-dark.html">Gradient Dark <span class="badge">v1.2</span></a></li>
															<li ><a href="features-headers-gradient-light.html">Gradient Light <span class="badge">v1.2</span></a></li>
															<li ><a href="features-headers-classic.html">Classic Light</a></li>
															<li ><a href="features-headers-classic-dark.html">Classic Dark</a></li>
															<li ><a href="features-headers-colored.html">Colored/Light</a></li>
															<li ><a href="features-headers-colored-dark.html">Colored/Dark</a></li>
															<li ><a href="features-headers-full-width.html">Full Width</a></li>
															<li ><a href="features-headers-offcanvas-left.html">Offcanvas Left Side</a></li>
															<li ><a href="features-headers-offcanvas-right.html">Offcanvas Right Side</a></li>
															<li ><a href="features-headers-logo-centered.html">Logo Centered</a></li>
															<li ><a href="features-headers-slider-top.html">Slider Top</a></li>
															<li ><a href="features-headers-simple.html">Simple Static</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Sticky Headers <span class="badge">v1.2</span></a>
														<ul class="dropdown-menu">
															<li ><a href="features-headers-default.html">Default</a></li>
															<li ><a href="features-headers-sticky-2.html">Alternative <span class="badge">v1.2</span></a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Menus</a>
														<ul class="dropdown-menu">
															<li ><a href="features-headers-default.html">Default/On Hover Menu</a></li>
															<li ><a href="features-menus-onhover-no-animations.html">On Hover Menu - No Animations</a></li>
															<li ><a href="features-menus-onclick.html">On Click Menu - With Animations</a></li>
															<li ><a href="features-menus-onclick-no-animations.html">On Click Menu - No Animations</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Footers <span class="badge">v1.2</span></a>
														<ul class="dropdown-menu">
															<li ><a href="features-footers-default.html#footer">Default</a></li>
															<li ><a href="features-footers-contact-form.html#footer">Contact Form</a></li>
															<li ><a href="features-footers-contact-form-2.html#footer">Contact Form 2 <span class="badge">v1.2</span></a></li>
															<li ><a href="features-footers-google-maps.html#footer">Google Maps</a></li>
															<li ><a href="features-footers-subscribe.html#footer">Subscribe Form</a></li>
															<li ><a href="features-footers-minimal.html#footer">Minimal</a></li>
															<li ><a href="features-footers-links.html#footer">Links <span class="badge">v1.1</span></a></li>
															<li ><a href="features-footers-full-width.html#footer">Full Width <span class="badge">v1.2</span></a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Main Sliders <span class="badge">v1.2</span></a>
														<ul class="dropdown-menu">
															<li class="dropdown-header default-bg">SLIDER REVOLUTION 5 - v1.2</li>
															<li ><a href="features-sliders-fullscreen.html">Full Screen</a></li>
															<li ><a href="features-sliders-fullwidth.html">Full Width</a></li>
															<li ><a href="features-sliders-fullwidth-big-height.html">Full Width - Big Height</a></li>
															<li ><a href="features-sliders-boxedwidth-light.html">Boxed Width - Light Bg</a></li>
															<li ><a href="features-sliders-boxedwidth-dark.html">Boxed Width - Dark Bg</a></li>
															<li ><a href="features-sliders-boxedwidth-default.html">Boxed Width - Default Bg</a></li>
															<li ><a href="features-sliders-video-background.html">Video Background</a></li>
															<li ><a href="features-sliders-text-rotator.html">Text Rotator</a></li>
															<li  class="dropdown ">
															<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Revolution 4</a>
																<ul class="dropdown-menu">
																	<li ><a href="features-sliders-revolution-4-fullscreen.html">Full Screen</a></li>
																	<li ><a href="features-sliders-revolution-4-fullwidth.html">Full Width</a></li>
																	<li ><a href="features-sliders-revolution-4-fullwidth-big-height.html">Full Width - Big Height</a></li>
																	<li ><a href="features-sliders-revolution-4-boxedwidth-light.html">Boxed Width - Light Bg</a></li>
																	<li ><a href="features-sliders-revolution-4-boxedwidth-dark.html">Boxed Width - Dark Bg</a></li>
																	<li ><a href="features-sliders-revolution-4-boxedwidth-default.html">Boxed Width - Default Bg</a></li>
																	<li ><a href="features-sliders-revolution-4-video-background.html">Video Background</a></li>
																	<li ><a href="features-sliders-revolution-4-text-rotator.html">Text Rotator</a></li>
																</ul>
															</li>
														</ul>
													</li>
													<li class="dropdown">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Email Templates <span class="badge">v1.1</span></a>
														<ul class="dropdown-menu">
															<li><a target="_blank" href="email_templates/email_template_blue.html">Blue</a></li>
															<li><a target="_blank" href="email_templates/email_template_brown.html">Brown</a></li>
															<li><a target="_blank" href="email_templates/email_template_cool_green.html">Cool Green</a></li>
															<li><a target="_blank" href="email_templates/email_template_dark_cyan.html">Dark Cyan</a></li>
															<li><a target="_blank" href="email_templates/email_template_dark_red.html">Dark Red</a></li>
															<li><a target="_blank" href="email_templates/email_template_gold.html">Gold</a></li>
															<li><a target="_blank" href="email_templates/email_template_gray.html">Gray</a></li>
															<li><a target="_blank" href="email_templates/email_template_green.html">Green</a></li>
															<li><a target="_blank" href="email_templates/email_template_light_blue.html">Light Blue</a></li>
															<li><a target="_blank" href="email_templates/email_template_orange.html">Orange</a></li>
															<li><a target="_blank" href="email_templates/email_template_pink.html">Pink</a></li>
															<li><a target="_blank" href="email_templates/email_template_purple.html">Purple</a></li>
															<li><a target="_blank" href="email_templates/email_template_red.html">Red</a></li>
															<li><a target="_blank" href="email_templates/email_template_vivid_red.html">Vivid Red</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Pricing Tables</a>
														<ul class="dropdown-menu">
															<li ><a href="features-pricing-tables-1.html">Pricing Tables 1</a></li>
															<li ><a href="features-pricing-tables-2.html">Pricing Tables 2</a></li>
															<li ><a href="features-pricing-tables-3.html">Pricing Tables 3</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Icons</a>
														<ul class="dropdown-menu">
															<li ><a href="features-icons-fontawesome.html">Font Awesome</a></li>
															<li ><a href="features-icons-fontello.html">Fontello</a></li>
															<li ><a href="features-icons-glyphicons.html">Glyphicons</a></li>
														</ul>
													</li>
													<li ><a href="features-dark-page.html">Dark Page</a></li>
													<li ><a href="features-typography.html">Typography</a></li>
													<li ><a href="features-backgrounds.html">Backgrounds</a></li>
													<li ><a href="features-grid.html">Grid</a></li>
												</ul>
											</li>
											<!-- mega-menu start -->
											<li class="dropdown  mega-menu narrow">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">Components</a>
												<ul class="dropdown-menu">
													<li>
														<div class="row">
															<div class="col-md-12">
																<h4 class="title"><i class="fa fa-magic pr-10"></i> Components</h4>
																<div class="row">
																	<div class="col-sm-6">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li ><a href="components-social-icons.html"><i class="icon-share pr-10"></i>Social Icons</a></li>
																			<li ><a href="components-buttons.html"><i class="icon-flask pr-10"></i>Buttons</a></li>
																			<li ><a href="components-forms.html"><i class="icon-eq pr-10"></i>Forms</a></li>
																			<li ><a href="components-tabs-and-pills.html"><i class=" icon-dot-3 pr-10"></i>Tabs &amp; Pills</a></li>
																			<li ><a href="components-accordions.html"><i class="icon-menu-outline pr-10"></i>Accordions</a></li>
																			<li ><a href="components-progress-bars.html"><i class="icon-chart-line pr-10"></i>Progress Bars</a></li>
																			<li ><a href="components-call-to-action.html"><i class="icon-chat pr-10"></i>Call to Action Blocks</a></li>
																			<li ><a href="components-alerts-and-callouts.html"><i class="icon-info-circled pr-10"></i>Alerts &amp; Callouts</a></li>
																			<li ><a href="components-content-sliders.html"><i class="icon-star-filled pr-10"></i>Content Sliders</a></li>
																			<li ><a href="components-charts.html"><i class="icon-chart-pie pr-10"></i>Charts</a></li>
																			<li ><a href="components-page-loaders.html"><i class="fa fa-circle-o-notch fa-spin"></i>Page Loaders <span class="badge">v1.1</span></a></li>
																			<li ><a href="components-icon-boxes.html"><i class="icon-picture-outline pr-10"></i>Icon Boxes</a></li>
																		</ul>
																	</div>
																	<div class="col-sm-6">
																		<div class="divider"></div>
																		<ul class="menu">
																			<li ><a href="components-image-boxes.html"><i class="icon-camera-1 pr-10"></i>Image Boxes</a></li>
																			<li ><a href="components-fullwidth-sections.html"><i class="icon-code-1 pr-10"></i>Full Width Sections</a></li>
																			<li ><a href="components-animations.html"><i class="icon-docs pr-10"></i>Animations</a></li>
																			<li ><a href="components-video-and-audio.html"><i class="icon-video pr-10"></i>Video &amp; Audio</a></li>
																			<li ><a href="components-lightbox.html"><i class="icon-plus pr-10"></i>Lightbox</a></li>
																			<li ><a href="components-counters.html"><i class="icon-sort-numeric pr-10"></i>Counters</a></li>
																			<li ><a href="components-modals.html"><i class="icon-popup pr-10"></i>Modals</a></li>
																			<li ><a href="components-tables.html"><i class="icon-th pr-10"></i>Tables</a></li>
																			<li ><a href="components-text-rotators.html"><i class="icon-arrows-ccw pr-10"></i>Text Rotators</a></li>
																			<li ><a href="components-announcement-default.html"><i class="icon-megaphone pr-10"></i>Announcements <span class="badge">NEW</span></a></li>
																			<li ><a href="components-separators.html"><i class="icon-star pr-10"></i>Separators <span class="badge">NEW</span></a></li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</li>
												</ul>
											</li>
											<!-- mega-menu end -->
											<li class="dropdown ">
												<a href="portfolio-grid-2-3-col.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio</a>
												<ul class="dropdown-menu">
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolio Grid 1</a>
														<ul class="dropdown-menu">
															<li ><a href="portfolio-grid-1-2-col.html">2 Column</a></li>
															<li ><a href="portfolio-grid-1-3-col.html">3 Column</a></li>
															<li ><a href="portfolio-grid-1-4-col.html">4 Column</a></li>
															<li ><a href="portfolio-grid-1-sidebar.html">With Sidebar</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolio Grid 2</a>
														<ul class="dropdown-menu">
															<li ><a href="portfolio-grid-2-2-col.html">2 Column</a></li>
															<li ><a href="portfolio-grid-2-3-col.html">3 Column</a></li>
															<li ><a href="portfolio-grid-2-4-col.html">4 Column</a></li>
															<li ><a href="portfolio-grid-2-sidebar.html">With Sidebar</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolio Grid 3 - Dark</a>
														<ul class="dropdown-menu">
															<li ><a href="portfolio-grid-3-2-col.html">2 Column</a></li>
															<li ><a href="portfolio-grid-3-3-col.html">3 Column</a></li>
															<li ><a href="portfolio-grid-3-4-col.html">4 Column</a></li>
															<li ><a href="portfolio-grid-3-sidebar.html">With Sidebar</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolio Fullwidth</a>
														<ul class="dropdown-menu">
															<li ><a href="portfolio-fullwidth-2-col.html">2 Column</a></li>
															<li ><a href="portfolio-fullwidth-3-col.html">3 Column</a></li>
															<li ><a href="portfolio-fullwidth-4-col.html">4 Column</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolio List</a>
														<ul class="dropdown-menu">
															<li ><a href="portfolio-list-1.html">List - Large Images</a></li>
															<li ><a href="portfolio-list-2.html">List - Small Images</a></li>
															<li ><a href="portfolio-list-sidebar.html">With Sidebar</a></li>
														</ul>
													</li>
													<li ><a href="portfolio-item.html">Single Item 1</a></li>
													<li ><a href="portfolio-item-2.html">Single Item 2</a></li>
													<li ><a href="portfolio-item-3.html">Single Item 3</a></li>
												</ul>
											</li>
											<li class="dropdown ">
												<a href="index-shop.html" class="dropdown-toggle" data-toggle="dropdown">Shop</a>
												<ul class="dropdown-menu">
													<li ><a href="index-shop.html">Shop Home 1</a></li>
													<li ><a href="index-shop-2.html">Shop Home 2</a></li>
													<li ><a href="shop-listing-4col.html">Grid - 4 Columns</a></li>
													<li ><a href="shop-listing-3col.html">Grid - 3 Columns</a></li>
													<li ><a href="shop-listing-2col.html">Grid - 2 Columns</a></li>
													<li ><a href="shop-listing-sidebar.html">Grid - With Sidebar</a></li>
													<li ><a href="shop-listing-list.html">List</a></li>
													<li ><a href="shop-product.html">Product Page</a></li>
													<li ><a href="shop-product-2.html">Product Page 2 <span class="badge">NEW</span></a></li>
													<li ><a href="shop-cart.html">Shopping Cart</a></li>
													<li ><a href="shop-checkout.html">Checkout Page - Step 1</a></li>
													<li ><a href="shop-checkout-payment.html">Checkout Page - Step 2</a></li>
													<li ><a href="shop-checkout-review.html">Checkout Page - Step 3</a></li>
													<li ><a href="shop-invoice.html">Invoice</a></li>
												</ul>
											</li>
											<li class="dropdown ">
												<a href="blog-large-image-right-sidebar.html" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
												<ul class="dropdown-menu">
													<li ><a href="index-blog.html">Blog Home <span class="badge">v1.1</span></a></li>
													<li ><a href="index-blog-2.html">Blog Home 2 <span class="badge">NEW</span></a></li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Large Image</a>
														<ul class="dropdown-menu to-left">
															<li ><a href="blog-large-image-right-sidebar.html">Right Sidebar</a></li>
															<li ><a href="blog-large-image-left-sidebar.html">Left Sidebar</a></li>
															<li ><a href="blog-large-image-no-sidebar.html">Without Sidebar</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Medium Image</a>
														<ul class="dropdown-menu to-left">
															<li ><a href="blog-medium-image-right-sidebar.html">Right Sidebar</a></li>
															<li ><a href="blog-medium-image-left-sidebar.html">Left Sidebar</a></li>
															<li ><a href="blog-medium-image-no-sidebar.html">Without Sidebar</a></li>
														</ul>
													</li>
													<li class="dropdown ">
														<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Masonry</a>
														<ul class="dropdown-menu to-left">
															<li ><a href="blog-masonry-right-sidebar.html">Right Sidebar</a></li>
															<li ><a href="blog-masonry-left-sidebar.html">Left Sidebar</a></li>
															<li ><a href="blog-masonry-no-sidebar.html">Without Sidebar</a></li>
														</ul>
													</li>
													<li ><a href="blog-timeline.html">Timeline</a></li>
													<li ><a href="blog-post.html">Blog Post</a></li>
												</ul>
											</li>
										</ul>
										<!-- main-menu end -->
										
										<!-- header dropdown buttons -->
										<div class="header-dropdown-buttons hidden-xs ">
											<div class="btn-group dropdown">
												<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></button>
												<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
													<li>
														<form role="search" class="search-box margin-clear">
															<div class="form-group has-feedback">
																<input type="text" class="form-control" placeholder="Search">
																<i class="icon-search form-control-feedback"></i>
															</div>
														</form>
													</li>
												</ul>
											</div>
											<div class="btn-group dropdown">
												<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-basket-1"></i><span class="cart-count default-bg">8</span></button>
												<ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
													<li>
														<table class="table table-hover">
															<thead>
																<tr>
																	<th class="quantity">QTY</th>
																	<th class="product">Product</th>
																	<th class="amount">Subtotal</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="quantity">2 x</td>
																	<td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
																	<td class="amount">$199.00</td>
																</tr>
																<tr>
																	<td class="quantity">3 x</td>
																	<td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
																	<td class="amount">$299.00</td>
																</tr>
																<tr>
																	<td class="quantity">3 x</td>
																	<td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
																	<td class="amount">$1499.00</td>
																</tr>
																<tr>
																	<td class="total-quantity" colspan="2">Total 8 Items</td>
																	<td class="total-amount">$1997.00</td>
																</tr>
															</tbody>
														</table>
														<div class="panel-body text-right">
															<a href="shop-cart.html" class="btn btn-group btn-gray btn-sm">View Cart</a>
															<a href="shop-checkout.html" class="btn btn-group btn-gray btn-sm">Checkout</a>
														</div>
													</li>
												</ul>
											</div>
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
	</div>
	<!-- header-container end -->

	<!-- banner start -->
	<!-- ================ -->
	<div class="banner clearfix">

		<!-- slideshow start -->
		<!-- ================ -->
		<div class="slideshow">
			
			<!-- slider revolution start -->
			<!-- ================ -->
			<div class="slider-banner-container">
				<div class="slider-banner-fullscreen">
					<ul class="slides">
						<!-- slide 1 start -->
						<!-- ================ -->
						<li data-transition="random-static" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Powerful Bootstrap Template">
						
						<!-- main image -->
						<img src="{{asset('assets/images/slider-fullscreen-slide-1.jpg')}}" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">
						
						<!-- Transparent Background -->
						<div class="tp-caption dark-translucent-bg"
							data-x="center"
							data-y="bottom"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="0">
						</div>

						<!-- LAYER NR. 1 -->
						<div class="tp-caption sfr stl xlarge_white"
							data-x="center"
							data-y="70"
							data-speed="200"
							data-easing="easeOutQuad"
							data-start="1000"
							data-end="2500"
							data-splitin="chars"
							data-elementdelay="0.1"
							data-endelementdelay="0.1"
							data-splitout="chars">Inspiration
						</div>

						<!-- LAYER NR. 2 -->
						<div class="tp-caption sfl str xlarge_white"
							data-x="center"
							data-y="70"
							data-speed="200"
							data-easing="easeOutQuad"
							data-start="2500"
							data-end="4000"
							data-splitin="chars"
							data-elementdelay="0.1"
							data-endelementdelay="0.1"
							data-splitout="chars">Innovation
						</div>

						<!-- LAYER NR. 3 -->
						<div class="tp-caption sfr stt xlarge_white"
							data-x="center"
							data-y="70"
							data-speed="200"
							data-easing="easeOutQuad"
							data-start="4000"
							data-end="6000"
							data-splitin="chars"
							data-elementdelay="0.1"
							data-endelementdelay="0.1"
							data-splitout="chars"
							data-endspeed="400">Success
						</div>					

						<!-- LAYER NR. 4 -->
						<div class="tp-caption sft fadeout text-center large_white"
							data-x="center"
							data-y="70"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="6400"
							data-end="10000"><span class="logo-font">The <span class="text-default">Project</span></span> <br> Powerful Bootstrap Template
						</div>	

						<!-- LAYER NR. 5 -->
						<div class="tp-caption sfr fadeout"
							data-x="center"
							data-y="210"
							data-hoffset="-232"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="1000"
							data-end="5500"><span class="icon large circle"><i class="circle icon-lightbulb"></i></span>
						</div>

						<!-- LAYER NR. 6 -->
						<div class="tp-caption sfl fadeout"
							data-x="center"
							data-y="210"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="2500"
							data-end="5500"><span class="icon large circle"><i class="circle icon-arrows-ccw"></i></span>
						</div>

						<!-- LAYER NR. 7 -->
						<div class="tp-caption sfr fadeout"
							data-x="center"
							data-y="210"
							data-hoffset="232"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="4000"
							data-end="5500"><span class="icon large circle"><i class="circle icon-chart-line"></i></span>
						</div>

						<!-- LAYER NR. 8 -->
						<div class="tp-caption ZoomIn fadeout text-center tp-resizeme large_white"
							data-x="center"
							data-y="170"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="6400"
							data-end="10000"><div class="separator light"></div>
						</div>	

						<!-- LAYER NR. 9 -->
						<div class="tp-caption sft fadeout medium_white text-center"
							data-x="center"
							data-y="210"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="5800"
							data-end="10000"
							data-endspeed="600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Nesciunt, maiores, aliquid. Repellat eum numquam aliquid culpa offici, <br> tenetur fugiat dolorum sapiente eligendi...
						</div>

						<!-- LAYER NR. 10 -->
						<div class="tp-caption fade fadeout"
							data-x="center"
							data-y="bottom"
							data-voffset="100"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="2000"
							data-end="10000"
							data-endspeed="200">
							<a href="#page-start" class="btn btn-lg moving smooth-scroll"><i class="icon-down-open-big"></i><i class="icon-down-open-big"></i><i class="icon-down-open-big"></i></a>
						</div>
						</li>
						<!-- slide 1 end -->

						<!-- slide 2 start -->
						<!-- ================ -->
						<li data-transition="random-static" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Premium HTML5 Bootstrap Theme">
						
						<!-- main image -->
						<img src="{{asset('assets/images/slider-fullscreen-slide-2.jpg')}}" alt="slidebg2" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">

						<!-- Transparent Background -->
						<div class="tp-caption dark-translucent-bg"
							data-x="center"
							data-y="bottom"
							data-speed="500"
							data-easing="easeOutQuad"
							data-start="0">
						</div>

						<!-- LAYER NR. 1 -->
						<div class="tp-caption sfb fadeout large_white"
							data-x="left"
							data-y="70"
							data-speed="500"
							data-start="1000"
							data-easing="easeOutQuad"
							data-end="10000"><span class="logo-font">The Project</span> <br> Premium HTML5 Bootstrap Theme
						</div>	

						<!-- LAYER NR. 2 -->
						<div class="tp-caption sfb fadeout text-left medium_white"
							data-x="left"
							data-y="200" 
							data-speed="500"
							data-start="1300"
							data-easing="easeOutQuad"
							data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="fa fa-laptop"></i></span> 100% Responsive
						</div>

						<!-- LAYER NR. 3 -->
						<div class="tp-caption sfb fadeout text-left medium_white"
							data-x="left"
							data-y="260" 
							data-speed="500"
							data-start="1600"
							data-easing="easeOutQuad"
							data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-check"></i></span> Bootstrap Based
						</div>

						<!-- LAYER NR. 4 -->
						<div class="tp-caption sfb fadeout text-left medium_white"
							data-x="left"
							data-y="320" 
							data-speed="500"
							data-start="1900"
							data-easing="easeOutQuad"
							data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-gift"></i></span> Packed Full of Features
						</div>

						<!-- LAYER NR. 5 -->
						<div class="tp-caption sfb fadeout text-left medium_white"
							data-x="left"
							data-y="380" 
							data-speed="500"
							data-start="2200"
							data-easing="easeOutQuad"
							data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-hourglass"></i></span> Very Easy to Customize
						</div>

						<!-- LAYER NR. 6 -->
						<div class="tp-caption sfb fadeout small_white"
							data-x="left"
							data-y="450"
							data-speed="500"
							data-start="2500"
							data-easing="easeOutQuad"
							data-endspeed="600"><a href="#" class="btn btn-default btn-lg btn-animated">Purchase <i class="fa fa-cart-arrow-down"></i></a>
						</div>
						</li>
						<!-- slide 2 end -->
					</ul>
					<div class="tp-bannertimer"></div>
				</div>
			</div>
			<!-- slider revolution end -->

		</div>
		<!-- slideshow end -->

	</div>
	<!-- banner end -->
	
	<div id="page-start"></div>

	<!-- section start -->
	<!-- ================ -->
	<section class="light-gray-bg pv-30 clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center">Core <strong>Features</strong></h2>
					<div class="separator"></div>
					<p class="large text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam voluptas facere vero ex tempora saepe perspiciatis ducimus sequi animi.</p>
				</div>
				<div class="col-md-4 ">
					<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
						<span class="icon default-bg circle"><i class="fa fa-diamond"></i></span>
						<h3>Clean Code &amp; Design</h3>
						<div class="separator clearfix"></div>
						<p>Voluptatem ad provident non repudiandae beatae cupiditate amet reiciendis lorem ipsum dolor sit amet, consectetur.</p>
						<a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="150">
						<span class="icon default-bg circle"><i class="fa fa-connectdevelop"></i></span>
						<h3>Extremely Flexible</h3>
						<div class="separator clearfix"></div>
						<p>Iure sequi unde hic. Sapiente quaerat sequi inventore veritatis cumque lorem ipsum dolor sit amet, consectetur.</p>
						<a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
						<span class="icon default-bg circle"><i class="fa icon-snow"></i></span>
						<h3>Latest Technologies</h3>
						<div class="separator clearfix"></div>
						<p>Inventore dolores aut laboriosam cum consequuntur delectus sequi lorem ipsum dolor sit amet, consectetur.</p>
						<a href="page-services.html">Read More <i class="pl-5 fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<section class="section default-bg clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="call-to-action text-center">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="title">Don't Miss Out Our Offers</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quasi explicabo consequatur consectetur, a atque voluptate officiis eligendi nostrum.</p>
							</div>
							<div class="col-sm-4">
								<br>
								<p><a href="#" class="btn btn-lg btn-gray-transparent btn-animated">Learn More<i class="fa fa-arrow-right pl-20"></i></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	<!-- section -->
	<!-- ================ -->
	<section class="pv-30">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center">Why <strong>Choose</strong> Us</h2>
					<div class="separator"></div>
					<p class="large text-center">Atque ducimus velit, earum quidem, iusto dolorem. Ex ipsam totam quas blanditiis, pariatur maxime ipsa iste, doloremque neque doloribus, error. Corrupti, tenetur.</p>
					<br>
				</div>
			</div>
		</div>
		<div class="owl-carousel content-slider-with-large-controls">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="{{asset('assets/images/section-image-1.png')}}" alt="">
					</div>
					<div class="col-md-6">
						<p class="space-top">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At provident modi nobis dolores ratione, maiores beatae vel iste illo incidunt officia sed id cupiditate quasi excepturi</p>
						<div class="media">
							<div class="media-left pr-20">
								<a href="#">
									<span class="icon circle small default-bg"><i class="icon-eye"></i> </span>
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Extremely Flexible</h4>
								Cras sit amet nibh libero, in gravida nulla. Sollicitudin.
							</div>
						</div>
						<div class="media">
							<div class="media-left pr-20">
								<a href="#">
									<span class="icon circle small default-bg"><i class="icon-trophy"></i> </span>
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Packed Full Of Features</h4>
								Cras sit amet nibh libero. Nulla vel metus scelerisque.
							</div>
						</div>
						<div class="media">
							<div class="media-left pr-20">
								<a href="#">
									<span class="icon circle small default-bg"><i class="icon-lifebuoy"></i> </span>
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">24/7 Support</h4>
								Cras sit amet nibh libero. Nulla vel metus scelerisque.
							</div>
						</div>
						<p><a href="page-services.html" class="btn btn-default-transparent btn-animated">Learn More <i class="fa fa-arrow-right pl-10"></i></a></p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 text-right">
						<p class="space-top">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At provident modi nobis dolores ratione, maiores beatae vel iste illo incidunt officia sed id cupiditate quasi excepturi</p>
						<div class="media">
							<div class="media-body">
								<h4 class="media-heading">Extremely Flexible</h4>
								Cras sit amet nibh libero, in gravida nulla. Sollicitudin.
							</div>
							<div class="media-right pl-20">
								<a href="#">
									<span class="icon circle small default-bg"><i class="icon-eye"></i> </span>
								</a>
							</div>
						</div>
						<div class="media">
							<div class="media-body">
								<h4 class="media-heading">Packed Full Of Features</h4>
								Cras sit amet nibh libero. Nulla vel metus scelerisque.
							</div>
							<div class="media-right pl-20">
								<a href="#">
									<span class="icon circle small default-bg"><i class="icon-trophy"></i> </span>
								</a>
							</div>
						</div>
						<div class="media">
							<div class="media-body">
								<h4 class="media-heading">24/7 Support</h4>
								Cras sit amet nibh libero. Nulla vel metus scelerisque.
							</div>
							<div class="media-right pl-20">
								<a href="#">
									<span class="icon circle small default-bg"><i class="icon-lifebuoy"></i> </span>
								</a>
							</div>
						</div>
						<p><a href="page-services.html" class="btn btn-default-transparent btn-animated">Learn More <i class="fa fa-arrow-right pl-10"></i></a></p>
					</div>
					<div class="col-md-6">
						<img src="{{asset('assets/images/section-image-2.png')}}" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<section class="light-gray-bg pv-20">
	</section>
	<!-- section end -->

	<!-- section -->
	<!-- ================ -->
	<section class="pv-30">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>What We <strong>Offer</strong></h2>
					<div class="separator-2"></div>
					<p>Lorem ipsum dolor sit amet, lotrem <span class="text-default">some colored text</span>. Nulla explicabo <strong>attention to this</strong> blanditiis, ex cupiditate ipsam debitis rem.</p>
					<ul class="list-icons">
						<li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100"><i class="icon-check-1"></i> 27 Predifined Home Pages</li>
						<li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="150"><i class="icon-check-1"></i> 14 Header Options</li>
						<li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="200"><i class="icon-check-1"></i> 8 Footer Options</li>
						<li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="250"><i class="icon-check-1"></i> 200+ HTML files</li>
					</ul>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <strong>Some bold text</strong>, unde voluptatum quidem explicabo et eius aut nisi dolore ut.</p>
					<a href="page-about.html" class="btn btn-default btn-hvr hvr-shutter-out-horizontal btn-lg"><i class="icon-users-1 pr-10"></i>Learn More</a>
				</div>
				<div class="col-md-6">
					<br>
					<div role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs style-1" role="tablist">
							<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="icon-heart pr-10"></i>We Love</a></li>
							<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">What</a></li>
							<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">We Do</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home">
								<div class="overlay-container overlay-visible">
									<img src="{{asset('assets/images/section-image-3.jpg')}}" alt="">
									<a href="#" class="overlay-link"><i class="fa fa-link"></i></a>
									<div class="overlay-bottom hidden-xs">
										<div class="text">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt nobis sunt, quae alias impedit ea molestias recusandae.
										</div>
									</div>
								</div>										
							</div>
							<div role="tabpanel" class="tab-pane fade" id="profile">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="//player.vimeo.com/video/29198414?byline=0&amp;portrait=0"></iframe>
									<p><a href="http://vimeo.com/29198414">Introducing Vimeo Music Store</a> from <a href="http://vimeo.com/staff">Vimeo Staff</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="messages">
								<h3>Lorem ipsum dolor sit amet</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium voluptas excepturi hic eveniet deleniti, voluptate fugit quod sapiente ut nulla voluptates neque a rerum! Sed dolores enim veniam, dolor minus.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quos quidem amet sapiente praesentium unde, vel corrupti, vero dicta velit fuga ut at accusantium expedita inventore fugit perferendis non reprehenderit.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente tempore ipsam tenetur molestias eligendi provident! Itaque sapiente neque esse expedita voluptatibus qui officia, fuga a tempora! Alias voluptate pariatur quo.</p>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		<br>
	</section>
	<!-- section end -->

	<!-- section -->
	<!-- ================ -->
	<section class="pv-30 light-gray-bg padding-bottom-clear">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center">Our <strong>Portfolio</strong></h2>
					<div class="separator"></div>
					<p class="large text-center">Atque ducimus velit, earum quidem, iusto dolorem. Ex ipsam totam quas blanditiis, pariatur maxime ipsa iste, doloremque neque doloribus, error. Corrupti, tenetur.</p>
					<br>
				</div>
			</div>
		</div>
		<div class="space-bottom">
			<div class="owl-carousel carousel">
				<div class="image-box shadow text-center">
					<div class="overlay-container">
						<img src="{{asset('assets/images/portfolio-1.jpg')}}" alt="">
						<div class="overlay-top">
							<div class="text">
								<h3><a href="portfolio-item.html">Project Title</a></h3>
								<p class="small">Lorem ipsum dolor sit amet.</p>
							</div>
						</div>
						<div class="overlay-bottom">
							<div class="links">
								<a href="portfolio-item.html" class="btn btn-gray-transparent btn-animated">View Details <i class="pl-10 fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="image-box shadow text-center">
					<div class="overlay-container">
						<img src="{{asset('assets/images/portfolio-2.jpg')}}" alt="">
						<div class="overlay-top">
							<div class="text">
								<h3><a href="portfolio-item.html">Project Title</a></h3>
								<p class="small">Lorem ipsum dolor sit amet.</p>
							</div>
						</div>
						<div class="overlay-bottom">
							<div class="links">
								<a href="portfolio-item.html" class="btn btn-gray-transparent btn-animated">View Details <i class="pl-10 fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="image-box shadow text-center">
					<div class="overlay-container">
						<img src="{{asset('assets/images/portfolio-3.jpg')}}" alt="">
						<div class="overlay-top">
							<div class="text">
								<h3><a href="portfolio-item.html">Project Title</a></h3>
								<p class="small">Lorem ipsum dolor sit amet.</p>
							</div>
						</div>
						<div class="overlay-bottom">
							<div class="links">
								<a href="portfolio-item.html" class="btn btn-gray-transparent btn-animated">View Details <i class="pl-10 fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="image-box shadow text-center">
					<div class="overlay-container">
						<img src="{{asset('assets/images/portfolio-4.jpg')}}" alt="">
						<div class="overlay-top">
							<div class="text">
								<h3><a href="portfolio-item.html">Project Title</a></h3>
								<p class="small">Lorem ipsum dolor sit amet.</p>
							</div>
						</div>
						<div class="overlay-bottom">
							<div class="links">
								<a href="portfolio-item.html" class="btn btn-gray-transparent btn-animated">View Details <i class="pl-10 fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="image-box shadow text-center">
					<div class="overlay-container">
						<img src="{{asset('assets/images/portfolio-5.jpg')}}" alt="">
						<div class="overlay-top">
							<div class="text">
								<h3><a href="portfolio-item.html">Project Title</a></h3>
								<p class="small">Lorem ipsum dolor sit amet.</p>
							</div>
						</div>
						<div class="overlay-bottom">
							<div class="links">
								<a href="portfolio-item.html" class="btn btn-gray-transparent btn-animated">View Details <i class="pl-10 fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="image-box shadow text-center">
					<div class="overlay-container">
						<img src="{{asset('assets/images/portfolio-6.jpg')}}" alt="">
						<div class="overlay-top">
							<div class="text">
								<h3><a href="portfolio-item.html">Project Title</a></h3>
								<p class="small">Lorem ipsum dolor sit amet.</p>
							</div>
						</div>
						<div class="overlay-bottom">
							<div class="links">
								<a href="portfolio-item.html" class="btn btn-gray-transparent btn-animated">View Details <i class="pl-10 fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-carousel content-slider">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="testimonial text-center">
								<div class="testimonial-image">
									<img src="{{asset('assets/images/testimonial-1.jpg')}}" alt="Jane Doe" title="Jane Doe" class="img-circle">
								</div>
								<h3>Just Perfect!</h3>
								<div class="separator"></div>
								<div class="testimonial-body">
									<blockquote>
										<p>Sed ut perspiciatis unde omnis iste natu error sit voluptatem accusan tium dolore laud antium, totam rem dolor sit amet tristique pulvinar, turpis arcu rutrum nunc, ac laoreet turpis augue a justo.</p>
									</blockquote>
									<div class="testimonial-info-1">- Jane Doe</div>
									<div class="testimonial-info-2">By Company</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="testimonial text-center">
								<div class="testimonial-image">
									<img src="{{asset('assets/images/testimonial-2.jpg')}}" alt="Jane Doe" title="Jane Doe" class="img-circle">
								</div>
								<h3>Amazing!</h3>
								<div class="separator"></div>
								<div class="testimonial-body">
									<blockquote>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et cupiditate deleniti ratione in. Expedita nemo, quisquam, fuga adipisci omnis ad mollitia libero culpa nostrum est quia eos esse vel!</p>
									</blockquote>
									<div class="testimonial-info-1">- Jane Doe</div>
									<div class="testimonial-info-2">By Company</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="clients-container">
					<div class="clients">
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
							<a href="#"><img src="{{asset('assets/images/client-1.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="200">
							<a href="#"><img src="{{asset('assets/images/client-2.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
							<a href="#"><img src="{{asset('assets/images/client-3.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="400">
							<a href="#"><img src="{{asset('assets/images/client-4.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="500">
							<a href="#"><img src="{{asset('assets/images/client-5.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="600">
							<a href="#"><img src="{{asset('assets/images/client-6.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="700">
							<a href="#"><img src="{{asset('assets/images/client-7.png')}}" alt=""></a>
						</div>
						<div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="800">
							<a href="#"><img src="{{asset('assets/images/client-8.png')}}" alt=""></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<section class="pv-40 stats padding-bottom-clear dark-translucent-bg hovered background-img-7" style="background-position: 50% 50%;">
		<div class="clearfix">
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-diamond"></i></span>
					<h3><strong>Projects</strong></h3>
					<span class="counter" data-to="1525" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-users"></i></span>
					<h3><strong>Clients</strong></h3>
					<span class="counter" data-to="1225" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-cloud-download"></i></span>
					<h3><strong>Downloads</strong></h3>
					<span class="counter" data-to="12235" data-speed="5000">0</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-6 text-center">
				<div class="feature-box object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
					<span class="icon dark-bg large circle"><i class="fa fa-share"></i></span>
					<h3><strong>Shares</strong></h3>
					<span class="counter" data-to="15002" data-speed="5000">0</span>
				</div>
			</div>
		</div>
		<!-- footer top start -->
		<!-- ================ -->
		<div class="footer-top animated-text" style="background-color:rgba(0,0,0,0.3);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="call-to-action text-center">
							<div class="row">
								<div class="col-sm-8">
									<h2>Powerful Bootstrap Template</h2>
									<h2>Waste no more time</h2>
								</div>
								<div class="col-sm-4">
									<p class="mt-10"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent">Purchase<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer top end -->
	</section>
	<!-- section end -->
	<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
	<!-- ================ -->
	@include('partials/user/footer')
		
@endsection