@extends('layouts.base')
@section('content')
<div class="container">
<h1>Edit Note</h1>
@if(count($errors)>0)
<ul>
	@foreach($errors->all() as $error)
	<li class="alert alert-danger">{{$error}}</li>
    @endforeach
</ul>
@endif

{{Form::model($note, ['route' => ['notes.update', $note->id],'method'=>'patch'])}} 

	<div class="form-group">
	<label class="font-weight-bold" for="title">Note Title</label>
	{{Form::text('title',null,['class'=>'form-control'])}}
	<!-- <input class="form-control" type="text" name="title"> -->
	<label class="font-weight-bold" for="body">Note body</label>
	{{Form::textarea('body',null,['class'=>'form-control'])}}
	<!-- <input class="form-control" type="text" name="body"> -->
</div>
     <input type="hidden" name="notebook_id" value="{{$note->notebook_id}}">
     <input class="btn btn-primary" type="submit" value="Done">
{{Form::close()}}
</div>
@endsection