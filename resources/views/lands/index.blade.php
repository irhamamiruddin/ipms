@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span class="card-title display-4">Lands</span>
        <div class="float-right">
            @can('land-export')
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('lands.export') }}">Export</a>
            @endcan
            <a class="btn btn-inverse-primary btn-fw" href="{{ route('lands.create') }}">Add Land</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                @if (Session::has('success'))
                    <div class="alert alert-success"> {{Session::get('success')}} </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger"> 
                        @foreach ($errors->all() as $message)
                            {{$message}} <br>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <table id="order-listing" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Notification</th>
                                    <th>Project</th>
                                    <th>Land Description</th>
                                    <th>Area</th>
                                    <th>Classification</th>
                                    <th>Actions</th>
                                    <th>Check Log</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($lands as $land)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="expiry_date_noty{{$land->id}}" name="expiry_date_noty" value="1" @if($land->expiry_date_noty == 1) checked @endif> Expiry <br><br>
                                        <input type="checkbox" id="annual_noty{{$land->id}}" name="annual_noty" value="1" @if($land->annual_rent_next_paid_date_noty == 1) checked @endif> Annual Rent
                                    </td>
                                    <td>@if($land->project_id == NULL) None @else {{$land->project->title}} @endif</td>
                                    <td>{{$land->land_description}}</td>
                                    <td>{{$land->locality}}</td>
                                    <td>@if($land->classification == NULL) None @else {{$land->classifications->classification}} @endif</td>
                                    <td>
                                        {{ Form::open(['url' => 'lands/' . $land->id]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{ route('lands.show',$land->id) }}" style="color: #00B400;"><i class="icon-eye p-1"></i>
                                        <a href="{{ route('lands.edit',$land->id) }}"><i class="icon-like p-1"></i>
                                        <button type="submit" style="background: none; padding: 0px; border: none; color: #FF0000;">
                                            <i class="icon-directions p-1"></i>
                                        </button>
                                        {{ Form::close() }}
                                    </td>
                                    <td><a href="{{ route('lands.logs.index',$land->id) }}" class="btn btn-inverse-primary btn-fw">Logs</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="../../../../vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('js/data-table.js') }}"></script>

<script>
@foreach($lands as $land)
    $(document).ready(function(){
        $("#expiry_date_noty{{$land->id}}").click(function(){
            if ($("#expiry_date_noty{{$land->id}}").is(":checked")) {
                    var expiry_date_noty = 1;
            } else {
                var expiry_date_noty = 0;
            }

            $.ajax({
                url: "{{ route('lands.update_exp_noty',[$land->id]) }}",
                method: 'PUT',
                data:{
                    expiry_date_noty:expiry_date_noty,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    console.log(data);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
    });
@endforeach

@foreach($lands as $land)
    $(document).ready(function(){
        $("#annual_noty{{$land->id}}").click(function(){
            if ($("#annual_noty{{$land->id}}").is(":checked")) {
                    var annual_noty = 1;
            } else {
                var annual_noty = 0;
            }

            $.ajax({
                url: "{{ route('lands.update_annual_noty',[$land->id]) }}",
                method: 'PUT',
                data:{
                    annual_noty:annual_noty,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    console.log(data);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
    });
@endforeach
</script>
@endpush