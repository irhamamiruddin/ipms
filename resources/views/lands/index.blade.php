@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Lands</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('lands.export') }}">Export</a>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('lands.create') }}">Add Land</a>
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
                                    <th>Project</th>
                                    <th>Land Description</th>
                                    <th>Area</th>
                                    <th>Classification</th>
                                    <th>Actions</th>
                                    <th>Check Log</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($lands as $land)
                                <tr>
                                    <td>@if($land->project_id == NULL) None @else {{$land->project->title}} @endif</td>
                                    <td>{{$land->land_description}}</td>
                                    <td>{{$land->locality}}</td>
                                    <td>@if($land->classification == NULL) None @else {{$land->classifications->classification}} @endif</td>
                                    <td>
                                        {{ Form::open(['url' => 'lands/' . $land->id]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{ route('lands.show',$land->id) }}" style="color: #00B400;"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('lands.edit',$land->id) }}"><i class="icon-like p-1"></i>
                                        <button type="submit" style="background: none; padding: 0px; border: none; color: #FF0000;">
                                            <i class="icon-directions p-1"></i>
                                        </button>
                                        {{ Form::close() }}
                                    </td>
                                    <td><a href="{{ route('lands.logs.index',$land->id) }}" class="btn btn-inverse-primary btn-fw">Logs</a></td>
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