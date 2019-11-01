@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Task
            </div>
            <div class="panel-body">

                <!-- Display Validation Errors -->
                @include('common.errors')　
                <!-- Display Validation Success -->
                @include('common.successes')　

                @if (count($tasks) >= 0)
                    <!-- New Task Form -->
                    @foreach($tasks as $task)
                    <form action="{{ url('update/'.$task->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                            <!-- Task Name  -->
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Task</label>
                                <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value = "{{ $task->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Priority</label>
                                    <div class="col-sm-4">
                                        <select name="priority" class="form-control" >
                                            <option value="" @if($task->priority === '') selected  @endif>選択してください</option>
                                            <option value="2" @if($task->priority === '2') selected  @endif>高</option>
                                            <option value="1" @if($task->priority === '1') selected  @endif>中</option>
                                            <option value="0" @if($task->priority === '0') selected  @endif>低</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="task-memo" class="col-sm-3 control-label">Memo</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="memo" id="task-memo" class="form-control" value = "{{ $task->memo }}">
                                    </div>
                            </div>
                        @endforeach
                        <!-- Add Task Button -->
                            <div class="col-sm-offset-3 col-sm-6">
                                {{ csrf_field()}}
                                {{ method_field('POST') }}
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-pencil"></i>  Update
                                </button>
                            </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


