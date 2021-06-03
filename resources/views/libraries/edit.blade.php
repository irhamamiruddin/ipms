@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Libraries</span>
    </div>
</div>

{{ Form::model($library,['route' => 'libraries.store', 'files' => true]) }}
@method('PUT')
{{ Form::hidden('id', $library->id) }}

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('libraries.forms.main')
            </div>
        </div>
        
    </div>
</div>
{{ Form::close() }}

@endsection