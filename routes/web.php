<?php
use App\Task;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/tasklist', 'TaskListController@index');
Route::get('/', 'TaskListController@getTasks');
Route::post('/task', 'TaskListController@saveTask');
Route::delete('/task/{task}', 'TaskListController@deleteTask' );