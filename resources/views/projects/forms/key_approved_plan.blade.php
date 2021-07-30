<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('upload', 'Upload Files') }}
    {{ Form::input('file', 'upload', null, ['class' => 'form-control', 'accept' => 'image/*']) }}
    </div>
    <div class="form-group col-md-3">
    {{ Form::label('display_name', 'Display Name') }}
    {{ Form::text('display_name', null, ['class' => 'form-control', 'id' => 'display_name']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('approved_date', 'Approved Date') }}
    {{ Form::date('approved_date', null, ['class' => 'form-control', 'id' => 'approved_date']) }}
    </div>
    <div class="form-group col-md-1">
        <button type="button" id="add-kap" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
    {{ Form::label('expiry_date', 'Expiry Date') }}
    {{ Form::date('expiry_date', null, ['class' => 'form-control', 'id' => 'expiry_date']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('reminder_date', 'Reminder Date') }}
    {{ Form::date('reminder_date', null, ['class' => 'form-control', 'id' => 'reminder_date']) }}
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="kap-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>File</td>
                    <td>Display Name</td>
                    <td>Approved Date</td>
                    <td>Expiry Date</td>
                    <td>Reminder Date</td>
                </tr>
            </thead>
            <tbody id="kap">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.kap_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#kap_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#add-kap').click(function(){
            $("#kap-table").removeAttr('hidden'); 

            var display_name = document.getElementById("display_name").value;
            var approved_date = document.getElementById("approved_date").value;
            var expiry_date = document.getElementById("expiry_date").value;
            var reminder_date = document.getElementById("reminder_date").value;

            i++;
            var addrow= "<tr id='kap_row"+i+"'>"
            addrow+="<td> File Name </td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='kap_display_name[]' value='"+display_name+"'>"+display_name+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='kap_approved_date[]' value='"+approved_date+"'>"+approved_date+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='kap_expiry_date[]' value='"+expiry_date+"'>"+expiry_date+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='kap_reminder_date[]' value='"+reminder_date+"'>"+reminder_date+"</td>"
            addrow+="<td><a id="+i+" class='kap_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#kap").append(addrow); 
        });
    });
</script>
@endpush
