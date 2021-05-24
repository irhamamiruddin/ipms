<div class="form-row">
    <div class="form-group col-md-11">
    <label for="agreement">Agreement</label>
        <select id="agreement-drop" class="form-control">
            <option selected disabled>Select Agreement</option>
            @foreach ($agreements as $agreement)
                <option 
                    value="{{ $agreement->id }}"
                    data-nature="{{ $agreement->nature }}"
                >
                {{ $agreement->nature }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-agreement" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="form-row agrmnt-form">
    <div class="form-group col-md-4">
    {{ Form::label('sd', 'Signing Date') }}
    {{ Form::date('sd', null, ['id' => 'signing-date', 'class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('std', 'Stamping Date') }}
    {{ Form::date('std', null, ['id' => 'stamping-date', 'class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('ed', 'Expiry Date') }}
    {{ Form::date('ed', null, ['id' => 'expiry-date', 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-row agrmnt-form">
    <div class="form-group col-md-6">
    {{ Form::label('rp', 'Reminder Period (Months)') }}
    {{ Form::input('number', 'rp', null, ['id' => 'reminder-period', 'class' => 'form-control', 'placeholder' => '0']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('rd', 'Reminder Date') }}
    {{ Form::date('rd', null, ['id' => 'reminder-date', 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-row agrmnt-form">
    <div class="form-group col-md-4">
    {{ Form::label('spp', 'S&P Price') }}
    {{ Form::input('number', 'spp', null, ['id' => 's-p-price', 'class' => 'form-control', 'placeholder' => '99.99']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('csd', 'Consideration') }}
    {{ Form::input('text', 'csd', null, ['id' => 'csd', 'class' => 'form-control', 'placeholder' => 'Consideration']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('up', 'File Upload') }}
    {{ Form::input('file', 'up', null, ['id' => 'upload-file', 'class' => 'form-control', 'accept' => 'image/*']) }}
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="agreement-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Title</td>
                    <td>Signing Date</td>
                    <td>Stamping Date</td>
                    <td>Expiry Date</td>
                    <td>Reminder Period</td>
                    <td>Reminder Date</td>
                    <td>S&P Price</td>
                    <td>Consideration</td>
                </tr>
            </thead>
            <tbody id="agreement">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.agreement_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#agreement_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('.agrmnt-form').hide();

        $('#agreement-drop').change(function(){
            $('.agrmnt-form').show();
        });

        $('#add-agreement').click(function(){
            $("#agreement-table").removeAttr('hidden'); 

            var Sel = document.getElementById("agreement-drop");
            var selected = Sel.options[Sel.selectedIndex];
            var selectedId = Sel.value;
            var nature = selected.getAttribute("data-nature");

            var signingdate = new Date($('#signing-date').val());
            var day = signingdate.getDate();
            var month = signingdate.getMonth() + 1;
            var year = signingdate.getFullYear();
            var signingdate = year + '-' + month + '-' + day;

            var stampingdate = new Date($('#stamping-date').val());
            var day = stampingdate.getDate();
            var month = stampingdate.getMonth() + 1;
            var year = stampingdate.getFullYear();
            var stampingdate = year + '-' + month + '-' + day;

            var expirydate = new Date($('#expiry-date').val());
            var day = expirydate.getDate();
            var month = expirydate.getMonth() + 1;
            var year = expirydate.getFullYear();
            var expirydate = year + '-' + month + '-' + day;

            var reminderperiod = document.getElementById("reminder-period").value;

            var reminderdate = new Date($('#reminder-date').val());
            var day = reminderdate.getDate();
            var month = reminderdate.getMonth() + 1;
            var year = reminderdate.getFullYear();
            var reminderdate =  year + '-' + month + '-' + day;

            var spprice = document.getElementById("s-p-price").value;

            var consider = document.getElementById("csd").value;

            i++;
            var addrow= "<tr id='agreement_row"+i+"'>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='agreement_id[]' value='"+selectedId+"'>"+nature+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='signing_date[]' value='"+signingdate+"'>"+signingdate+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='stamping_date[]' value='"+stampingdate+"'>"+stampingdate+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='expiry_date_agreement[]' value='"+expirydate+"'>"+expirydate+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='reminder_period[]' value='"+reminderperiod+"'>"+reminderperiod+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='reminder_date[]' value='"+reminderdate+"'>"+reminderdate+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='s_p_price[]' value='"+spprice+"'>"+spprice+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='consideration[]' value='"+consider+"'>"+consider+"</td>"
            addrow+="<td><a id="+i+" class='agreement_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#agreement").append(addrow); 

            $('.agrmnt-form').hide();
        });
    });
</script>
@endpush