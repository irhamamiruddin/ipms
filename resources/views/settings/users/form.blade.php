<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('name', 'Name') }}
    {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true]) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('email', 'Email') }}
    {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'example@example.com', 'required' => true]) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('role', 'User Role') }}
    {{ Form::select('role', $roles, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('sp_role', 'Specific Role Type') }}
    {{ Form::select('sp_role', $sp_roles, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('status', 'Status') }}
    {{ Form::select('status', $status, null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('c_password', 'Confirm Password') }}
    {{ Form::password('c_password', ['class' => 'form-control']) }}
    </div>
</div>