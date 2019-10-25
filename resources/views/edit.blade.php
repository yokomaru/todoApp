@extends('layouts.app')    <!-- ① -->
@section('content')    <!-- ② -->
    <div class="container">
        <!-- Current Tasks -->
        @if (count($tasks) >= 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            Current Tasks
            </div>

            <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                <th>Task</th>
                <th>&nbsp;</th>
                </thead>
                <tbody>
                <form action="{{ url('update/') }}" method="POST">
                @foreach($tasks as $task)
                    <tr>
                    <!-- Task Name -->
                    <td class="table-text">
                    <div class="form-group">
                        <div class="col-sm-6">
                        <input type="hidden" name = "id" id="task-id" value = "{{ $task->id }}">
                        <input type="text" name="name" id="task-name" class="form-control" value = "{{ $task->name }}">
                        </div>
                        </div>
                    </td>
                    <!-- Delete Button
                    <td>
                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                        {{ csrf_field() }}　
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                        </form>
                    </td> -->
                    <!-- Update Button -->
                    <td>
                       <!-- <form action="{{ url('task/'.$task->id) }}" method="POST">-->
                        {{ csrf_field()}}　<!-- ④ -->
                        {{ method_field('POST') }}　<!-- ⑤ -->
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-automobile"></i> Update
                        </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        @endif
    </div>
@endsection