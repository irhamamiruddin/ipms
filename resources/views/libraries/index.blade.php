@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Contacts</span>
    </div>
</div>

{{ Form::open(['route' => 'libraries.store', 'files' => true]) }}
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('libraries.forms.main')
            </div>
        </div>
        
    </div>
</div>
{{ Form::close() }}

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
                                    <th>Uploads</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($libraries as $library)
                                <tr>
                                    <td>{{$library->name}}</td>
                                    <td>Uploaded file</td>
                                    <td>{{$library->lib_type->type}}</td>
                                    <td>
                                        <a href="{{ route('libraries.edit',$library->id) }}"><i class="icon-like p-1"></i>
                                        <a href="{{ route('libraries.destroy',$library->id) }}"><i class="icon-directions p-1"></i>
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