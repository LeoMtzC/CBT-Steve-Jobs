@if (isset($errors) && count ($errors) > 0)
<div class="alert alert-warning">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::get('success', false))
<?php $data = Session::get('success'); //ignorar el error ?>
@if (is_array($data))
@foreach ($data as $message)
<div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-check"></i>
    {{ $message }}
</div>
@endforeach
@else
<div class="alert alert-success">
    <i class="fa fa-check"></i>
    {{ $data }}
</div>
@endif
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fas fa-exclamation-circle"></i>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif