<!DOCTYPE html>

<html lang="en">
	
	<head>
		@include($path . 'partials/head')
		<style>
			.social-icon .fa{
				font-size: 24px
			}
			.social-icon .fa-instagram{
				margin-right: 2px !important
			}
			.uppercase{
				text-transform: uppercase;
			}

			.language-switcher form, .language-switcher li, .language-switcher ul .language-switcher input{
				margin: 0 !important;
				padding: 0 !important;
			}
			.language-switcher .btn{
				border-radius: 0;
			}
			.dropdown-toggle::after{
				display:none;
			}
			.language-switcher ul.dropdown-menu{
				border: 0px !important;
			}
			#searchResponse{
				width: 100%;
			}

			#searchResponse .searchResultsTitle{
				background-color: #8AB933;
				color: white;
			}

			#sidebarSearchResults{
				width: 90%;
				position: absolute;
				background: white;
				z-index: 100;
				margin-top: -30px;
			}
			.homepageCategories img{
				margin-right: 20px;
				width: 100%;
				object-fit: cover
			}
		</style>
		@yield('optionalHead')
	</head>
	<!--
		AVAILABLE BODY CLASSES:
		
		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background
		
		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click
		
		BACKGROUND IMAGE [together with .boxed class]
		data-background="assets/images/_smarty/boxed_background/1.jpg"
	-->
	<body class="smoothscroll enable-animation grain-grey">
		
		@include($path . 'partials/header')

		<!-- wrapper -->
		<div id="wrapper">
			@include($path . 'partials/nav')

			@yield('content')
			
			@include($path . 'partials/footer')
		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->
		
		{{-- @include($path . 'partials/nav') --}}
			

		
		
		@include($path . 'partials/scripts')
		@foreach($scripts as $script)
			{!!$script ->code!!}
		@endforeach
		@yield('optionalScripts')

		<script>
			//nav bar live search functionality
			$('#search_box').keyup($.debounce(700, function (e) {
				var responseDiv = $('#searchResponse');;
				var search = $('#search_box').val();
		        if(search.length > 2){
			        searchInDatabase(search, responseDiv);
		        }else{
		            responseDiv.html('');
		        }
		    }));

		    //large page search
		    $('#main_search_box').keyup($.debounce(700, function (e) {
				var responseDiv = $('#mainSearchResponse');;
				var search = $('#main_search_box').val();
		        if(search.length > 2){
			        searchInDatabase(search, responseDiv);
		        }else{
		            responseDiv.html('');
		        }
		    }));

	        //footer search
	        $('#sidebar_search').keyup($.debounce(700, function (e) {
	    		var responseDiv = $('#sidebarSearchResults');;
	    		var search = $('#sidebar_search').val();
	            if(search.length > 2){
	    	        searchInDatabase(search, responseDiv);
	            }else{
	                responseDiv.html('');
	            }
	        }));
		    
		    function searchInDatabase(search, responseDiv){
		    	responseDiv.html('')
		        $.ajax({
		            type: 'GET',
		            url: '/search-ajax',
		            data: {
		                search: search
		                },
		            success: function(response){
		            	responseDiv.html('');
						if(!response.posts.length && !response.pages.length && !response.faqs.length){
							var htmlResponse = 
								`
								<h4 class="list-group-item searchResultsTitle">
									<i class="et-sad"></i> 
									We couldn't find any results
								</h4>`;
			                responseDiv.append(htmlResponse);
						}else{
							var resultsList = prepareList(response);
			                responseDiv.append(resultsList);
						}
		            },
		            error: function(response){
		                console.log('Something went wrong.');
		            }
		       });
		    }

		    function prepareList(response){
		    	var results = '';
		    	var posts = response.posts;
		    	var pages = response.pages;
		    	var faqs = response.faqs;

		     	posts.length ? results += appendResults(posts, 'Posts') : null; 
		     	pages.length ? results += appendResults(pages, 'Pages') : null; 
		     	faqs.length ? results += appendResults(faqs, 'FAQs') : null;

		     	var total = posts.length + pages.length + faqs.length;
		     	results += `
					<small class="m-0 text-muted fs-11"> 
						about<span class="text-success"> ${total} results </span>total
					</small>
		     	`;
		    	return results;
		    }

		    function appendResults(items, title){
		    	results = `<h4 class="list-group-item searchResultsTitle">${title}</h4>`;
		    	for(var i = 0; i<items.length; i++){
		    		results += 
		    			`<a class="list-group-item list-group-item-action href="${items[i].route}">
		    				${items[i].title}
		    			</a>`;
		    	}

		    	return results;
		    }
		</script>



	</body>
</html>