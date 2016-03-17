<?php

Route::get('/',['as' => 'home', 'uses' => 'PostController@index']);
Route::get('/home',['as' => 'home', 'uses' => 'PostController@index']);

// contact page
Route::get('contact','UserController@contact');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => ['auth']], function()
{
	// show new post form
	Route::get('new-post','PostController@create');
	
	// save new post
	Route::post('new-post','PostController@store');
	
	// edit post form
	Route::get('edit/{slug}','PostController@edit');
	
	// update post
	Route::post('update','PostController@update');
	
	// delete post
	Route::get('delete/{id}','PostController@destroy');



	// show new project form
	Route::get('project/add','ProjectController@create');

	// save new project
	Route::post('project/add','ProjectController@store');

    // edit project form
    Route::get('project/edit/{slug}','ProjectController@edit');

    // update project
    Route::post('project/','ProjectController@update');

    // display a project
    Route::get('project/show/{slug}',['as' => 'project', 'uses' => 'ProjectController@show'])->where('slug', '[A-Za-z0-9-_]+');

    // list project
    Route::get('project','ProjectController@index');




	// add comment
	Route::post('comment/add','CommentController@store');
	
	// delete comment
	Route::post('comment/delete/{id}','CommentController@destroy');

	//users profile
	Route::get('user/{id}','UserController@profile')->where('id', '[0-9]+');

	//users modifications
	Route::post('user/{id}','UserController@update')->where('id', '[0-9]+');

});


// display single post
Route::get('/{slug}',['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');


