@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Lands</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" >Export</a>
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
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($lands as $land)
                                <tr>
                                    <td>{{$land->project_id}}</td>
                                    <td>{{$land->land_description}}</td>
                                    <td>{{$land->locality}}</td>
                                    <td>{{$land->classification}}</td>
                                    <td>
                                        <a href="{{ route('lands.show',$land->id) }}"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('lands.edit',$land->id) }}"><i class="icon-like p-1"></i>
                                        <a href="{{ route('lands.destroy',$land->id) }}"><i class="icon-directions p-1"></i>
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
@endpush