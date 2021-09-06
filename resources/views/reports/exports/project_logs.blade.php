<table>
    <thead>
        <tr>
            <th>Project Title</th>
            <th>Date</th>
            <th>Nature</th>
            <th>Log</th>
        </tr>
    </thead>
    <tbody>
        @foreach($project_logs as $log)
        <tr>
            <td>{{$log->project->title}}</td>
            <td>{{$log->log_date}}</td>
            <td>{{$log->nature}}</td>
            <td>
                <b>{{$log->level_1}} </b><br>
                <i>{{$log->level_2}}</i><br><br>
                {{$log->log_desc}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>