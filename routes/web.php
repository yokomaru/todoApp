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
Route::get('/edit/{task}' , 'TaskListController@editTask');
Route::post('/update' , 'TaskListController@updateTask');
/*Route::post('/update' ,function () {
    $request = request(); // リクエストインスタンスを取得
    $data = $request->all(); // 全データを連想配列で取得
    return $data;});*/
Route::delete('/task/{task}', 'TaskListController@deleteTask' );