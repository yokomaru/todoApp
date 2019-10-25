<table border="1">
    <tr>
        <th>id</th>
        <th>タスク名</th>
        <th>進捗(%)</th>
        <th>期限</th>
    </tr>
    @foreach($tasks as $task)
    <tr>
        <td>{{$task["id"]}}</td>
        <td>{{$task["name"]}}</td>
        <td>{{$task["progressRate"]}}</td>
        <td>{{$task["dueDate"]}}</td>
    </tr>
    @endforeach
</table>
