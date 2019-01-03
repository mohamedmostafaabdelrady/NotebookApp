<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
     public function store(Request $request){
     	unset($request['_token']);
     	$this->validate($request,[
        'body'=>'required'
        ]);
      Comment::create( $request->all());
      $notebookId=$request->notebook_id;
      return redirect()->back();
  }
 public function destroy($id)
    {
         $comment=Comment::find($id);
         Comment::destroy($id);
        return back();
    }
}
