@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Edit Role</span>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                {{ Form::model($role,['route' => 'roles.store']) }}
                @method('PUT')
                {{ Form::hidden('id', $role->id) }}
                
                {{ Form::label('name', 'Role') }}
                {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => 'Role Name', 'required' => true]) }}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection