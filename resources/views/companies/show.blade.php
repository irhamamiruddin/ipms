@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {{ Form::label('business_nature', 'Business Nature') }}
                        <select name="business_nature" class="form-control" disabled>
                            <option selected>{{ $company->business_natures->type }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    {{ Form::label('company_name', 'Company Name') }}
                    {{ Form::input('text', 'company_name', $company->company_name, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-4">
                    {{ Form::label('company_no', 'Company No.') }}
                    {{ Form::input('text', 'company_no', $company->company_no, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    {{ Form::label('principle_name', 'Principle Name') }}
                    {{ Form::input('text', 'principle_name', $company->principle_name, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-6">
                    {{ Form::label('registered_person_no', 'Registered Person No.') }}
                    {{ Form::input('text', 'registered_person_no', $company->registered_person_no, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::input('text', 'address', $company->address, ['class' => 'form-control', 'disabled' => true]) }}
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                    {{ Form::label('phone', 'Mobile Phone') }}
                    {{ Form::input('text', 'phone', $company->phone, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-3">
                    {{ Form::label('home_phone', 'Home Phone') }}
                    {{ Form::input('text', 'home_phone', $company->home_phone, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-3">
                    {{ Form::label('office_phone', 'Office phone') }}
                    {{ Form::input('text', 'office_phone', $company->office_phone, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-3">
                    {{ Form::label('fax_phone', 'Fax Phone') }}
                    {{ Form::input('text', 'fax_phone', $company->fax_phone, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::input('email', 'email', $company->email, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-6">
                    {{ Form::label('website_url', 'Website URL') }}
                    {{ Form::input('text', 'website_url', $company->website_url, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    {{ Form::label('banker', 'Banker') }}
                    {{ Form::input('text', 'banker', $company->banker, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-6">
                    {{ Form::label('bank_ac_no', 'Bank A/C No.') }}
                    {{ Form::input('text', 'bank_ac_no', $company->bank_ac_no, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('remark', 'Remark') }}
                    {{ Form::textarea('remark', $company->remark, ['class' => 'form-control', 'disabled' => true, 'rows' => '3', 'cols' => '170']) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row pt-3">
                    <div class="col-lg-12 table-responsive">
                    <span>Affiliated Users</span>
                        <table id="contact-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Contact Name</td>
                                    <td>Contact NRIC</td>
                                    <td>Contact Race</td>
                                    <td>Contact No</td>
                                    <td>Role</td>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($company->contacts as $contact)
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->nric}}</td>
                                <td>{{$contact->race}}</td>
                                <td>{{$contact->contact_no}}</td>
                                <td>{{$contact->pivot->role}}</td>
                            @empty
                                <td>No Records.</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection