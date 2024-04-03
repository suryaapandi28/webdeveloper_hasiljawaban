@if ($message = Session::get('error-SignIn'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('success-SignIn'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('success-sistem'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif
