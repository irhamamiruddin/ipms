@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Land Ownerships</span>
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
                                    <th>Land</th>
                                    <th>Registered Proprietors</th>
                                    <th>Nominees</th>
                                    <th>Trustees</th>
                                    <th>Beneficiaries</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lands as $land)
                                <tr>
                                    <td>{{$land->land_description}}</td>
                                    <td>
                                        @foreach($land->registered_proprietors as $rp)
                                            @if($rp->type == 0)
                                                - {{$rp->contact->name}} <br>
                                            @elseif($rp->type == 1)
                                                - {{$rp->company->company_name}} <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($land->nominees as $nominee)
                                            @if($nominee->type == 0)
                                                - {{$nominee->contact->name}} <br>
                                            @elseif($nominee->type == 1)
                                                - {{$nominee->company->company_name}} <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($land->trustees as $trustee)
                                            @if($trustee->type == 0)
                                                - {{$trustee->contact->name}} <br>
                                            @elseif($trustee->type == 1)
                                                - {{$trustee->company->company_name}} <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($land->beneficiaries as $beneficiary)
                                            @if($beneficiary->type == 0)
                                                - {{$beneficiary->contact->name}} <br>
                                            @elseif($beneficiary->type == 1)
                                                - {{$beneficiary->company->company_name}} <br>
                                            @endif
                                        @endforeach
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