<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'auth'],function(){

           Route::get('/', function () {
           return view('frontpage');
            });

        //Route::get('/notebooks', 'NotebooksController@index');

        //Route::get('/notebooks/create', 'NotebooksController@create');

       // Route::post('/notebooks', 'NotebooksController@store');

         //Route::get('/notes', 'NotesController@index');

       // Route::get('/notebooks/{notebooks}', 'NotebooksController@edit')->name('notebooks.edit');

       // Route::get('/notebooks/{notebooks}/edit', 'NotebooksController@show')->name('notebooks.show');
        
       // Route::delete('/notebooks/{notebooks}', 'NotebooksController@destroy');

       // Route::put('/notebooks/{notebooks}', 'NotebooksController@update');

       // Route::get('/notes/create', 'NotesController@create');

           Route::resource('notebooks','NotebooksController');
           Route::resource('notes','NotesController');
           Route::get('/notes/{notebookId}/createNote', 'NotesController@createNote')->name('notes.createNote');
           Route::post('/comments', 'CommentController@store')->name('comments.store');
           Route::delete('/comments/{id}', 'CommentController@destroy')->name('comments.destroy');
});


Auth::routes();

Route::get('/homee', 'HomeController@index')->name('home');
