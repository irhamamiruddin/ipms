@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Lands</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('lands.logs.create',$land->id) }}">Add Log</a>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('lands.index') }}">Back</a>
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($land->logs as $log)
                                <tr>
                                    <td>
                                    {{ Form::open(['route' => 'lands.logs.check_report']) }}
                                    @method('PUT')
                                    {{ Form::hidden('land_id', $land->id) }}
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
                                        {{ Form::open(['url' => 'lands/' . $land->id . '/logs/' . $log->id ]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{ route('lands.logs.show',[$land->id, $log->id]) }}" style="color: #00B400;"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('lands.logs.edit',[$land->id, $log->id]) }}"><i class="icon-like p-1"></i>
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
@foreach($land->logs as $log)
$("#report{{$log->id}}").change(function() {
     this.form.submit();
});
@endforeach
</script>
@endpush