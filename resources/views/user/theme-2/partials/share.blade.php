<div class="clearfix mt-30">

	<span class="float-left mt-6 bold hidden-xs-down">
		{{trans('general.share')}}
	</span>
	<a href="mailto:?subject=@if(isset($title)){{$title}}@endif&body={{url()->current()}}" class="social-icon social-icon-sm social-icon-transparent social-call float-right" data-toggle="tooltip" data-placement="top" title="Email">
		<i class="icon-email3"></i>
		<i class="icon-email3"></i>
	</a> 
	{!!Share::page(url()->current(), null, ['class'=>'social-icon social-icon-sm social-icon-transparent float-right'], '<div>', '</div>')
		->linkedin()
		->twitter()
		->facebook()!!}
</div>