<div class="form-row">
    <div class="form-group col-md-3">
        {{ Form::label('nominee_type', 'Nominee') }}
        {{ Form::select('nominee_type', $types, null, ['id' => 'nominee-type', 'class' => 'form-control']) }}
    </div>
    <div id="nominee-select-contact" class="form-group col-md-3">
        <label for="nominee-drop-contact">Select Contact</label>
        <select id="nominee-drop-contact" class="form-control">
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
    <div id="nominee-select-company" class="form-group col-md-3">
        <label for="nominee-drop-company">Select Company</label>
        <select id="nominee-drop-company" class="form-control">
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
                <label for="nominee-share">Share</label>
                <input type="number" id="nominee-share" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <span>/</span>
            </div>
            <div class="form-group col-md-5">
                <label for="nominee-share"></label>
                <input type="number" id="nominee-totalshare" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="nominee-remark">Remarks</label>
        <input type="text" id="nominee-remark" class="form-control">
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-nominee" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="nominee-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Type</td>
                    <td>Name</td>
                    <td>Contact/Company No.</td>
                    <td>Share</td>
                    <td>Remarks</td>
                </tr>
            </thead>
            <tbody id="nominee">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.nominee_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#nominee_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#nominee-select-company').hide();

        $('#nominee-type').change(function(){
            var type = document.getElementById("nominee-type").value;
            if (type==0) {
                $('#nominee-select-contact').show();
                $('#nominee-select-company').hide();
            }
            if (type==1) {
                $('#nominee-select-contact').hide();
                $('#nominee-select-company').show();
            }
        });

        $('#add-nominee').click(function(){
            $("#nominee-table").removeAttr('hidden');

            var type = document.getElementById("nominee-type").value;
            if (type==0) {
                var Sel = document.getElementById("nominee-drop-contact");
                var selected = Sel.options[Sel.selectedIndex];
                var selectedId = Sel.value;
                var selectedname = selected.getAttribute("data-name");
                var selectedcontactno = selected.getAttribute("data-contact-no");
                var selectshare = document.getElementById("nominee-share").value;
                var selecttotalshare = document.getElementById("nominee-totalshare").value;
                var selectremark = document.getElementById("nominee-remark").value;

                i++;
                var addrow= "<tr id='nominee_row"+i+"'>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='nominee_type[]' value='0'>Individual</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='nominee_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
                addrow+="<td>"+selectedcontactno+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='nominee_share[]' value='"+selectshare+"'>"+selectshare+
                        " / <input type='hidden' id='id"+i+"' name='nominee_totalshare[]' value='"+selecttotalshare+"'>"+selecttotalshare+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='nominee_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
                addrow+="<td><a id="+i+" class='nominee_remove'><i class='icon-directions p-1'></i></a></td>"
                addrow+="</tr>";
                $("#nominee").append(addrow); 
            }
            if (type==1) {
                var Sel = document.getElementById("nominee-drop-company");
                var selected = Sel.options[Sel.selectedIndex];
                var selectedId = Sel.value;
                var selectedname = selected.getAttribute("data-company-name");
                var selectedcompanyno = selected.getAttribute("data-company-no");
                var selectshare = document.getElementById("nominee-share").value;
                var selecttotalshare = document.getElementById("nominee-totalshare").value;
                var selectremark = document.getElementById("nominee-remark").value;

                i++;
                var addrow= "<tr id='nominee_row"+i+"'>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='nominee_type[]' value='1'>Company</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='nominee_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
                addrow+="<td>"+selectedcompanyno+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='nominee_share[]' value='"+selectshare+"'>"+selectshare+
                        " / <input type='hidden' id='id"+i+"' name='nominee_totalshare[]' value='"+selecttotalshare+"'>"+selecttotalshare+"</td>"
                addrow+="<td><input type='hidden' id='id"+i+"' name='nominee_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
                addrow+="<td><a id="+i+" class='nominee_remove'><i class='icon-directions p-1'></i></a></td>"
                addrow+="</tr>";
                $("#nominee").append(addrow); 
            }
        });
    });
</script>
@endpush