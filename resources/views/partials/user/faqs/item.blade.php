<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion-faq" href="#{{$faq->id}}" class="collapsed">
				<i class="fa fa-question-circle pr-10"></i> 
				{{$faq->question}}
			</a>
		</h4>
	</div>
	<div id="{{$faq->id}}" class="panel-collapse collapse">
		<div class="panel-body">
			{{$faq->answer}}
		</div>
	</div>
</div>