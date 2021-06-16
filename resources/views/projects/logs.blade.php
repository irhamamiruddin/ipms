@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <a href="{{ route('projects.edit',$project->id) }}" class="btn btn-md btn-secondary btn-fw">Project</a>
        <a href="{{ route('projects.log',$project->id) }}" class="btn btn-md btn-secondary btn-fw active">Log</a>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('projects.add_log',$project->id) }}">Add Log</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <table id="order-listing" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Report Visiblity</th>
                                    <th>Date</th>
                                    <th>Nature</th>
                                    <th>Log</th>
                                    <th>Reminder Date</th>
                                    <th>Notification</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($project->logs as $log)
                                <tr>
                                    <td>
                                    {{ Form::open(['route' => 'projects.check_report']) }}
                                    @method('PUT')
                                    {{ Form::hidden('project_id', $project->id) }}
                                    {{ Form::hidden('log_id', $log->id) }}
                                    <input type="checkbox" id="report{{$log->id}}" name="report" value="1" @if($log->report == 1) checked @endif>
                                    {{ Form::close() }}
                                    </td>
                                    <td>{{$log->log_date}}</td>
                                    <td>{{$log->nature}}</td>
                                    <td>{{$log->log_desc}}</td>
                                    <td>{{$log->reminder_date}}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('projects.edit_log',['project_id' => $project->id, 'log_id' => $log->id]) }}"><i class="icon-like p-1"></i>
                                        <a href="{{ route('projects.destroy_log',['project_id' => $project->id, 'log_id' => $log->id]) }}"><i class="icon-directions p-1"></i>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No record found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="../../../../vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('js/data-table.js') }}"></script>

<script>
@foreach($project->logs as $log)
$("#report{{$log->id}}").change(function() {
     this.form.submit();
});
@endforeach
</script>
@endpush