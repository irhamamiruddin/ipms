@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Add New Land</span>
    </div>
</div>
{{ Form::open(['route' => 'lands.store', 'files' => true]) }}
@csrf

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('lands.forms.main', ['disable' => false])
            </div>
        </div>
    </div>
</div>

@can('assign-oic')
<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.officer_in_charge')
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.relief_officer_in_charge')
            </div>
        </div>
    </div>
</div>
@endcan

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.ketua_kampung')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.registered_proprietor')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.agreement')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.nominee')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.consent')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.trustee')
            </div>
        </div>
    </div>
</div>

@can('add-beneficiary')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('lands.forms.beneficiary')
            </div>
        </div>
    </div>
</div>
@endcan

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('lands.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection