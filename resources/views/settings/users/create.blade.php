@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Add New User</span>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                {{ Form::open(['route' => 'users.store']) }}
                
                @include('settings.users.form')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('settings.users.index') }}" class="btn btn-secondary">Cancel</a>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection