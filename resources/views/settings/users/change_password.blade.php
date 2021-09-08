@extends('layouts.app')
@section('content')
@php
    $url = url()->previous();
@endphp

<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Change Password</span>
    </div>
</div>

{{ Form::open(['route' => ['users.update', $id]]) }}
@method('PUT')
@if (strstr($url,'change-password'))
    {{ Form::hidden('prev_url','/') }}
@else
    {{ Form::hidden('prev_url',$url) }}
@endif

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @if (Session::has('success'))
                    <div class="alert alert-success"> {{Session::get('success')}} </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger"> 
                        @foreach ($errors->all() as $message)
                            {{$message}} <br>
                        @endforeach
                    </div>
                @endif
                <div class="form-row">
                    <div class="form-group col-4">
                        {{ Form::label('current_password', 'Current Password') }}
                        {{ Form::password('current_password', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-4">
                        {{ Form::label('password', 'New Password') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-4">
                        {{ Form::label('password_confirmation', 'Confirm Password') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            @if (strstr($url,'change-password'))
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
            @else
                <a href="{{ url($url) }}" class="btn btn-secondary">Back</a>
            @endif
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection