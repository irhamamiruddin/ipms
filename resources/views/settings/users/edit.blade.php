@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Edit User</span>
    </div>
</div>

{{ Form::model($user,['route' => ['users.update', $user->id]]) }}
@method('PUT')
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
                @include('settings.users.form')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection