@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('projects.index') }}">Back</a>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('projects.logs.create',$project->id) }}">Add Log</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @if (Session::has('success'))
                    <div class="alert alert-success"> {{Session::get('success')}} </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger"> 
                        @foreach ($errors->all() as $message)
                            {{$message}} <br>
                        @endforeach
                    </div>
                @endif
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($project->logs as $log)
                                <tr>
                                    <td><input type="checkbox" id="report{{$log->id}}" name="report" value="1" @if($log->report == 1) checked @endif></td>
                                    <td>{{$log->log_date}}</td>
                                    <td>{{$log->nature}}</td>
                                    <td>{{$log->log_desc}}</td>
                                    <td>{{$log->reminder_date}}</td>
                                    <td><input type="checkbox" id="reminder_date_noty{{$log->id}}" name="reminder_date_noty" value="1" @if($log->reminder_date_noty == 1) checked @endif></td>
                                    <td>
                                        {{ Form::open(['url' => 'projects/' . $project->id . '/logs/' . $log->id ]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{ route('projects.logs.show',[$project->id, $log->id]) }}" style="color: #00B400;"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('projects.logs.edit',[$project->id, $log->id]) }}"><i class="icon-like p-1"></i>
                                        <button type="submit" style="background: none; padding: 0px; border: none; color: #FF0000;">
                                            <i class="icon-directions p-1"></i>
                                        </button>
                                        {{ Form::close() }}
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
    $(document).ready(function(){
        $("#report{{$log->id}}").click(function(){
            if ($("#report{{$log->id}}").is(":checked")) {
                    var report = 1;
            } else {
                var report = 0;
            }

            $.ajax({
                url: "{{ route('projects.logs.update_report',[$project->id,$log->id]) }}",
                method: 'PUT',
                data:{
                    report:report,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    console.log(data);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
    });
@endforeach

@foreach($project->logs as $log)
    $(document).ready(function(){
        $("#reminder_date_noty{{$log->id}}").click(function(){
            if ($("#reminder_date_noty{{$log->id}}").is(":checked")) {
                    var reminder_date_noty = 1;
            } else {
                var reminder_date_noty = 0;
            }

            $.ajax({
                url: "{{ route('projects.logs.update_noty',[$project->id,$log->id]) }}",
                method: 'PUT',
                data:{
                    reminder_date_noty:reminder_date_noty,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    console.log(data);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
    });
@endforeach
</script>
@endpush