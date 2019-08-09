<section class="pv-30">
	<div class="container" id="homepage-about-tabs">
		<div class="row">
			<div class="col-md-6">
				<h2>What We <strong>Offer</strong></h2>
				<div class="separator-2"></div>
				<div id="offer">
					{!!$about->offer!!}
					<a href="{{route('about')}}" class="btn btn-default btn-hvr hvr-shutter-out-horizontal btn-lg"><i class="fa fa-id-card-o pr-10"></i>Learn More</a>
				</div>
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
								<img src="{{asset('images/about/medium/'.$about->image)}}" alt="">
								<a href="#" class="overlay-link"><i class="fa fa-link"></i></a>
								<div class="overlay-bottom hidden-xs">
									<div class="text">{{$settings->slogan}}
									</div>
								</div>
							</div>										
						</div>
						<div role="tabpanel" class="tab-pane fade" id="profile">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/fm1gh5GAmWc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="messages">
							{!!$about->why_us!!}
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>
	<br>
</section>