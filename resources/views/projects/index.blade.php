@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Projects</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" >Export</a>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('projects.create') }}">Add Project</a>
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
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>Officer in Charge</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->company->company_name}}</td>
                                    <td>Size</td>
                                    <td>{{$project->project_status->project_status}}</td>
                                    <td>
                                        @forelse($project->officer_in_charge as $oic)
                                            {{$oic->name}}
                                        @empty
                                            No Records.
                                        @endforelse
                                    </td>
                                    <td>
                                        <a href="{{ route('projects.show',$project->id) }}"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('projects.edit',$project->id) }}"><i class="icon-like p-1"></i>
                                        <a href="{{ route('projects.destroy',$project->id) }}"><i class="icon-directions p-1"></i>
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