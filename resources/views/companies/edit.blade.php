@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Add New Company</span>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                {{ Form::model($company,['route' => 'companies.store', 'files' => true]) }}
                @method('PUT')
                {{ Form::hidden('id', $company->id) }}

                @include('companies.form')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection