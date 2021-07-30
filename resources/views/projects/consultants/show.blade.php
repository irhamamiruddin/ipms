@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <a href="{{ route('projects.consultants.index', $consultant->project_id) }}" class="btn btn-primary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    {{ Form::label('contact', 'Name') }}
                    {{ Form::text('contact', $consultant->contact->name, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-6">
                    {{ Form::label('role', 'Role') }}
                    {{ Form::text('role', $consultant->role->type, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>

                <div class="row pt-3 mb-4">
                    <div class="col-lg-12 table-responsive">
                        <table id="kap-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <td>File</td>
                                    <td>Display Name</td>
                                    <td>Approved Date</td>
                                    <td>Expiry Date</td>
                                    <td>Reminder Date</td>
                                </tr>
                            </thead>
                            <tbody id="kap">
                                @forelse($consultant->key_approved_plans as $kap)
                                <tr>
                                    <td>File uploaded</td>
                                    <td>{{$kap->display_name}}</td>
                                    <td>{{$kap->approved_date}}</td>
                                    <td>{{$kap->expiry_date}}</td>
                                    <td>{{$kap->reminder_date}}</td>
                                </tr>
                                @empty
                                <td>No plan recorded.</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection