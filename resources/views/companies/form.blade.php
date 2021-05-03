<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('business_nature', 'Business Nature') }}
    {{ Form::select('business_nature', $business_natures, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('company_name', 'Company Name') }}
    {{ Form::input('text', 'company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name', 'required' => true]) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('company_no', 'Company No.') }}
    {{ Form::input('text', 'company_no', null, ['class' => 'form-control', 'placeholder' => 'Company No.', 'required' => true]) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('principle_name', 'Principle Name') }}
    {{ Form::input('text', 'principle_name', null, ['class' => 'form-control', 'placeholder' => 'Principle Name']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('registered_person_no', 'Registered Person No.') }}
    {{ Form::input('text', 'registered_person_no', null, ['class' => 'form-control', 'placeholder' => 'Registered Person No.']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::input('text', 'address', null, ['class' => 'form-control', 'placeholder' => '1234 Main St', 'required' => true]) }}
</div>
<div class="form-row">
    <div class="form-group col-md-3">
    {{ Form::label('phone', 'Mobile Phone') }}
    {{ Form::input('text', 'phone', null, ['class' => 'form-control', 'placeholder' => '011-11111111', 'required' => true]) }}
    </div>
    <div class="form-group col-md-3">
    {{ Form::label('home_phone', 'Home Phone') }}
    {{ Form::input('text', 'home_phone', null, ['class' => 'form-control', 'placeholder' => '111-111111']) }}
    </div>
    <div class="form-group col-md-3">
    {{ Form::label('office_phone', 'Office phone') }}
    {{ Form::input('text', 'office_phone', null, ['class' => 'form-control', 'placeholder' => '111-111111']) }}
    </div>
    <div class="form-group col-md-3">
    {{ Form::label('fax_phone', 'Fax Phone') }}
    {{ Form::input('text', 'fax_phone', null, ['class' => 'form-control', 'placeholder' => '+60 (111) 111-1111']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('email', 'Email') }}
    {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'example@example.com']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('website_url', 'Website URL') }}
    {{ Form::input('text', 'website_url', null, ['class' => 'form-control', 'placeholder' => 'www.example.com']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('banker', 'Banker') }}
    {{ Form::input('text', 'banker', null, ['class' => 'form-control', 'placeholder' => 'Banker']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('bank_ac_no', 'Bank A/C No.') }}
    {{ Form::input('text', 'bank_ac_no', null, ['class' => 'form-control', 'placeholder' => 'Bank A/C No.']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('remark', 'Remark') }}
    {{ Form::textarea('remark', null, ['class' => 'form-control', 'placeholder' => 'Type here...', 'rows' => '3', 'cols' => '170']) }}
</div>