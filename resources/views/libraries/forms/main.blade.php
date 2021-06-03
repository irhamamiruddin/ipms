<div class="form-row">
    <div class="form-group col-md-4">
        <label for="project">Project</label>
        <select class="form-control" name="project">
            <option selected disabled>Select Project</option>
            @foreach ($projects as $project)
                <option 
                value = "{{ $project->id }}"
                @php
                if(isset($library)) 
                    if($project->id == $library->project_id) 
                        echo 'selected';
                @endphp
                >
                    {{ $project->title }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('name', 'Name') }}
    {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => true]) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('file', 'File Upload') }}
    {{ Form::input('file', 'file', null, ['class' => 'form-control', 'accept' => 'image/*']) }}
    </div>
    <div class="form-group col-md-4">
        <label for="project">Library Type</label>
        <select class="form-control" name="type">
            <option selected disabled>Select Type</option>
            @foreach ($types as $type)
                <option 
                value = "{{ $type->id }}"
                @php
                if(isset($library)) 
                    if($type->id == $library->type) 
                        echo 'selected';
                @endphp
                >
                    {{ $type->type }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('libraries.index') }}" class="btn btn-secondary">Cancel</a>
</div>
