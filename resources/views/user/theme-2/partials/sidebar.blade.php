<div class="row">
	<div class="col-md-12">
		<!-- INLINE SEARCH -->
		<div class="inline-search clearfix mb-30">
			<form action="{{route('search')}}" method="get" class="widget_search">
				<input type="search" placeholder="{{trans('general.search')}}..." id="sidebar_search" name="search" class="serch-input">
				<button type="submit">
					<i class="fa fa-search"></i>
				</button>
			</form>
		</div>
	</div>
	<div class="col-md-12">
		<div id="sidebarSearchResults"></div>
	</div>
</div>
<!-- /INLINE SEARCH -->

<hr />

<!-- side navigation -->
<div class="side-nav mb-60 mt-30">
	<div class="side-nav-head">
		<button class="fa fa-bars"></button>
		<h4 class="uppercase">{{trans('general.categories')}}</h4>
	</div>
	<ul class="list-group list-group-bordered list-group-noicon uppercase">
		@foreach($categories as $category)
			<li class="list-group-item"><a href="{{$category->showRoute}}"><span class="fs-11 text-muted float-right">({{$category->posts->count()}})</span> {{$category->name}}</a></li>
		@endforeach

	</ul>
	<!-- /side navigation -->
</div>

<!-- JUSTIFIED TAB -->
<div class="tabs mt-0 hidden-xs-down mb-60">

	<!-- tabs -->
	<ul class="nav nav-tabs nav-bottom-border nav-justified">
		<li class="nav-item">
			<a class="nav-item active" href="#tab_1" data-toggle="tab">
				{{trans('general.popular')}}
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-item" href="#tab_2" data-toggle="tab">
				{{trans('general.recent')}}
			</a>
		</li>
	</ul>

	<!-- tabs content -->
	<div class="tab-content mb-60 mt-30">

		<!-- POPULAR -->
		<div id="tab_1" class="tab-pane active">

			@foreach($popular as $popularPost)
				<div class="row tab-post"><!-- post -->
					<div class="col-md-3 col-sm-3 col-3">
						<a href="blog-sidebar-left.html">
							<img src="{{$popularPost->thumbnailPath}}" width="50" alt="" />
						</a>
					</div>
					<div class="col-md-9 col-sm-9 col-9">
						<a href="blog-sidebar-left.html" class="tab-post-link">{{$popularPost->title}}</a>
						<small>{{$popularPost->created_at->format('M d, Y')}}</small>
					</div>
				</div><!-- /post -->
			@endforeach

		</div>
		<!-- /POPULAR -->


		<!-- RECENT -->
		<div id="tab_2" class="tab-pane">

			@foreach($recent as $recentPost)
				<div class="row tab-post"><!-- post -->
					<div class="col-md-3 col-sm-3 col-3">
						<a href="blog-sidebar-left.html">
							<img src="{{$recentPost->thumbnailPath}}" width="50" alt="" />
						</a>
					</div>
					<div class="col-md-9 col-sm-9 col-9">
						<a href="blog-sidebar-left.html" class="tab-post-link">{{$recentPost->title}}</a>
						<small>{{$recentPost->created_at->format('M d, Y')}}</small>
					</div>
				</div><!-- /post -->
			@endforeach
		</div>
		<!-- /RECENT -->

	</div>

</div>
<!-- JUSTIFIED TAB -->
@if(isset($post))
	@if($post->tags->isNotEmpty())
	<h3 class="hidden-xs-down fs-16 mb-20 uppercase">{{trans('general.tags')}}</h3>
		<!-- TAGS -->
		<div class="hidden-xs-down mb-60">
			@foreach($post->tags as $tag)

				<a class="tag" href="{{$tag->showRoute}}">
					<span class="txt">{{$tag->name}}</span>
					<span class="num">{{$tag->posts->count()}}</span>
				</a>
			@endforeach
		</div>
	@endif
@endif
@if($facebook)
<!-- FACEBOOK -->
	<iframe class="hidden-xs-down" src="//www.facebook.com/plugins/likebox.php?href={{$facebook}}&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>
@endif