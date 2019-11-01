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
//Route::get('/tasklist', 'TaskListController@index');
// 初期表示
Route::get('/', 'TaskListController@getTasks');
// タスク新規追加
Route::post('/task', 'TaskListController@saveTask');
// タスク編集画面遷移
Route::get('/edit/{task}' , 'TaskListController@editTask');
// タスク更新
Route::post('/update/{task}' , 'TaskListController@updateTask');
// タスク削除
Route::delete('/task/{task}', 'TaskListController@deleteTask' );
// タスク完了
Route::get('/complete/{task}', 'TaskListController@completeTask' );