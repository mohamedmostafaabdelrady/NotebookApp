
    @extends('layouts.base')
    @section('content')
            
            <!-- Main component for call to action -->
            <div class="container text-center">
                @if(count($errors)>0)
                     <ul>
              @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{$error}}</li>
            @endforeach
                     </ul>
                 @endif
                <!-- heading -->
                <h1 class="pull-xs-left">
                    Your Notebooks
                </h1>
                <div class="pull-xs-right">
                    <a class="btn btn-primary" href="/notebooks/create" role="button">
                        New NoteBook +
                    </a>
                </div>

                <div class="clearfix">
                </div>
                <br>
                
                <!-- ================ Notebooks==================== -->
                <!-- notebook1 -->

                @foreach($notebooks as $notebook)
                <div class="col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <a href="{{Route('notebooks.show' , $notebook->id)}}">
                                <h4 class="card-title" style="text-align:center;">
                                    {{$notebook->name}}
                                </h4>
                            </a>
                        </div>
                        <a href="{{Route('notebooks.show' , $notebook->id)}}">
                            <img alt="Responsive image" style="display: block; margin: 0 auto;" class="img-fluid" src="dist/img/notebook.jpg"/>
                        </a>
                        <div class="card-block">
                            <a a class="btn btn-sm btn-info pull-xs-left" href="{{Route('notebooks.edit', $notebook->id)}}">
                                Edit Notebook
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['notebooks.destroy', $notebook], 'onsubmit' => 'return confirmDelete()']) !!}
                                <input class="btn btn-sm btn-danger pull-xs-right" type="submit" value="Delete"></input>
                            {!! Form::close() !!}
                            <br>
                            <br>
                            {{Form::open(['route' => 'comments.store'])}}
                                <div class="form-group">
                                    <label class="font-weight-bold" for="body">Comment</label>
                                    <input type="hidden" name="commentable_id" value="{{$notebook->id}}">
                                    <input type="hidden" name="commentable_type" value="App\notebook">
                                   {{Form::text('body',null,['class'=>'form-control'])}}
                                </div>
                                <input class="btn btn-primary" type="submit" value="comment">
                            {!! Form::close() !!}
                            <br>
                            @foreach($notebook->comments as $comment)
                                 <p class="bg-info pull-xs-left" style="width:70%">{{$comment->body}}</p>
                                     {!! Form::open(['method' => 'DELETE', 'route' => ['comments.destroy', $comment->id], 'onsubmit' => 'return confirmDelete()']) !!}
                            <input class="btn btn-sm btn-danger pull-xs-right" type="submit" value="Delete">
                                </input>
                            {!! Form::close() !!}
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach



       <script type="text/javascript">
           function confirmDelete() {
                return confirm('Are you sure you want to delete?');
            }
       </script>
@endsection
