@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Project Logs</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" >Export</a>
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
                                    <th>Project Title</th>
                                    <th>Date</th>
                                    <th>Nature</th>
                                    <th>Log</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project_logs as $log)
                                <tr>
                                    <td><a href="{{ route('projects.edit',$log->project_id) }}">{{$log->project->title}}</a></td>
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
@endpush