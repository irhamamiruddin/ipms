<div class="form-row">
    <div class="form-group col-md-3">
        {{ Form::label('proprietor_type', 'Registered Proprietor') }}
        {{ Form::select('proprietor_type', $types, null, ['id' => 'rp-type', 'class' => 'form-control']) }}
    </div>
    <div id="select-contact" class="form-group col-md-3">
        <label for="rp-drop-contact">Select Contact</label>
        <select id="rp-drop-contact" class="form-control">
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
    <div id="select-company" class="form-group col-md-3">
        <label for="rp-drop-company">Select Company</label>
        <select id="rp-drop-company" class="form-control">
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
                <label for="rp-share">Share</label>
                <input type="number" id="rp-share" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <span>/</span>
            </div>
            <div class="form-group col-md-5">
                <label for="rp-share"></label>
                <input type="number" id="rp-totalshare" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="rp-remark">Remarks</label>
        <input type="text" id="rp-remark" class="form-control">
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-rp" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="rp-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Type</td>
                    <td>Name</td>
                    <td>Contact/Company No.</td>
                    <td>Share</td>
                    <td>Remarks</td>
                </tr>
            </thead>
            <tbody id="rp">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.rp_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#rp_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#select-company').hide();

        $('#rp-type').change(function(){
            var type = document.getElementById("rp-type").value;
            if (type==0) {
                $('#select-contact').show();
                $('#select-company').hide();
            }
            if (type==1) {
                $('#select-contact').hide();
                $('#select-company').show();
            }
        });

        $('#add-rp').click(function(){
            $("#rp-table").removeAttr('hidden');

            var type = document.getElementById("rp-type").value;
            if (type==0) {
                var Sel = document.getElementById("rp-drop-contact");
                var selected = Sel.options[Sel.selectedIndex];
                var selectedId = Sel.value;
                var selectedname = selected.getAttribute("data-name");
                var selectedcontactno = selected.getAttribute("data-contact-no");
                var selectshare = document.getElementById("rp-share").value;
                var selecttotalshare = document.getElementById("rp-totalshare").value;
                var selectremark = document.getElementById("rp-remark").value;

                i++;
                var addrow= "<tr id='rp_row"+i+"'>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='rp_type[]' value='0'>Individual</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='rp_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
                addrow+="<td>"+selectedcontactno+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='rp_share[]' value='"+selectshare+"'>"+selectshare+
                        " / <input type='hidden' id='id"+i+"' name='rp_totalshare[]' value='"+selecttotalshare+"'>"+selecttotalshare+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='rp_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
                addrow+="<td><a id="+i+" class='rp_remove'><i class='icon-directions p-1'></i></a></td>"
                addrow+="</tr>";
                $("#rp").append(addrow); 
            }
            if (type==1) {
                var Sel = document.getElementById("rp-drop-company");
                var selected = Sel.options[Sel.selectedIndex];
                var selectedId = Sel.value;
                var selectedname = selected.getAttribute("data-company-name");
                var selectedcompanyno = selected.getAttribute("data-company-no");
                var selectshare = document.getElementById("rp-share").value;
                var selecttotalshare = document.getElementById("rp-totalshare").value;
                var selectremark = document.getElementById("rp-remark").value;

                i++;
                var addrow= "<tr id='rp_row"+i+"'>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='rp_type[]' value='1'>Company</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='rp_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
                addrow+="<td>"+selectedcompanyno+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='rp_share[]' value='"+selectshare+"'>"+selectshare+
                        " / <input type='hidden' id='id"+i+"' name='rp_totalshare[]' value='"+selecttotalshare+"'>"+selecttotalshare+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='rp_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
                addrow+="<td><a id="+i+" class='rp_remove'><i class='icon-directions p-1'></i></a></td>"
                addrow+="</tr>";
                $("#rp").append(addrow); 
            }
        });
    });
</script>
@endpush