<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('land_description', 'Land Description') }}
    {{ Form::input('text', 'land_description', null, ['class' => 'form-control', 'placeholder' => 'Land Description', 'required' => true]) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('field_lot', 'Field Lot') }}
    {{ Form::input('number', 'field_lot', null, ['class' => 'form-control', 'placeholder' => '0']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('lot', 'Lot') }}
    {{ Form::input('number', 'lot', null, ['class' => 'form-control', 'placeholder' => '0']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('block', 'Block') }}
    {{ Form::input('number', 'block', null, ['class' => 'form-control', 'placeholder' => '0']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('district', 'District') }}
    {{ Form::input('text', 'district', null, ['class' => 'form-control', 'placeholder' => 'District', 'required' => true]) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('locality', 'Locality') }}
    {{ Form::input('text', 'locality', null, ['class' => 'form-control', 'placeholder' => 'Locality', 'required' => true]) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-2">
    {{ Form::label('gps_land_size', 'GPS Land Size') }}
    {{ Form::input('number', 'gps_land_size', null, ['class' => 'form-control', 'step' => '0.01', 'required' => true, 'placeholder' => '0']) }}
    </div>
    <div class="form-group col-md-2">
    {{ Form::label('gps_land_size_unit', 'Unit') }}
    {{ Form::select('gps_land_size_unit', $units, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-2">
    {{ Form::label('size', 'Title Land Size') }}
    {{ Form::input('number', 'size', null, ['class' => 'form-control', 'step' => '0.01', 'required' => true, 'placeholder' => '0']) }}
    </div>
    <div class="form-group col-md-2">
    {{ Form::label('size_unit', 'Unit') }}
    {{ Form::select('size_unit', $units, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('classification', 'Classification') }}
    {{ Form::select('classification', $classifications, null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('term', 'Term') }}
    {{ Form::input('number', 'term', null, ['class' => 'form-control', 'placeholder' => '0']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('commencement_date', 'Commencement Date') }}
    {{ Form::date('commencement_date', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('expiry_date', 'Expiry Date') }}
    {{ Form::date('expiry_date', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('image', 'Upload Files') }}
    {{ Form::input('file', 'image', null, ['class' => 'form-control', 'accept' => 'image/*']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('date_of_registration', 'Date of Registration') }}
    {{ Form::date('date_of_registration', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('annual_rent', 'Annual Rent') }}
    {{ Form::input('number', 'annual_rent', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => '0']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('land_acquisition_status_id', 'Land Acquisition Status') }}
    {{ Form::select('land_acquisition_status_id', $land_acquisition_status, null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('division', 'Division') }}
    {{ Form::input('text', 'division', null, ['class' => 'form-control', 'placeholder' => 'Division', 'required' => true]) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('categories_of_land_id', 'Categories of Land') }}
    {{ Form::select('categories_of_land_id', $categories_of_land, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('special_condition', 'Special Condition') }}
    {{ Form::input('text', 'special_condition', null, ['class' => 'form-control', 'placeholder' => 'Special Condition']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('annual_rent_last_paid_date', 'Annual Rent Last Paid Date') }}
    {{ Form::date('annual_rent_last_paid_date', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('annual_rent_next_paid_date', 'Annual Rent Next Paid Date') }}
    {{ Form::date('annual_rent_next_paid_date', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('remark', 'Remark') }}
    {{ Form::textarea('remark', null, ['class' => 'form-control', 'placeholder' => 'Type here...', 'rows' => '3', 'cols' => '170']) }}
</div>