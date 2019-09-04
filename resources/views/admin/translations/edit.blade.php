@extends('admin/master')

@section('head')
	<style>
		.mb-40{
			margin-bottom: 40px;
		}
		.child .col-sm-10{
			padding-right: 0;
		}
	</style>
@endsection

@section('content')
    <div class="widget">

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
  			<h2 class="mb-40">{{$language}} 
  				<i class="glyphicon glyphicon-arrow-right"></i> 
  				{{$file}}
  			</h2>
  	       <div class="container-fluid">
  	       		<input type="hidden" id="arrayDepth" value="{{$arrayDepth}}">
  				@include('admin/partials/translations/items', ['parent'=>null])
  	       </div>
			
			{!! Form::button('<i class="fa fa-save"></i> '.trans('translations.update'), array('id'=>'updateTranslation', 'class' => 'btn btn-success margin-bottom-1 mb-1','style'=>'margin-top: 8px;','type' => 'submit' )) !!}
  	    </div>
    </div>

@endsection

@section('footer_scripts')
	<script>
		$(document).ready(function(){
			$('#updateTranslation').on('click', function(){

				var levels = $('#arrayDepth').val();
				var data = makeArray(levels)
				$.ajaxSetup({
				    headers:
				    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
				});
				$.ajax({
				    type: 'POST',
				    url: "{{route('admin.translations.update', compact('language', 'file'))}}",
				    data: {
				        data: JSON.stringify(data)
				    },
				    success: function(response){
				    	if(response.status === 200){
				       		window.location.replace("{{route('admin.translations.index')}}");

				    	}
				    },
				    error: function(response){
				       console.log('Error.')
				    }
				});
			});

			function makeArray(levels){
				let depth = $('#arrayDepth').val();
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