@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <a href="{{ route('contacts.index') }}" class="btn btn-primary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                {{ Form::model($contact, ['route' => 'contacts.index']) }}
                
                @include('contacts.form')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('contacts.affiliated_company')
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('contacts.affiliated_user')
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection