<?php

Route::get('/', ['as' => 'dashboard', function() {
	return redirect(route('messages.index'));
}]);

Route::get('members', ['as' => 'members.index', 'uses' => 'MemberController@index']);

Route::get('members/create', ['as' => 'members.create', 'uses' => 'MemberController@create']);

Route::post('members', ['as' => 'members.store', 'uses' => 'MemberController@store']);

Route::get('members/{id}/edit', ['as' => 'members.edit', function($id) {
	return view('members.edit');
}]);

Route::put('members/{id}/edit', ['as' => 'members.update', 'uses' => 'MemberController@update']);

Route::get('messages', ['as' => 'messages.index', function() {
	return view('messages.index');
}]);

Route::post('messages', ['as' => 'messages.create', function() {
	return 'Message sent';
}]);

Route::auth();

Route::get('/home', 'HomeController@index');
