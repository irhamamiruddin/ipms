<div class="form-row">
    <div class="form-group col">
    {{ Form::label('name', 'Name') }}
    {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true]) }}
    </div>
    <div class="form-group col">
    {{ Form::label('email', 'Email') }}
    {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'example@example.com', 'required' => true]) }}
    </div>
    <div class="form-group col-md">
    {{ Form::label('role', 'User Role') }}
    <select class="form-control" name="role">Role
        @foreach($roles as $role)
        <option 
            value="{{$role->id}}" 
            @if(isset($user) && $user_role->id == $role->id)
                selected
            @endif
            >{{$role->title}}
        </option>
        @endforeach
    </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col">
    {{ Form::label('c_password', 'Confirm Password') }}
    {{ Form::password('c_password', ['class' => 'form-control']) }}
    </div>
</div>
<div class="">
    <div class="form-group">
    {{ Form::label('status', 'Status') }}
    </div>
    <div class="form-check ml-4">
        <input class="form-check-input" type="radio" name="status" id="active" value="active" @if(isset($user) && $user->status == 'active') checked @endif>
        <label class="form-check-label" for="active">
            Active
        </label>
    </div>
    <div class="form-check ml-4">
        <input class="form-check-input" type="radio" name="status" id="not_active" value="not_active" @if(isset($user) && $user->status == 'not_active') checked @endif>
        <label class="form-check-label" for="not_active">
            Not Active
        </label>
    </div>
</div>