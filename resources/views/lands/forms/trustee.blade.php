<div class="form-row">
    <div class="form-group col-md-3">
        {{ Form::label('trustee_type', 'Trustee') }}
        {{ Form::select('trustee_type', $types, null, ['id' => 'trustee-type', 'class' => 'form-control']) }}
    </div>
    <div id="trustee-select-contact" class="form-group col-md-3">
        <label for="trustee-drop-contact">Select Contact</label>
        <select id="trustee-drop-contact" class="form-control">
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
    <div id="trustee-select-company" class="form-group col-md-3">
        <label for="trustee-drop-company">Select Company</label>
        <select id="trustee-drop-company" class="form-control">
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
                <label for="trustee-share">Share</label>
                <input type="number" id="trustee-share" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <span>/</span>
            </div>
            <div class="form-group col-md-5">
                <label for="trustee-share"></label>
                <input type="number" id="trustee-totalshare" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="trustee-remark">Remarks</label>
        <input type="text" id="trustee-remark" class="form-control">
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-trustee" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="trustee-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Type</td>
                    <td>Name</td>
                    <td>Contact/Company No.</td>
                    <td>Share</td>
                    <td>Remarks</td>
                </tr>
            </thead>
            <tbody id="trustee">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.trustee_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#trustee_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#trustee-select-company').hide();

        $('#trustee-type').change(function(){
            var type = document.getElementById("trustee-type").value;
            if (type==0) {
                $('#trustee-select-contact').show();
                $('#trustee-select-company').hide();
            }
            if (type==1) {
                $('#trustee-select-contact').hide();
                $('#trustee-select-company').show();
            }
        });

        $('#add-trustee').click(function(){
            $("#trustee-table").removeAttr('hidden');

            var type = document.getElementById("trustee-type").value;
            if (type==0) {
                var Sel = document.getElementById("trustee-drop-contact");
                var selected = Sel.options[Sel.selectedIndex];
                var selectedId = Sel.value;
                var selectedname = selected.getAttribute("data-name");
                var selectedcontactno = selected.getAttribute("data-contact-no");
                var selectshare = document.getElementById("trustee-share").value;
                var selecttotalshare = document.getElementById("trustee-totalshare").value;
                var selectremark = document.getElementById("trustee-remark").value;

                i++;
                var addrow= "<tr id='trustee_row"+i+"'>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='trustee_type[]' value='0'>Individual</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='trustee_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
                addrow+="<td>"+selectedcontactno+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='trustee_share[]' value='"+selectshare+"'>"+selectshare+
                        " / <input type='hidden' id='id"+i+"' name='trustee_totalshare[]' value='"+selecttotalshare+"'>"+selecttotalshare+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='trustee_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
                addrow+="<td><a id="+i+" class='trustee_remove'><i class='icon-directions p-1'></i></a></td>"
                addrow+="</tr>";
                $("#trustee").append(addrow); 
            }
            if (type==1) {
                var Sel = document.getElementById("trustee-drop-company");
                var selected = Sel.options[Sel.selectedIndex];
                var selectedId = Sel.value;
                var selectedname = selected.getAttribute("data-company-name");
                var selectedcompanyno = selected.getAttribute("data-company-no");
                var selectshare = document.getElementById("trustee-share").value;
                var selecttotalshare = document.getElementById("trustee-totalshare").value;
                var selectremark = document.getElementById("trustee-remark").value;

                i++;
                var addrow= "<tr id='trustee_row"+i+"'>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='trustee_type[]' value='1'>Company</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='trustee_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
                addrow+="<td>"+selectedcompanyno+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='trustee_share[]' value='"+selectshare+"'>"+selectshare+
                        " / <input type='hidden' id='id"+i+"' name='trustee_totalshare[]' value='"+selecttotalshare+"'>"+selecttotalshare+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='trustee_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
                addrow+="<td><a id="+i+" class='trustee_remove'><i class='icon-directions p-1'></i></a></td>"
                addrow+="</tr>";
                $("#trustee").append(addrow); 
            }
        });
    });
</script>
@endpush