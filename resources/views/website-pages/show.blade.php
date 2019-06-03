@extends('layouts.app')

@section('content')
    <div class="widget">

        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">
                <i class="fa fa-newspaper-o"></i> 
                Pages
            </span>
            <a href="{{route('pages.edit', $page->id)}}" class="btn btn-warning pull-right">Edit Page</a>
        </div>
        <div class="widget-body">
            <div>
                <label for="title"><strong>Title:</strong></label>
                <p>{!!$page->title!!}</p>
            </div>
            <div>
                <label for="subtitle">Subtitle:</label>
                <pre><code>{!!$page->subtitle!!}</code></pre>
            </div>
            <div>
                <label for="main_text">Main Text:</label>
                <pre id="main_text"><code>{!!$page->main_text!!}</code></pre>
            </div>
            
        </div>
    </div>
@endsection