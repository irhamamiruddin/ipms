@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <a href="{{ route('lands.index') }}" class="btn btn-primary">Back</a>
    </div>
</div>

{{ Form::model($land,['route' => 'lands.index']) }}
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('lands.forms.main', ['disable' => true])
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <span>Officers In Charge</span>
                <table id="oic-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Officer</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->officer_in_charge as $oic)
                        <tr>
                            <td>{{$oic->name}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <span>Relief Officers In Charge</span>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Officer</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->relief_officer_in_charge as $roic)
                        <tr>
                            <td>{{$roic->name}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <span>Ketua Kampung</span>
                <table id="kk-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Contact No.</td>
                            <td>Remarks</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->ketua_kampung as $kk)
                        <tr>
                            <td>{{$kk->name}}</td>
                            <td>{{$kk->contact_no}}</td>
                            <td>{{$kk->pivot->remark}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            <span>Registered Proprietors</span>
                <table id="rp-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Type</td>
                            <td>Name</td>
                            <td>Contact/Company No.</td>
                            <td>Share</td>
                            <td>Remarks</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->registered_proprietors as $rp)
                        <tr>
                            <td>@if($rp->type == 0) Individual @else Company @endif</td>
                            <td>@if($rp->type == 0) {{$rp->contact->name}} @else {{$rp->company->company_name}} @endif</td>
                            <td>@if($rp->type == 0) {{$rp->contact->contact_no}} @else {{$rp->company->company_no}} @endif</td>
                            <td>{{$rp->share}} / {{$rp->total_share}}</td>
                            <td>{{$rp->remarks}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            <span>Agreements</span>
                <table id="agreement-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Signing Date</td>
                            <td>Stamping Date</td>
                            <td>Expiry Date</td>
                            <td>Reminder Period</td>
                            <td>Reminder Date</td>
                            <td>S&P Price</td>
                            <td>Consideration</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->agreement as $agreement)
                        <tr>
                            <td>{{$agreement->nature}}</td>
                            <td>{{$agreement->pivot->signing_date}}</td>
                            <td>{{$agreement->pivot->stamping_date}}</td>
                            <td>{{$agreement->pivot->expiry_date}}</td>
                            <td>{{$agreement->pivot->reminder_period}}</td>
                            <td>{{$agreement->pivot->reminder_date}}</td>
                            <td>{{$agreement->pivot->s_p_price}}</td>
                            <td>{{$agreement->pivot->consideration}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            <span>Nominees</span>
                <table id="nominee-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Type</td>
                            <td>Name</td>
                            <td>Contact/Company No.</td>
                            <td>Share</td>
                            <td>Remarks</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->nominees as $nominee)
                        <tr>
                            <td>@if($nominee->type == 0) Individual @else Company @endif</td>
                            <td>@if($nominee->type == 0) {{$nominee->contact->name}} @else {{$nominee->company->company_name}} @endif</td>
                            <td>@if($nominee->type == 0) {{$nominee->contact->contact_no}} @else {{$nominee->company->company_no}} @endif</td>
                            <td>{{$nominee->share}} / {{$nominee->total_share}}</td>
                            <td>{{$nominee->remarks}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            <span>Consents</span>
                <table id="consent-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Signing Date</td>
                            <td>Stamping Date</td>
                            <td>Instrument No</td>
                            <td>Instrument Registered Date</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->consent as $consent)
                        <tr>
                            <td>{{$consent->consent}}</td>
                            <td>{{$consent->pivot->signing_date}}</td>
                            <td>{{$consent->pivot->stamping_date}}</td>
                            <td>{{$consent->pivot->instrument_no}}</td>
                            <td>{{$consent->pivot->instrument_registered_date}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            <span>Trustees</span>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Type</td>
                            <td>Name</td>
                            <td>Contact/Company No.</td>
                            <td>Share</td>
                            <td>Remarks</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->trustees as $trustee)
                        <tr>
                            <td>@if($trustee->type == 0) Individual @else Company @endif</td>
                            <td>@if($trustee->type == 0) {{$trustee->contact->name}} @else {{$trustee->company->company_name}} @endif</td>
                            <td>@if($trustee->type == 0) {{$trustee->contact->contact_no}} @else {{$trustee->company->company_no}} @endif</td>
                            <td>{{$trustee->share}} / {{$trustee->total_share}}</td>
                            <td>{{$trustee->remarks}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            <span>Beneficiaries</span>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Type</td>
                            <td>Name</td>
                            <td>Contact/Company No.</td>
                            <td>Share</td>
                            <td>Remarks</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($land->beneficiaries as $beneficiary)
                        <tr>
                            <td>@if($beneficiary->type == 0) Individual @else Company @endif</td>
                            <td>@if($beneficiary->type == 0) {{$beneficiary->contact->name}} @else {{$beneficiary->company->company_name}} @endif</td>
                            <td>@if($beneficiary->type == 0) {{$beneficiary->contact->contact_no}} @else {{$beneficiary->company->company_no}} @endif</td>
                            <td>{{$beneficiary->share}} / {{$beneficiary->total_share}}</td>
                            <td>{{$beneficiary->remarks}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection