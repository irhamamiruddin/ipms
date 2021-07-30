<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('contact_id', 'Consultant') }}
    {{ Form::select('contact_id', $contacts, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('role_id', 'Role') }}
    {{ Form::select('role_id', $roles, null, ['class' => 'form-control']) }}
    </div>
</div>
