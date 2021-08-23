@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <a href="{{ route('projects.consultants.index', $consultant->project_id) }}" class="btn btn-primary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    {{ Form::label('contact', 'Name') }}
                    {{ Form::text('contact', $consultant->contact->name, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-6">
                    {{ Form::label('role', 'Role') }}
                    {{ Form::text('role', $consultant->role->type, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>

                <div class="row pt-3 mb-4">
                    <div class="col-lg-12 table-responsive">
                        <table id="kap-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <td>File</td>
                                    <td>Display Name</td>
                                    <td>Approved Date</td>
                                    <td>Expiry Date</td>
                                    <td>Reminder Date</td>
                                    <td>Notification</td>
                                </tr>
                            </thead>
                            <tbody id="kap">
                                @forelse($consultant->key_approved_plans as $kap)
                                <tr>
                                    <td>
                                    @forelse($kap->files as $file)
                                    <a href="{{ route('projects.consultants.download',$file->id) }}">{{$file->filename}}</a><br>
                                    @empty
                                    No File Uploaded
                                    @endforelse
                                    </td>
                                    <td>{{$kap->display_name}}</td>
                                    <td>{{$kap->approved_date}}</td>
                                    <td>{{$kap->expiry_date}}</td>
                                    <td>{{$kap->reminder_date}}</td>
                                    <td><input type="checkbox" id="reminder_date_noty{{$kap->id}}" name="reminder_date_noty" value="1" @if($kap->reminder_date_noty == 1) checked @endif></td>
                                </tr>
                                @empty
                                <td>No plan recorded.</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection

@push('js')
<script>
    @forelse($consultant->key_approved_plans as $kap)
        $(document).ready(function(){
            $("#reminder_date_noty{{$kap->id}}").click(function(){
                if ($("#reminder_date_noty{{$kap->id}}").is(":checked")) {
                        var reminder_date_noty = 1;
                } else {
                    var reminder_date_noty = 0;
                }

                $.ajax({
                    url: "{{ route('projects.consultants.update_noty',[$consultant->project_id,$kap->id]) }}",
                    method: 'PUT',
                    data:{
                        reminder_date_noty:reminder_date_noty,
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
    @empty
    @endforelse
</script>
@endpush