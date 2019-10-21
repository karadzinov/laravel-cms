<ul id="sortable">
  @foreach($slides as $slide)
	<li class="draggable" heihth='30px' width='40px' class="ui-state-default"data-id='{{$slide->id}}'>
		<div class="row">
			<div class="col-md-2">
				<img class="choice-image" src="{{$slide->thumbnailPath}}" alt="">
			</div>
			<div class="col-md-10">
				<span>{{$loop->iteration . ' ' . $slide->title}}</span>
			</div>
		</div>
	</li>
  @endforeach
</ul>

<script>
	$( function() {
	  $( "#sortable" ).sortable({
	    placeholder: "ui-state-highlight"
	  });
	  $( "#sortable" ).disableSelection();
	  // $('.draggable').draggable();
	} );
</script>