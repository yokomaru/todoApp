<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;

class TaskListController extends Controller
{
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
    
    public function getTasks() {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    public function saveTask(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            ]);
            
            if ($validator->fails()) {
                return redirect('/')
                ->withInput()
                ->withErrors($validator);
            }
            
            $task = new Task;
            $task->name = $request->name;
            $task->save();
            
            return redirect('/');
        } 

        public function deleteTask(Task $task) {
         $task->delete();

        return redirect('/');
        }

        public function editTask(Task $task) {
        //    $tasks = Task::orderBy('created_at', 'asc')->get();
            $tasks = Task::where('id', $task->id)->get();
            return view('edit', [
                'tasks' => $tasks
            ]);
        }

        public function updateTask(Request $request) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                ]);
                
            if ($validator->fails()) {
               return redirect('/')
                ->withInput()
                ->withErrors($validator);
            }
            $tasks = new Task;
            $tasks = Task::where('id',$request->id)->first();
            $tasks->name = $request->name;
            $tasks->save();
            return redirect('/');
        }
}
