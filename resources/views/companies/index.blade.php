@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Companies</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" >Export</a>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('companies.create') }}">Add Company</a>
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
                                    <th>Business Nature</th>
                                    <th>Company Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->business_nature_id}}</td>
                                    <td>{{$company->company_name}}</td>
                                    <td>{{$company->phone}}</td>
                                    <td>{{$company->address}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>
                                        <a href="{{ route('companies.show',$company->id) }}"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('companies.edit',$company->id) }}"><i class="icon-like p-1"></i>
                                        <a href="{{ route('companies.destroy',$company->id) }}"><i class="icon-directions p-1"></i>
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