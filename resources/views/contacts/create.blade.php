@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Add New Contact</span>
    </div>
</div>

{{ Form::open(['route' => 'contacts.store', 'files' => true]) }}
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
                @include('contacts.forms.main')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('contacts.forms.affiliated_company')
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('contacts.forms.affiliated_user')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection