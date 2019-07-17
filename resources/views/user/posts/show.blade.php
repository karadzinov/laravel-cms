@extends('layouts/master')
@section('optionalHead')
	<style>
		#mainImage{
			width: 100%;
			max-height: auto;
		}
	</style>
@endsection
@section('content')
	<!-- breadcrumb start -->
	<!-- ================ -->
	<div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-home pr-10"></i>
					<a href="/">
						Home
					</a>
				</li>
				<li class="active">
					Blog Post
				</li>
			</ol>
		</div>
	</div>
	<!-- breadcrumb end -->

	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">

					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">{!!$post->title!!}</h1>
					<!-- page-title end -->

					<!-- blogpost start -->
					<!-- ================ -->
					<article class="blogpost full">
						<header>
							<div class="post-info">
								<span class="post-date">
									<i class="icon-calendar"></i>
									<span class="day">{{$post->created_at->format('d')}}</span>
									<span class="month">{{$post->created_at->format('M Y')}}</span>
								</span>
								<span class="submitted">
									<i class="icon-user-1"></i> by 
									<a href="#">
										{{$post->author->name}}
									</a>
								</span>
								@if($post->location)
									<span class="submitted">
										<i class="fa fa-globe"></i> 
										<a href="#">
											{{$post->location}}
										</a>
									</span>
								@endif
							</div>
						</header>
						<div class="blogpost-content">
							<img id="mainImage" src="{{$post->originalPath}}" alt="">
							<br>
							<p>
								{!!$post->main_text!!}
							</p>
							@if($post->video)
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="{{$post->videoSrc}}"></iframe>
								</div>
							@endif
						</div>
						<footer class="clearfix">
							<div class="tags pull-left">
								@if($post->tags->isNotEmpty())
									@foreach($post->tags as $tag)
										<i class="icon-tags"></i> 
										<a href="{{route('tagPosts', $tag->name)}}">
											{{$tag->name}}
										</a>
									@endforeach
								@endif
							</div>
							<div class="link pull-right">
								<ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
									<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
									<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
									<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								</ul>
							</div>
						</footer>
					</article>
					<!-- blogpost end -->
				</div>
				<!-- main end -->
			</div>
		</div>
	</section>
	<!-- main-container end -->
@endsection