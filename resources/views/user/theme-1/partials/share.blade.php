<ul class="social-links social-share circle small colored clearfix margin-clear text-right animated-effect-1">
	<li class="twitter">
		{!!Share::page(url()->current(), null, [], '', '')->twitter()!!}
	</li>
	<li class="linkedin">
		{!!Share::page(url()->current(), null, [], '', '')->linkedin()!!}
	</li>
	<li class="facebook">
		{!!Share::page(url()->current(), null, [], '', '')->facebook()!!}
	</li>
	<li class="email-share">
		<a class="" title="Email" href="mailto:?subject=@if(isset($title)){{$title}}@endif&body={{url()->current()}}" title="Email">
			<i class="fa fa-envelope-o"></i>
		</a> 
	</li>
</ul>