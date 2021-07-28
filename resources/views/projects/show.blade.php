@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            <div class="form-row">
                <div class="form-group col-md-6">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::input('text', 'title', $project->title, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-6">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::input('text', 'address', $project->address, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        {{ Form::label('company', 'Company') }}
                        <select name="company" class="form-control" disabled>
                            <option> {{ $project->company->company_name }} </option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('project_status', 'Projet Status') }}
                        <select name="project_status" class="form-control" disabled>
                            <option>{{ $project->project_status->project_status }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <table id="oic-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Officer In Charge</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($project->officer_in_charge as $oic)
                        <tr>
                            <td>{{$oic->name}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <table id="oic-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Relief Officer In Charge</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($project->relief_officer_in_charge as $roic)
                        <tr>
                            <td>{{$roic->name}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            Land
                <table id="land-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Land Name</td>
                            <td>Lot</td>
                            <td>Block</td>
                            <td>District</td>
                            <td>Locality</td>
                            <td>Land Size</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($project->lands as $land)
                        <tr>
                            <td>{{$land->land_description}}</td>
                            <td>{{$land->lot}}</td>
                            <td>{{$land->block}}</td>
                            <td>{{$land->district}}</td>
                            <td>{{$land->locality}}</td>
                            <td>{{$land->size}} {{$land->size_unit}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            Companies
                <table id="company-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Business Nature</td>
                            <td>Company Name</td>
                            <td>Company No</td>
                            <td>Address</td>
                            <td>Phone</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($project->companies as $companies)
                        <tr>
                            <td>{{$companies->business_natures->type}}</td>
                            <td>{{$companies->company_name}}</td>
                            <td>{{$companies->company_no}}</td>
                            <td>{{$companies->address}}</td>
                            <td>{{$companies->phone}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
            Development Components
                <table id="component-table" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Component Type</td>
                            <td>Type 1</td>
                            <td>Type 2</td>
                            <td>Type 3</td>
                            <td>Unit(s)</td>
                            <td>Storey</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($project->dev_components as $dev_component)
                        <tr>
                            <td>{{$dev_component->component_type}}</td>
                            <td>{{$dev_component->type1}}</td>
                            <td>{{$dev_component->type2}}</td>
                            <td>{{$dev_component->type3}}</td>
                            <td>{{$dev_component->units}}</td>
                            <td>{{$dev_component->storeys}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Records.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection