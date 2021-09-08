@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Profile</span>
    </div>
</div>

{{ Form::model($user,['route' => ['users.update', $user->id], 'files' => true]) }}
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
                <div class="form-row">
                    <div class="form-group col">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::input('text', 'name', null, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                    <div class="form-group col">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::input('email', 'email', null, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                    {{ Form::label('image', 'Profile Picture') }} <br>
                    @if($user->image != NULL)
                    <img width="100" height="100" class="img-fluid" src="{{  asset('storage/' . $user->image) }}" alt="Uploaded Image">
                    @endif
                    {{ Form::input('file', 'image', null, ['class' => 'form-control border-0']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <a href="{{ route('users.change_password',$user->id) }}" class="btn btn-danger form-control">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection