<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;


class TaskListController extends Controller
{
    // 初期表示
    // tasks ⇒ Current Tasks表示用
    // completedtasks ⇒ Completed Tasks表示用
    public function getTasks() {

        $tasks = Task::orderBy('priority', 'desc','created_at', 'asc')-> paginate(10);
        //$completedtasks = Task::where('status','1')-> orderBy('priority', 'desc','created_at', 'asc')-> paginate(5);
        return view('tasks',
        ['tasks' => $tasks],
        //['completedtasks' => $completedtasks]
        );
    }

    // Completedボタンを押したら、完了フラグをたてる
    public function completeTask(Task $task) {

        $task = Task::where('id',$task->id)->first();
        $task->status = '1';
        $task->save();

        // 成功アラート表示する
        return redirect('/')->with('flash_message', 'Success save! year!!');
    } 

    // Addボタン押したらInsert
    public function saveTask(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'priority' => 'required',
            'memo' => 'nullable|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->memo = $request->memo;
        $task->status = '0';
        $task->save();

        return redirect('/')->with('flash_message', 'Success save! year!!');
    } 

    // タスク削除
    public function deleteTask(Task $task) {

        $task->delete();

        return redirect('/');
    }

    // 一覧⇒編集画面への画面遷移
    public function editTask(Task $task) {

        $tasks = Task::where('id', $task->id)->get();

        return view('edit', 
        ['tasks' => $tasks]);
    }

    // タスク更新処理
    public function updateTask(Request $request,Task $task) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'priority' => 'required',
            'memo' => 'nullable|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('edit/'.$task->id)
            ->withInput()
            ->withErrors($validator);
        }

        $tasks = new Task;
        $tasks = Task::where('id',$task->id)->first();
        $tasks->name = $request->name;
        $tasks->priority = $request->priority;
        $tasks->memo = $request->memo;
        $tasks->save();
        return redirect('/');
    }

    // 不要
    public function index()
    {
        $tasks = [
            [
                "id" => "1",
                "name" => "見積を作る",
                "progressRate" => 100,
                "dueDate" => "2019/10/17"
            ],
            [
                "id" => "2",
                "name" => "設計書を書く",
                "progressRate" => 50,
                "dueDate" => "2019/10/18"
            ],
            [
                "id" => "3",
                "name" => "コードレビュー",
                "progressRate" => 0,
                "dueDate" => "2019/10/21"
            ],
        ];

        return view('tasklist', [
            "tasks" => $tasks
        ]);
    }
}
