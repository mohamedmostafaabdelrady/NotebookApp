<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\notebook;

class NotebooksController extends Controller
{
    public function index(){
           $user=Auth::user();
           $notebooks=$user->notebooks;
    	return view ('notebooks.index',compact('notebooks'));
    }

      public function create(){
    	return view ('notebooks.create');
    }

      public function show($id){
      $notebook=Notebook::findOrFail($id);
      $notes=$notebook->notes;
      return view('notes.index',compact('notes','notebook'));
    }

       public function store(Request $request){
      $this->validate($request,[
        'name'=>'required|max:10|unique:notebooks,name',
        ]);  
      $user=Auth::user();
    	$user->notebooks()->create($request->all());
    	return redirect('/notebooks');
    }

      public function edit($id){
      $user=Auth::user();
      $notebook=$user->notebooks()->find($id);
      return view('notebooks.edit')->with('notebook',$notebook);
    }

      public function update(Request $request , $id){
        $this->validate($request,[
        'name'=>'required|max:10|unique:notebooks,name,'.$id,
        ]);
       $user=Auth::user();
      $notebook=$user->notebooks()->find($id);
      $notebook->update($request->all());
      return redirect('/notebooks');
    }

  public function destroy($id){
      $notebook=notebook::find($id);
      foreach ($notebook->notes as $key => $note) {
         $note->comments()->delete();
      }
      $notebook->notes()->delete();
      $notebook->comments()->delete();
      $notebook->delete();
      return redirect('/notebooks');
    }
}
