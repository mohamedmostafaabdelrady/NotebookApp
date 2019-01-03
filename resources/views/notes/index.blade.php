@extends('layouts.base')
@section('content')
            <!-- Main component for call to action -->
            <div class="container">
                 @if(count($errors)>0)
                     <ul>
              @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{$error}}</li>
            @endforeach
                     </ul>
                 @endif
                <h1 class="pull-xs-left">
                    Notes
                </h1>
                <div class="pull-xs-right">
                    <a class="btn btn-primary" href="{{route('notes.createNote',$notebook->id)}}" role="button">
                        New Note +
                    </a> 
                </div>
                <div class="clearfix">
                </div>
                <!--============= notes=========== -->
                <div class="list-group notes-group">

                    <!--note1 -->
                    @foreach($notes as $note)
                    <div class="card card-block">
                        <a href="{{route('notes.show',$note->id)}}">
                            <h4 class="card-title">
                                {{$note->title}}
                            </h4>
                        </a>
                        <p class="card-text">
                             {{$note->body}}
                        </p>
                        <a class="btn btn-sm btn-info pull-xs-left" href="{{route('notes.edit',$note->id)}}">
                            Edit
                        </a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['notes.destroy', $note], 'onsubmit' => 'return confirmDelete()']) !!}
                            <input class="btn btn-sm btn-danger pull-xs-right" type="submit" value="Delete">
                                </input>
                            {!! Form::close() !!}
                            <br>
                             {{Form::open(['route' => 'comments.store'])}}

                               <div class="form-group">
                            <label class="font-weight-bold" for="body"></label>
                            <input type="hidden" name="commentable_id" value="{{$note->id}}">
                            <input type="hidden" name="commentable_type" value="App\note">
                           {{Form::text('body',null,['class'=>'form-control'])}}
                            </div>
                        <input class="btn btn-primary" type="submit" value="comment">
                                                    {!! Form::close() !!}
                              <br>                           
                                     @foreach($note->comments as $comment)
                                <!-- <div style="border: 10px solid black"> -->
                                    <!-- <label>{{$comment->body}}</label> -->
                                <!-- </div> -->
                                     <p class="bg-info pull-xs-left" style="width:70%">{{$comment->body}}</p>
                                     {!! Form::open(['method' => 'DELETE', 'route' => ['comments.destroy', $comment->id], 'onsubmit' => 'return confirmDelete()']) !!}
                            <input class="btn btn-sm btn-danger pull-xs-right" type="submit" value="Delete">
                                </input>
                            {!! Form::close() !!}
                            @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            <script type="text/javascript">
           function confirmDelete() {
                return confirm('Are you sure you want to delete?');
            }
       </script>
@endsection           
