@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Edit Log</span>
    </div>
</div>
{{ Form::model($log,['route' => ['projects.logs.update', $project->id, $log->id]]) }}
@method('PUT')

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @include('projects.forms.add_log')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('projects.logs.index', $project->id) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection