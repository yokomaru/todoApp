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

                <!-- New Task Form -->
                <form action="{{ url('task')  }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name  -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>
                        <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                    </div>
                    <!-- Task Priority  -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Priority</label>
                        <div class="col-sm-4">
                        <select name="priority" class="form-control">
                            <option value="">選択してください</option>
                            <option value="2">high</option>
                            <option value="1">middle</option>
                            <option value="0">low</option>
                            </select>
                        </div>
                    </div>
                    <!-- Task Memo  -->
                    <div class="form-group">
                        <label for="task-memo" class="col-sm-3 control-label">Memo</label>
                        <div class="col-sm-6">
                            <input type="text" name="memo" id="task-memo" class="form-control">
                        </div>
                    </div>
                    <!-- curendder  -->
                    <div class="form-group">
                        <label for="task-memo" class="col-sm-3 control-label">duedate</label>
                        <div class="col-sm-6">
                        <input type="text" id="datepicker" class="form-control" >
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Add Task
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
            @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th class="col-xs-6">Task</th>
                            <th class="col-xs-2">Priority</th>
                            <th class="col-xs-1">&nbsp;</th>
                            <th class="col-xs-1">&nbsp;</th>
                            <th class="col-xs-1">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                        <div>
                                            @if ($task->memo == '')
                                                
                                            @else
                                                ・ {{ $task->memo }}
                                            @endif
                                    </div>
                                    </td>
                                    <!-- task priority -->
                                    <td class="table-text">
                                        <label>
                                        @if ($task->priority === '0')
                                            low
                                        @elseif ($task->priority === '1')
                                            middle
                                        @elseif ($task->priority === '2')
                                            high
                                        @else
                                            ''
                                        @endif
                                        </label>
                                    </td>
                                    <td>
                                    <!-- Completed Button -->
                                        <form action="{{ url('complete/'.$task->id) }}" method="POST">
                                            {{ csrf_field()}}
                                            {{ method_field('GET') }}
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        </form>
                                    </td>
                                    <!-- Delete Button -->
                                    <td>
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        </form>
                                    </td>
                                    <td>
                                    <!-- Edit Button -->
                                    <form action="{{ url('edit/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('GET') }}
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
            @endif
    </div>


<script>
    $('#datepicker').datepicker({
        dateFormat: 'yy/mm/dd',
    });
</script>

@endsection