<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('land_description', 'Land Description') }}
    @if ($disable)
    {{ Form::input('text', 'land_description', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('text', 'land_description', null, ['class' => 'form-control', 'placeholder' => 'Land Description', 'required' => true]) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('field_lot', 'Field Lot') }}
    @if ($disable)
    {{ Form::input('number', 'field_lot', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('number', 'field_lot', null, ['class' => 'form-control', 'placeholder' => '0']) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('lot', 'Lot') }}
    @if ($disable)
    {{ Form::input('number', 'lot', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('number', 'lot', null, ['class' => 'form-control', 'placeholder' => '0']) }}
    @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('block', 'Block') }}
    @if ($disable)
    {{ Form::input('number', 'block', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('number', 'block', null, ['class' => 'form-control', 'placeholder' => '0']) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('district', 'District') }}
    @if ($disable)
    {{ Form::input('text', 'district', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('text', 'district', null, ['class' => 'form-control', 'placeholder' => 'District', 'required' => true]) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('locality', 'Locality') }}
    @if ($disable)
    {{ Form::input('text', 'locality', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('text', 'locality', null, ['class' => 'form-control', 'placeholder' => 'Locality', 'required' => true]) }}
    @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-2">
    {{ Form::label('gps_land_size', 'GPS Land Size') }}
    @if ($disable)
    {{ Form::input('number', 'gps_land_size', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('number', 'gps_land_size', null, ['class' => 'form-control', 'step' => '0.01', 'required' => true, 'placeholder' => '0']) }}
    @endif
    </div>
    <div class="form-group col-md-2">
    {{ Form::label('gps_land_size_unit', 'Unit') }}
    @if ($disable)
    {{ Form::select('gps_land_size_unit', $units, null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::select('gps_land_size_unit', $units, null, ['class' => 'form-control']) }}
    @endif
    </div>
    <div class="form-group col-md-2">
    {{ Form::label('size', 'Title Land Size') }}
    @if ($disable)
    {{ Form::input('number', 'size', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('number', 'size', null, ['class' => 'form-control', 'step' => '0.01', 'required' => true, 'placeholder' => '0']) }}
    @endif
    </div>
    <div class="form-group col-md-2">
    {{ Form::label('size_unit', 'Unit') }}
    @if ($disable)
    {{ Form::select('size_unit', $units, null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::select('size_unit', $units, null, ['class' => 'form-control']) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('classification', 'Classification') }}
    @if ($disable)
    {{ Form::select('classification', $classifications, null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::select('classification', $classifications, null, ['class' => 'form-control']) }}
    @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('term', 'Term') }}
    @if ($disable)
    {{ Form::input('number', 'term', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('number', 'term', null, ['class' => 'form-control', 'placeholder' => '0']) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('commencement_date', 'Commencement Date') }}
    @if ($disable)
    {{ Form::date('commencement_date', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::date('commencement_date', null, ['class' => 'form-control']) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('expiry_date', 'Expiry Date') }}
    @if ($disable)
    {{ Form::date('expiry_date', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::date('expiry_date', null, ['class' => 'form-control']) }}
    @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    @if ($disable)
    {{ Form::label('file', 'Uploaded Files') }}
    <div id="uploaded"></div>
    @else
    {{ Form::label('file', 'Upload Files') }}
    {{ Form::input('file', 'file', null, ['class' => 'form-control']) }}
    @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('date_of_registration', 'Date of Registration') }}
    @if ($disable)
    {{ Form::date('date_of_registration', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::date('date_of_registration', null, ['class' => 'form-control']) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('annual_rent', 'Annual Rent') }}
    @if ($disable)
    {{ Form::input('number', 'annual_rent', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('number', 'annual_rent', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => '0']) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('land_acquisition_status_id', 'Land Acquisition Status') }}
    @if ($disable)
    {{ Form::select('land_acquisition_status_id', $land_acquisition_status, null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::select('land_acquisition_status_id', $land_acquisition_status, null, ['class' => 'form-control']) }}
    @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('division', 'Division') }}
    @if ($disable)
    {{ Form::input('text', 'division', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('text', 'division', null, ['class' => 'form-control', 'placeholder' => 'Division', 'required' => true]) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('categories_of_land_id', 'Categories of Land') }}
    @if ($disable)
    {{ Form::select('categories_of_land_id', $categories_of_land, null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::select('categories_of_land_id', $categories_of_land, null, ['class' => 'form-control']) }}
    @endif
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('special_condition', 'Special Condition') }}
    @if ($disable)
    {{ Form::input('text', 'special_condition', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::input('text', 'special_condition', null, ['class' => 'form-control', 'placeholder' => 'Special Condition']) }}
    @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('annual_rent_last_paid_date', 'Annual Rent Last Paid Date') }}
    @if ($disable)
    {{ Form::date('annual_rent_last_paid_date', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::date('annual_rent_last_paid_date', null, ['class' => 'form-control']) }}
    @endif
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('annual_rent_next_paid_date', 'Annual Rent Next Paid Date') }}
    @if ($disable)
    {{ Form::date('annual_rent_next_paid_date', null, ['class' => 'form-control', 'disabled' => 'true']) }}
    @else
    {{ Form::date('annual_rent_next_paid_date', null, ['class' => 'form-control']) }}
    @endif
    </div>
</div>

<div class="form-group">
    {{ Form::label('remark', 'Remark') }}
    @if ($disable)
    {{ Form::textarea('remark', null, ['class' => 'form-control', 'disabled' => 'true', 'rows' => '3', 'cols' => '170']) }}
    @else
    {{ Form::textarea('remark', null, ['class' => 'form-control', 'placeholder' => 'Type here...', 'rows' => '3', 'cols' => '170']) }}
    @endif
</div>