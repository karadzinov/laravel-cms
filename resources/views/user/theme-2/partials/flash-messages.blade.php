@if(session()->has('errors'))
    <div class="alert alert-danger mb-0 mt-100">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4 class="half-width">{{trans('general.error-occured')}}:</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert my-alert alert-danger pull-right">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>{{trans('general.error-occured')}}:</h4>
        <ul>
           <li>{{ session()->get('error') }}</li>
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert my-alert alert-success pull-right">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>{{trans('general.success')}}:</h4>
        <ul>
           <li>{{ session()->get('success') }}</li>
        </ul>
    </div>
@endif