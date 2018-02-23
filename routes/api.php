<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

  'middleware' => 'api',
  'prefix' => 'auth'

], function ($router) {

  Route::post('/login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');
  Route::post('/tasks', 'TasksController@getTasks');
});

Route::post('/users', 'Auth\RegisterController@create');
Route::post('/newTask', 'TasksController@newTask');
Route::post('/changeTask', 'TasksController@changeTask');
Route::post('/deleteTask', 'TasksController@deleteTask');
Route::post('/finishTask', 'TasksController@finishTask');
Route::post('/changePriority', 'TasksController@changePriority');
