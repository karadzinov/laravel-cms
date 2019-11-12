@for($i=0; $i<$review->rating; $i++)
	<i class="fa fa-star"></i>
@endfor
@for($i = 5-$review->rating; $i>0; $i--)
	<i class="fa fa-star-o"></i>
@endfor