<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', ['as' => 'dashboard', function() {
	return redirect(route('messages.index'));
}]);

Route::get('members', ['as' => 'members.index', function() {
	$members = [
		['deptid' => 614, 'name' => 'Craig Huffman', 'phone' => '812-319-4352', 'carrier' => 'Verizon', 'ripruns' => 1, 'notifications' => 1],
		['deptid' => 601, 'name' => 'Charlie Kirsch', 'phone' => '812-555-5555', 'carrier' => 'AT&T', 'ripruns' => 1, 'notifications' => 0]
	];

	return view('members.index', compact('members'));
}]);

Route::get('members/create', ['as' => 'members.create', function() {
	return view('members.create');
}]);

Route::post('members', ['as' => 'members.store', function() {
	return 'Svaed';
}]);

Route::get('members/{id}/edit', ['as' => 'members.edit', function($id) {
	return view('members.edit');
}]);

Route::put('members/{id}/edit', ['as' => 'members.update', function() {
	return 'Updated';
}]);

Route::get('messages', ['as' => 'messages.index', function() {
	return view('messages.index');
}]);

Route::post('messages', ['as' => 'messages.create', function() {
	return 'Message sent';
}]);
