<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an applicatio
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');
Route::resource('board','BoardController');
Route::get('/passconfirm/{id}','BoardController@confirm_page');
Route::post('/validation','BoardController@validation');


Route::get('/shareindex/{mode?}','ShareController@index');
Route::get('/write','ShareController@writeView');
Route::post('/sharePrc','ShareController@writeInsert');
Route::get('/AddUserForm','ShareController@divisionList');
Route::get('/GroupUserName/{division}','ShareController@GroupGetUserName');
Route::get('/detailView/{workshare}','ShareController@detailView');
Route::get('/fdown/{name}','ShareController@fileDown');






//Route::get('/board','BoardController@index');
/*
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::get('/Tview/{task}','TaskController@view');
Route::get('/Twrite', 'TaskController@write');
Route::get('/Tmodify/{task}','TaskController@modify');
*/
