<div class="form-row">
    <div class="form-group col-md-11">
    <label for="consent">Consent</label>
        <select id="consent-drop" class="form-control">
            <option selected disabled>Select Consent</option>
            @foreach ($consents as $consent)
                <option 
                    value="{{ $consent->id }}"
                    data-consent="{{ $consent->consent }}"
                >
                {{ $consent->consent }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-consent" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="form-row consent-form">
    <div class="form-group col-md-6">
    {{ Form::label('sd', 'Signing Date') }}
    {{ Form::date('sd', null, ['id' => 'signing-date-consent', 'class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
    {{ Form::label('std', 'Stamping Date') }}
    {{ Form::date('std', null, ['id' => 'stamping-date-consent', 'class' => 'form-control']) }}
    </div>
</div>

<div class="form-row consent-form">
    <div class="form-group col-md-4">
    {{ Form::label('ins_no', 'Instrument No') }}
    {{ Form::input('number', 'ins_no', null, ['id' => 'instrument-no-consent', 'class' => 'form-control', 'placeholder' => '123']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('ins_reg_date', 'Instrument Registered Date') }}
    {{ Form::date('ins_reg_date', null, ['id' => 'instrument-registered-date-consent', 'class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('up', 'File Upload') }}
    {{ Form::input('file', 'up', null, ['id' => 'upload-file-consent', 'class' => 'form-control', 'accept' => 'image/*']) }}
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="consent-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Title</td>
                    <td>Signing Date</td>
                    <td>Stamping Date</td>
                    <td>Instrument No</td>
                    <td>Instrument Registered Date</td>
                </tr>
            </thead>
            <tbody id="consent">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.consent_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#consent_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('.consent-form').hide();

        $('#consent-drop').change(function(){
            $('.consent-form').show();
        });

        $('#add-consent').click(function(){
            $("#consent-table").removeAttr('hidden'); 

            var Sel = document.getElementById("consent-drop");
            var selected = Sel.options[Sel.selectedIndex];
            var selectedId = Sel.value;
            var consent = selected.getAttribute("data-consent");

            var signingdate = new Date($('#signing-date-consent').val());
            var day = signingdate.getDate();
            var month = signingdate.getMonth() + 1;
            var year = signingdate.getFullYear();
            var signingdate = year + '-' + month + '-' + day;

            var stampingdate = new Date($('#stamping-date-consent').val());
            var day = stampingdate.getDate();
            var month = stampingdate.getMonth() + 1;
            var year = stampingdate.getFullYear();
            var stampingdate = year + '-' + month + '-' + day;

            var instrumentno = document.getElementById("instrument-no-consent").value;

            var instrumentregistereddate = new Date($('#instrument-registered-date-consent').val());
            var day = instrumentregistereddate.getDate();
            var month = instrumentregistereddate.getMonth() + 1;
            var year = instrumentregistereddate.getFullYear();
            var instrumentregistereddate = year + '-' + month + '-' + day;
            
            i++;
            var addrow= "<tr id='consent_row"+i+"'>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='consent_id[]' value='"+selectedId+"'>"+consent+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='signing_date_consent[]' value='"+signingdate+"'>"+signingdate+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='stamping_date_consent[]' value='"+stampingdate+"'>"+stampingdate+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='instrument_no[]' value='"+instrumentno+"'>"+instrumentno+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='instrument_registered_date[]' value='"+instrumentregistereddate+"'>"+instrumentregistereddate+"</td>"
            addrow+="<td><a id="+i+" class='consent_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#consent").append(addrow); 

            $('.consent-form').hide();
        });
    });
</script>
@endpush