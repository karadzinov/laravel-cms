@extends('admin/master')
@section('head')
	<style>
		.tab-content{
			min-height: 100vh;
		}
		.col-md-2{
			padding-right: 0;
		}
		.nav-pills>li>a{
			border-radius: 0;
		}
		.widget-body{
			padding-top: 0;
		}
		.mb-40{
			margin-bottom: 40px;
		}
		.child .col-sm-10{
			padding-right: 0;
		}
		.translations-explication{
			font-size: 18px;
		}
		.translations-explication li{
			margin-top: 20px;
		}
		#loader {
		  position: absolute;
		  left: 50%;
		  top: 10%;
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
		@media only screen and (max-width: 600px) {
			.translations-explication{
				font-size: inherit;
			}
			.translations-explication li{
				margin-top: 10px;
			}
		}
	</style>
@endsection
@section('content')
<div class="widget">
	<input type="hidden" value="{{$language}}" id="active-language">
    <div class="widget-header bordered-bottom bordered-blue">
        <span class="widget-caption">
            <i class="fa fa-book"></i> 
            {{trans('translations.translations')}}
        </span>
        <a href="{{route('admin.translations.index')}}" class="btn btn-deafult pull-right">
            <i class="fa fa-fw fa-reply-all"></i> 
            {{trans('translations.back-to')}}
        </a>
    </div>
    <div class="widget-body">
		<div class="row">
			<div class="tab-content col-md-10">
				<div class="tab-pane active" id="how-to-translate">
					{!!trans('translations.explication')!!}
				</div>
				<div id="loader" style="display:none;"></div>
				@foreach($files as $file)
					<div class="tab-pane content" id="{{$file->name}}">
					     
					</div>
				@endforeach
			</div>
			<ul class="nav nav-pills nav-stacked col-md-2">
				<li class="side-navigation-link active">
					<a data-toggle="tab" href="#how-to-translate">
						{{trans('translations.how-to')}}
					</a>
				</li>
				  @foreach($files as $file)
					<li class="side-navigation-link right-sidebar-navigation" data-file="{{$file->name}}">
						<a data-toggle="tab" href="#{{$file->name}}">
							{{$file->name}}
						</a>
					</li>
				  @endforeach
			</ul>
		</div>

    </div>
</div>
@endsection

@section('footer_scripts')
	<script>
		$(document).ready(function(){
			var file;
			var language = $('#active-language').val();
			var activeClass; 
			$('.right-sidebar-navigation').on('click', function(){
				
				file = $(this).data('file');
				activeClass = '#'+file;
				$('#loader').show();
				
				$('.content').html('');
				$.ajax({
					type: "GET",
					url: "/admin/translations/edit/" + language + '/' + file,
					data:{
						file: file,
						language: language,
					},
					success: function(response){
				$('#loader').hide();

						$('#'+file).html(response);
						
						let button = '<button id="updateTranslation" class="btn btn-success margin-bottom-1 mb-1" style="margin-top: 8px;" type="button">{{trans('translations.update')}}</button>';
						$('#'+file).append(button)
					},
					error: function(response){
						console.log(response);
					}
				});
			});

			$('.content').on('click', '#updateTranslation', function(){

				var data = makeArray()
				console.log(data);
				$.ajaxSetup({
				    headers:
				    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
				});
				$.ajax({
				    type: 'POST',
				    url: "/admin/translations/update/" + language + "/" + file,
				    data: {
				        data: JSON.stringify(data)
				    },
				    success: function(response){
				    	if(response.status === 200){
				       		bootbox.alert("{{trans('translations.success.updated')}}");

				    	}
				    },
				    error: function(response){
				       console.log('Error.')
				    }
				});
			});

			function makeArray(){
				var elements = $('.translation-value');
				
				var array = makeItems(elements);

				return array;
			}

			function makeItems(elements, check = false){
				var array={};
				for(let j=0; j<elements.length; j++){
					
					let key = $(elements[j]).data('name');	
					if(!check && !$(elements[j]).hasClass('depth-1')){
						var parent = $(elements[j]).data('parent');
						if(!(parent in array)){
							array[parent] = {};
							let items = $('.parent-'+parent + ' .translation-value');
							if(items.length){
								array[parent] = makeItems(items, true)
							}
							continue;
						}
							continue;
					}
					
					array[key] = $(elements[j]).val();
				}

				return array;
			}
		});
	</script>
@endsection