@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Contacts</span>
        <div class="float-right">
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('contacts.export') }}">Export</a>
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('contacts.create') }}">Add Contact</a>
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
                                    <th>NRIC</th>
                                    <th>Race</th>
                                    <th>Address</th>
                                    <th>Contact No.</th>
                                    <th>Remark</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->nric}}</td>
                                    <td>{{$contact->race}}</td>
                                    <td>{{$contact->address}}</td>
                                    <td>{{$contact->contact_no}}</td>
                                    <td>{{$contact->remark}}</td>
                                    <td>
                                        {{ Form::open(['url' => 'contacts/' . $contact->id]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{ route('contacts.show',$contact->id) }}" style="color: #00B400;"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('contacts.edit',$contact->id) }}"><i class="icon-like p-1"></i>
                                        <button type="submit" style="background: none; padding: 0px; border: none; color: #FF0000;">
                                            <i class="icon-directions p-1"></i>
                                        </button>
                                        {{ Form::close() }}
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