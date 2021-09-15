@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Projects</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('projects.export') }}">Export</a>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('projects.create') }}">Add Project</a>
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
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>Officer in Charge</th>
                                    <th>Actions</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->company->company_name}}</td>
                                    <td>
                                        @forelse($project->lands as $land)
                                            {{$land->size}} {{$land->size_unit}}<br>
                                        @empty
                                            No Records.
                                        @endforelse
                                    </td>
                                    <td>{{$project->project_status->project_status}}</td>
                                    <td>
                                        @forelse($project->officer_in_charge as $oic)
                                            {{$oic->name}} <br>
                                        @empty
                                            No Records.
                                        @endforelse
                                    </td>
                                    <td class="text-nowrap">
                                        {{ Form::open(['url' => 'projects/' . $project->id]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{ route('projects.show',$project->id) }}" style="color: #00B400;"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('projects.edit',$project->id) }}"><i class="icon-like p-1"></i>
                                        <button type="submit" style="background: none; padding: 0px; border: none; color: #FF0000;">
                                            <i class="icon-directions p-1"></i>
                                        </button>
                                        {{ Form::close() }}
                                    </td>
                                    <td><a href="{{ route('projects.consultants.index',$project->id) }}" class="btn btn-inverse-primary">Consultants</a></td>
                                    <td><a href="{{ route('projects.logs.index',$project->id) }}" class="btn btn-inverse-primary">Logs</a></td>
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