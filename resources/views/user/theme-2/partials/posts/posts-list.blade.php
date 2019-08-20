	@foreach($posts as $post)
		@if($post->video)
			<!-- POST ITEM -->
			<div class="blog-post-item">

				<!-- VIDEO -->
				<div class="mb-20">
					<div class="embed-responsive embed-responsive-16by9">
						{!!$post->videoPreview!!}
					</div>
				</div>

				<h2><a href="{{$post->showRoute}}">{{$post->title}}</a></h2>

				<ul class="blog-post-info list-inline">
					<li>
						<a href="#">
							<i class="fa fa-clock-o"></i> 
							<span class="font-lato">{{$post->created_at->format('M d, Y')}}</span>
						</a>
					</li>
					@if($post->location)
						<li>
							<a href="#">
								<i class="fa fa-map-marker"></i> 
								<span class="font-lato">{{$post->location}}</span>
							</a>
						</li>
					@endif
					<li>
						<i class="fa fa-folder-open-o"></i> 
						<a class="category" href="{{route('categories.pages.show', $post->category->slug)}}">
							<span class="font-lato">{{$post->category->name}}</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-user"></i> 
							<span class="font-lato">{{$post->author->name}}</span>
						</a>
					</li>
				</ul>

				<p>{{$post->subtitle}}</p>

				<a href="{{$post->showRoute}}" class="btn btn-reveal btn-default">
					<i class="fa fa-plus"></i>
					<span>Read More</span>
				</a>

			</div>
			<!-- /POST ITEM -->
		@elseif($post->image)
			<!-- POST ITEM -->
			<div class="blog-post-item">

				<!-- IMAGE -->
				<figure class="mb-20">
					<img class="img-fluid post-with-image" src="{{$post->mediumPath}}" alt="">
				</figure>

				<h2><a href="{{$post->showRoute}}">{{$post->title}}</a></h2>

				<ul class="blog-post-info list-inline">
					<li>
						<a href="#">
							<i class="fa fa-clock-o"></i> 
							<span class="font-lato">{{$post->created_at->format('M d, Y')}}</span>
						</a>
					</li>
					@if($post->location)
						<li>
							<a href="#">
								<i class="fa fa-map-marker"></i> 
								<span class="font-lato">{{$post->location}}</span>
							</a>
						</li>
					@endif
					<li>
						<i class="fa fa-folder-open-o"></i> 

						<a class="category" href="{{route('categories.pages.show', $post->category->slug)}}">
							<span class="font-lato">{{$post->category->name}}</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-user"></i> 
							<span class="font-lato">{{$post->author->name}}</span>
						</a>
					</li>
				</ul>

				<p>{{$post->subtitle}}</p>

				<a href="{{$post->showRoute}}" class="btn btn-reveal btn-default">
					<i class="fa fa-plus"></i>
					<span>Read More</span>
				</a>

			</div>
			<!-- /POST ITEM -->
		@else
			<!-- POST ITEM -->
			<div class="blog-post-item">

				<h2><a href="{{$post->showRoute}}">{{$post->title}}</a></h2>

				<ul class="blog-post-info list-inline">
					<li>
						<a href="#">
							<i class="fa fa-clock-o"></i> 
							<span class="font-lato">{{$post->created_at->format('M d, Y')}}</span>
						</a>
					</li>
					@if($post->location)
						<li>
							<a href="#">
								<i class="fa fa-map-marker"></i> 
								<span class="font-lato">{{$post->location}}</span>
							</a>
						</li>
					@endif
					<li>
						<i class="fa fa-folder-open-o"></i> 

						<a class="category" href="{{route('categories.pages.show', $post->category->slug)}}">
							<span class="font-lato">{{$post->category->name}}</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-user"></i> 
							<span class="font-lato">{{$post->author->name}}</span>
						</a>
					</li>
				</ul>

				<p>{{$post->subtitle}}</p>

				<a href="{{$post->showRoute}}" class="btn btn-reveal btn-default">
					<i class="fa fa-plus"></i>
					<span>Read More</span>
				</a>

			</div>
			<!-- /POST ITEM -->
		@endif
	@endforeach
</div>
