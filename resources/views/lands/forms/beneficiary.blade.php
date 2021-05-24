<div class="form-row">
    <div class="form-group col-md-3">
        {{ Form::label('beneficiary_type', 'Beneficiary') }}
        {{ Form::select('beneficiary_type', $types, null, ['id' => 'beneficiary-type', 'class' => 'form-control']) }}
    </div>
    <div id="beneficiary-select-contact" class="form-group col-md-3">
        <label for="beneficiary-drop-contact">Select Contact</label>
        <select id="beneficiary-drop-contact" class="form-control">
            <option selected disabled>Select Contact</option>
            @foreach ($contacts as $contact)

                <option 
                    value="{{ $contact->id }}"
                    data-name="{{ $contact->name }}"
                    data-contact-no="{{ $contact->contact_no }}"
                >
                {{ $contact->name }} ({{ $contact->contact_no }})
                </option>
            @endforeach
        </select>
    </div>
    <div id="beneficiary-select-company" class="form-group col-md-3">
        <label for="beneficiary-drop-company">Select Company</label>
        <select id="beneficiary-drop-company" class="form-control">
            <option selected disabled>Select Company</option>
            @foreach ($companies as $company)

                <option 
                    value="{{ $company->id }}"
                    data-company-name="{{ $company->company_name }}"
                    data-company-no="{{ $company->company_no }}"
                >
                {{ $company->company_name }} ({{ $company->company_no }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="beneficiary-share">Share</label>
                <input type="number" id="beneficiary-share" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <span>/</span>
            </div>
            <div class="form-group col-md-5">
                <label for="beneficiary-share"></label>
                <input type="number" id="beneficiary-totalshare" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="beneficiary-remark">Remarks</label>
        <input type="text" id="beneficiary-remark" class="form-control">
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-beneficiary" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="beneficiary-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Type</td>
                    <td>Name</td>
                    <td>Contact/Company No.</td>
                    <td>Share</td>
                    <td>Remarks</td>
                </tr>
            </thead>
            <tbody id="beneficiary">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.beneficiary_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#beneficiary_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#beneficiary-select-company').hide();

        $('#beneficiary-type').change(function(){
            var type = document.getElementById("beneficiary-type").value;
            if (type==0) {
                $('#beneficiary-select-contact').show();
                $('#beneficiary-select-company').hide();
            }
            if (type==1) {
                $('#beneficiary-select-contact').hide();
                $('#beneficiary-select-company').show();
            }
        });

        $('#add-beneficiary').click(function(){
            $("#beneficiary-table").removeAttr('hidden');

            var type = document.getElementById("beneficiary-type").value;
            if (type==0) {
                var Sel = document.getElementById("beneficiary-drop-contact");
                var selected = Sel.options[Sel.selectedIndex];
                var selectedId = Sel.value;
                var selectedname = selected.getAttribute("data-name");
                var selectedcontactno = selected.getAttribute("data-contact-no");
                var selectshare = document.getElementById("beneficiary-share").value;
                var selecttotalshare = document.getElementById("beneficiary-totalshare").value;
                var selectremark = document.getElementById("beneficiary-remark").value;

                i++;
                var addrow= "<tr id='beneficiary_row"+i+"'>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='beneficiary_type[]' value='0'>Individual</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='beneficiary_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
                addrow+="<td>"+selectedcontactno+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='beneficiary_share[]' value='"+selectshare+"'>"+selectshare+
                        " / <input type='hidden' id='id"+i+"' name='beneficiary_totalshare[]' value='"+selecttotalshare+"'>"+selecttotalshare+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='beneficiary_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
                addrow+="<td><a id="+i+" class='beneficiary_remove'><i class='icon-directions p-1'></i></a></td>"
                addrow+="</tr>";
                $("#beneficiary").append(addrow); 
            }
            if (type==1) {
                var Sel = document.getElementById("beneficiary-drop-company");
                var selected = Sel.options[Sel.selectedIndex];
                var selectedId = Sel.value;
                var selectedname = selected.getAttribute("data-company-name");
                var selectedcompanyno = selected.getAttribute("data-company-no");
                var selectshare = document.getElementById("beneficiary-share").value;
                var selecttotalshare = document.getElementById("beneficiary-totalshare").value;
                var selectremark = document.getElementById("beneficiary-remark").value;

                i++;
                var addrow= "<tr id='beneficiary_row"+i+"'>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='beneficiary_type[]' value='1'>Company</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='beneficiary_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
                addrow+="<td>"+selectedcompanyno+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='beneficiary_share[]' value='"+selectshare+"'>"+selectshare+
                        " / <input type='hidden' id='id"+i+"' name='beneficiary_totalshare[]' value='"+selecttotalshare+"'>"+selecttotalshare+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='beneficiary_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
                addrow+="<td><a id="+i+" class='beneficiary_remove'><i class='icon-directions p-1'></i></a></td>"
                addrow+="</tr>";
                $("#beneficiary").append(addrow); 
            }
        });
    });
</script>
@endpush