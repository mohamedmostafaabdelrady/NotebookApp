@extends('layouts.base')
@section('content')
<div class="container">
<h1>Create Notebook</h1>
@if(count($errors)>0)
<ul>
	@foreach($errors->all() as $error)
	<li class="alert alert-danger">{{$error}}</li>
    @endforeach
</ul>
@endif
{{Form::open(['route' => 'notebooks.store'])}}
<!-- <form action="/notebooks" method="POST"> -->
	<!-- {{csrf_field()}} -->
	<div class="form-group">
	<label class="font-weight-bold" for="name">Notebook Name</label>
	{{Form::text('name',null,['class'=>'form-control'])}}
	<!-- <input class="form-control" type="text" name="name"> -->
</div>
     <input class="btn btn-primary" type="submit" value="Done">
</form>
</div>
@endsection