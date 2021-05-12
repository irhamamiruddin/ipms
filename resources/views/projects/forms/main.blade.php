<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('title', 'Title') }}
    {{ Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'required' => true]) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('address', 'Address') }}
    {{ Form::input('text', 'address', null, ['class' => 'form-control', 'placeholder' => '1234 Main St', 'required' => true]) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('company', 'Company') }}
        <select name="company" class="form-control">
        @foreach ($companies as $company)
            <option 
                value="{{ $company->id }}"
                @php
                if(isset($project)) 
                    if($company->id == $project->company->id) 
                        echo 'selected';
                @endphp
            >
            {{ $company->company_name }}
            </option>
        @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('project_status', 'Projet Status') }}
        <select name="project_status" class="form-control">
        @foreach ($project_status as $key => $value)
            <option 
                value="{{ $key }}" 
                @php
                if(isset($project)) 
                    if($key == $project->project_status->id) 
                        echo 'selected';
                @endphp
            >
            {{ $value }}
            </option>
        @endforeach
        </select>
    </div>
</div>

