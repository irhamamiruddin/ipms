@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <span class="card-title display-4">Contacts</span>
                <div class="float-right">
                    <a class="btn btn-inverse-primary btn-fw" >Export</a>
                    <a class="btn btn-inverse-primary btn-fw" href="{{ route('contacts.create') }}">Add Contact</a>
                </div>
                <div class="row pt-3">
                    <div class="col-lg-12 table-responsive">
                        <table id="order-listing" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>NRIC</th>
                                    <th>Race</th>
                                    <th>Address</th>
                                    <th>Contact No.</th>
                                    <th>Remark</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contacts)
                                <tr>
                                    <td>{{$contacts->name}}</td>
                                    <td>{{$contacts->nric}}</td>
                                    <td>{{$contacts->race}}</td>
                                    <td>{{$contacts->address}}</td>
                                    <td>{{$contacts->contact_no}}</td>
                                    <td>{{$contacts->remark}}</td>
                                    <td>
                                        Actions
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
@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush
@push('js')
<script src="../../../../vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('js/data-table.js') }}"></script>
@endpush