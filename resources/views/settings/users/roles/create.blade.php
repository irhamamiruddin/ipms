@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Add New Role</span>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body form-group">
                {{ Form::open(['route' => 'user-roles.store']) }}
                
                <label for="name">Name</label>
                {{ Form::input('text', 'name', null, ['class' => 'form-control mb-3', 'placeholder' => 'Role Name', 'required' => true]) }}
                
                <label for="name">Title</label>
                {{ Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Role Title', 'required' => true]) }}
            
            </div>
            <div class="card-header" style="background-color: lightgrey;">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <b>Permissions</b>
                            <br>
                            <small>Please tick on the permission to assign</small>
                        </h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="form-check">
                            <input type="checkbox"
                                id="selectAll" 
                                name=""
                                value=""
                                >
                                <label for=""><b style="color:black;">Select All</b></label>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="card-body form-check form-check-inline">
                @foreach($modules as $module)
                <div class="h4">{{$module}}</div>
                <div class="row pb-5">
                    @foreach($abilities as $ability)
                        @if(strpos($ability->title, $module) !== false)
                        <div class="col-3">
                            <input
                            class="d-inline"
                            type="checkbox"
                            name="abilities[]"
                            value="{{ $ability->id }}"
                            >
                            <label class="d-inline">{{ $ability->title }}</label>
                        </div>
                        @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="float-right p-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('user-roles.index') }}" class="btn btn-secondary">Cancel</a>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
$("#selectAll").click(function() {
  $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});

$("input[type=checkbox]").click(function() {
  if (!$(this).prop("checked")) {
    $("#selectAll").prop("checked", false);
  }
});
</script>
@endpush