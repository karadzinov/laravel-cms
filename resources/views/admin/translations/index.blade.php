@extends('admin/master')
@section('head')
	<style>
		.widget-body{
			min-height: 100vh
		}
		#loader {
		  position: absolute;
		  left: 50%;
		  top: 50%;
		  z-index: 1;
		  width: 150px;
		  height: 150px;
		  margin: -75px 0 0 -75px;
		  border: 16px solid #f3f3f3;
		  border-radius: 50%;
		  border-top: 16px solid #3498db;
		  width: 120px;
		  height: 120px;
		  margin-top:30px;
		  -webkit-animation: spin 2s linear infinite;
		  animation: spin 2s linear infinite;
		}

		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}

		/* Add animation to "page content" */
		.animate-bottom {
		  position: relative;
		  -webkit-animation-name: animatebottom;
		  -webkit-animation-duration: 1s;
		  animation-name: animatebottom;
		  animation-duration: 1s
		}

		@-webkit-keyframes animatebottom {
		  from { bottom:-100px; opacity:0 } 
		  to { bottom:0px; opacity:1 }
		}

		@keyframes animatebottom { 
		  from{ bottom:-100px; opacity:0 } 
		  to{ bottom:0; opacity:1 }
		}

		#folders-container {
		  display: none;
		}
		.tree, .tree ul {
		    margin:0;
		    padding:0;
		    list-style:none
		}
		.tree ul {
		    margin-left:1em;
		    position:relative
		}
		.tree ul ul {
		    margin-left:.5em
		}
		.tree ul:before {
		    content:"";
		    display:block;
		    width:0;
		    position:absolute;
		    top:0;
		    bottom:0;
		    left:0;
		    border-left:1px solid
		}
		.tree li {
		    margin:0;
		    padding:0 1em;
		    line-height:2em;
		    color:#369;
		    font-weight:700;
		    position:relative
		}
		.tree ul li:before {
		    content:"";
		    display:block;
		    width:10px;
		    height:0;
		    border-top:1px solid;
		    /*margin-top:-1px;*/
		    position:absolute;
		    top:1em;
		    left:0
		}
		.tree ul li:last-child:before {
		    background:#fff;
		    height:auto;
		    top:1em;
		    bottom:0
		}
		.indicator {
		    margin-right:5px;
		}
		.tree li a {
		    text-decoration: none;
		    color:#369;
		}
		.tree li button, .tree li button:active, .tree li button:focus {
		    text-decoration: none;
		    color:#369;
		    border:none;
		    background:transparent;
		    margin:0px 0px 0px 0px;
		    padding:0px 0px 0px 0px;
		    outline: 0;
		}
		.tree li .btn{
			color: white;
		}
	</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
            	<div class="widget-header bordered-bottom bordered-blue">
            	    <span class="widget-caption">
            	        <i class="fa fa-book"></i> 
            	        {{trans('translations.translations')}}
            	    </span>
            	</div>
                <div class="widget-body">
                	<a id="addTranslation" href="javascript:void(0)" class="btn btn-success btn-lg">
	        		<i class="fa fa-edit"></i> 
	        	    {{trans('translations.create-new')}}
	        	</a>
                    <div class="container-fluid" style="margin-top:30px;">
                        <div class="row">
                            <div class="col-md-12">
                        		<div id="loader"></div>
                                <ul id="folders-container" class="animate-bottom">

	                               	@foreach($translations as $translation)
										<li>
											<a href="javascript:void(0)">
												{{$translation->name}}
											</a>
										    @if(count($translation->files))
												<ul>
													<li><a class="btn btn-sm btn-warning" href="{{route('admin.translations.show', ['language'=>$translation->folder])}}">Edit all files</a></li>
													@foreach($translation->files as $file)
														    <li>
														    	<a href="{{$file->route}}">
														    		{{$file->name}}
														    	</a>
														    </li>
													@endforeach
												</ul>
										    @endif
										</li>
	                               	@endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	  
@endsection


@section('footer_scripts')
	<script>
		myFunction()
		var myVar;

		function myFunction() {
		  myVar = setTimeout(showPage, 1200);
		}

		function showPage() {
		  document.getElementById("loader").style.display = "none";
		  document.getElementById("folders-container").style.display = "block";
		}
		$(document).ready(function(){
			$.fn.extend({
			    treed: function (o) {
			      
			      var openedClass = 'glyphicon-minus-sign';
			      var closedClass = 'glyphicon-plus-sign';
			      
			      if (typeof o != 'undefined'){
			        if (typeof o.openedClass != 'undefined'){
			        openedClass = o.openedClass;
			        }
			        if (typeof o.closedClass != 'undefined'){
			        closedClass = o.closedClass;
			        }
			      };
			      
			        //initialize each of the top levels
			        var tree = $(this);
			        tree.addClass("tree");
			        tree.find('li').has("ul").each(function () {
			            var branch = $(this); //li with children ul
			            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
			            branch.addClass('branch');
			            branch.on('click', function (e) {
			                if (this == e.target) {
			                    var icon = $(this).children('i:first');
			                    icon.toggleClass(openedClass + " " + closedClass);
			                    $(this).children().children().toggle();
			                }
			            })
			            branch.children().children().toggle();
			        });
			        //fire event from the dynamically added icon
			      tree.find('.branch .indicator').each(function(){
			        $(this).on('click', function () {
			            $(this).closest('li').click();
			        });
			      });
			        //fire event to open branch if the li contains an anchor instead of text
			        tree.find('.branch>a').each(function () {
			            $(this).on('click', function (e) {
			                $(this).closest('li').click();
			                e.preventDefault();
			            });
			        });
			        //fire event to open branch if the li contains a button instead of text
			        tree.find('.branch>button').each(function () {
			            $(this).on('click', function (e) {
			                $(this).closest('li').click();
			                e.preventDefault();
			            });
			        });
			    }
			});

			$('#folders-container').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});


			//create folder for new language
			$('#addTranslation').on('click', function(){
				$.ajaxSetup({
				    headers:
				    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
				});
				$.ajax({
				    type: 'GET',
				    url: "{{route('admin.translations.create')}}",
				    success: function(response){
				    	if(response.status === 200){
				    		callAddLanguageModal(response.view);
				    	}
				    },
				    error: function(response){
				       console.log('Error.')
				    }
				});
			});
			
			function callAddLanguageModal(body){
				bootbox.dialog({
			        message: body,
			        title: "Add New Translation",
			        className: "modal-darkorange",
			        buttons: {
			            success: {
			                label: "<i class='fa fa-save'></i> Create",
			                className: "btn-success",
			                callback: function () {
			                	var pp = $('#languageSelector').val();
			                	if(pp){
			                		storeTranslation(pp);
			                	}
			                }
			            },
			            "Cancel": {
			            	label: "<i class='fa fa-remove'></i> Cancel",
			                className: "btn-danger",
			                callback: function () { }
			            }
			        }
			    });
			}

			function storeTranslation(id){
				$.ajaxSetup({
				    headers:
				    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
				});
				$.ajax({
					type: 'POST',
					url: "{{route('admin.translations.store')}}",
					data:{
						id: id,
					},
					success: function(response){
						if(response.status === 200){
							let message = "{{trans('translations.created-message')}}";
							bootbox.alert({
							    message: message,
							    size: 'large',
							    callback: function () {
							        window.location.href = response.redirectRoute;
							    }
							})
						}
					},
					error: function(response){
						bootbox.alert("Error.");
					},
				})
			}
		});
	</script>
@endsection