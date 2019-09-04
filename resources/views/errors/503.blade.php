@php
	if(Cookie::has('locale')){

	    App::setLocale(Cookie::get('locale'));
	}
    $theme = App\Models\Theme::where('active', '=', 1)->first();
    $path = 'user/'.$theme->root_folder . '/';
@endphp
@extends($path . 'master')

@section('content')
   @include($path . 'partials/errors/503')
@endsection