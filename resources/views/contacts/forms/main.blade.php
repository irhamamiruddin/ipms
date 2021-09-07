<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('name', 'Name') }}
    {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true]) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('nric', 'NRIC') }}
    {{ Form::input('text', 'nric', null, ['class' => 'form-control', 'placeholder' => '111111-11-1111', 'required' => true]) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('race', 'Race') }}
    {{ Form::input('text', 'race', null, ['class' => 'form-control', 'placeholder' => 'Race', 'required' => true]) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('address', 'Address') }}
    {{ Form::input('text', 'address', null, ['class' => 'form-control', 'placeholder' => '1234 Main St', 'required' => true]) }}
</div>
<div class="form-row">
    <div class="form-group col-md-3">
    {{ Form::label('contact_no', 'Mobile Phone') }}
    {{ Form::input('text', 'contact_no', null, ['class' => 'form-control', 'placeholder' => '011-11111111', 'required' => true]) }}
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
    {{ Form::label('image', 'Image Upload') }}
    {{ Form::input('file', 'image', null, ['class' => 'form-control', 'accept' => 'image/*']) }}
    @if($contact->image != NULL)
    <img class="img-fluid" src="{{  asset('storage/' . $contact->image) }}" alt="Uploaded Image">
    @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('remark', 'Remark') }}
    {{ Form::textarea('remark', null, ['class' => 'form-control', 'placeholder' => 'Type here...', 'rows' => '3', 'cols' => '170']) }}
</div>
