<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'title'=>'required|max:10|unique:notes,title',
        'body'=>'required|min:10'
        ]);
        Note::create($request->all());
        $notebookId=$request->notebook_id;
        return redirect()->route('notebooks.show',compact('notebookId'));
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $note=Note::find($id);
     return view('notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note=Note::find($id);
        return view('notes.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'title'=>'required|max:10|unique:notes,title,'.$id,
        'body'=>'required|min:10'
        ]);
         $inputdata=$request->all();
         $note=Note::find($id);
        $note->update($inputdata);
        $notebookId=$request['notebook_id'];
        return redirect()->route('notebooks.show',$notebookId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $note=Note::find($id);
          $note->comments()->delete();
         Note::destroy($id);
        
        return back();
    }

    public function createNote($notebookId){

return view('notes.create')->with('id',$notebookId);
    }
}
