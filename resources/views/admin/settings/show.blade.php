@extends('layouts.app')
@section('pageTitle')
    {{trans('settings.settings')}}
@endsection
@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">

              Show settings 

            </div>
        </div>
    </div>

@endsection

