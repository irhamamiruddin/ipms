@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Add New Project</span>
    </div>
</div>
{{ Form::open(['route' => 'projects.store', 'files' => true]) }}

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('projects.forms.main')
            </div>
        </div>
    </div>
</div>

@can('assign-oic')
<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('projects.forms.officer_in_charge')
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('projects.forms.relief_officer_in_charge')
            </div>
        </div>
    </div>
</div>
@endcan

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('projects.forms.land')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('projects.forms.company')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-4">
                @include('projects.forms.development_component')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection