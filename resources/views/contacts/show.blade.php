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
            <div class="form-row">
                <div class="form-group col-md-4">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::input('text', 'name', $contact->name, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-4">
                    {{ Form::label('nric', 'NRIC') }}
                    {{ Form::input('text', 'nric', $contact->nric, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-4">
                    {{ Form::label('race', 'Race') }}
                    {{ Form::input('text', 'race', $contact->race, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::input('text', 'address', $contact->address, ['class' => 'form-control', 'disabled' => true]) }}
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                    {{ Form::label('contact_no', 'Mobile Phone') }}
                    {{ Form::input('text', 'contact_no', $contact->contact_no, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-3">
                    {{ Form::label('home_phone', 'Home Phone') }}
                    {{ Form::input('text', 'home_phone', $contact->home_phone, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-3">
                    {{ Form::label('office_phone', 'Office phone') }}
                    {{ Form::input('text', 'office_phone', $contact->office_phone, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-3">
                    {{ Form::label('fax_phone', 'Fax Phone') }}
                    {{ Form::input('text', 'fax_phone', $contact->fax_phone, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::input('email', 'email', $contact->email, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-6">
                    {{ Form::label('image', 'Image Upload') }}
                    @if($contact->image == NULL)
                    <span class="form-control">No Image Uploaded</span>
                    @else
                    <img class="img-fluid" src="{{  asset('storage/' . $contact->image) }}" alt="Uploaded Image">
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('remark', 'Remark') }}
                    {{ Form::textarea('remark', $contact->remark, ['class' => 'form-control', 'disabled' => true, 'rows' => '3', 'cols' => '170']) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            <span>Affiliated Companies</span>
                <table id="company-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Company Name</td>
                            <td>Company Registry No</td>
                            <td>Company Address</td>
                            <td>Role</td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($contact->companies as $company)
                    <tr>
                        <td>{{$company->company_name}}</td>
                        <td>{{$company->company_no}}</td>
                        <td>{{$company->address}}</td>
                        <td>{{$company->pivot->role}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>No records.</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <span>Affiliated Users</span>
                <table id="company-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>User Name</td>
                            <td>User Email</td>
                            <td>Role</td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($contact->users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->pivot->role}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>No records.</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection