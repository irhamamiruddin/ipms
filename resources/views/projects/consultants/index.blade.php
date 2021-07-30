@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Consultants</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('projects.index') }}">Back</a>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('projects.consultants.create',$project->id) }}">Add Consultant</a>
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
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Role</th>
                                    <th>Key Approved Plans</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultants as $consultant)
                                <tr>
                                    <td>{{$consultant->contact->name}}</td>
                                    <td>
                                        @forelse($consultant->contact->companies as $company)
                                            - {{$company->company_name}} <br>
                                        @empty
                                            No affiliated company.
                                        @endforelse
                                    </td>
                                    <td>{{$consultant->role->type}}</td>
                                    <td>
                                        @forelse($consultant->key_approved_plans as $kap)
                                            - {{$kap->display_name}} <br>
                                        @empty
                                            No plan recorded.
                                        @endforelse
                                    </td>
                                    <td class="text-nowrap">
                                        {{ Form::open(['url' => 'projects/' . $project->id . '/consultants/' . $consultant->id ]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{ route('projects.consultants.show',[$project->id,$consultant->id]) }}" style="color: #00B400;"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('projects.consultants.edit',[$project->id,$consultant->id]) }}"><i class="icon-like p-1"></i>
                                        <button type="submit" style="background: none; padding: 0px; border: none; color: #FF0000;">
                                            <i class="icon-directions p-1"></i>
                                        </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @empty
                                <td>No record found.</td>
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
@endpush