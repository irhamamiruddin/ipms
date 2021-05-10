<div class="form-row">
    <div class="form-group col-md-5">
    <label for="company-drop">Affiliated Company</label>
    <select class="form-control" id="company-drop">
        <option selected disabled>Select Company</option>
        @foreach ($companies as $company)
            <option 
                value="{{ $company->id }}"
                data-company_name="{{ $company->company_name }}"
                data-company_no="{{ $company->company_no }}"
                data-address="{{ $company->address }}"
            >
            {{ $company->company_name }}
            </option>
        @endforeach
    </select>
    </div>
    <div class="form-group col-md-5">
    <label for="c_role">Role</label>
    <input type="text" class="form-control" id="c_role" placeholder="">
    </div>
    <div class="form-group col-md-2">
    <button type="button" id="add-company" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="company-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Company Name</td>
                    <td>Company Registry No</td>
                    <td>Company Address</td>
                    <td>Role</td>
                </tr>
            </thead>
            <tbody id="company">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.c_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#c_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#add-company').click(function(){
            $("#company-table").removeAttr('hidden'); 

            var cSel = document.getElementById("company-drop");
            var selectedc = cSel.options[cSel.selectedIndex];
            var selectedId = cSel.value;
            var selectedcompanyname = selectedc.getAttribute("data-company_name");
            var selectedcompanyno = selectedc.getAttribute("data-company_no");
            var selectedaddress = selectedc.getAttribute("data-address");
            var selectRole = document.getElementById("c_role").value;

            i++;
            var addrow= "<tr id='c_row"+i+"'>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='company_id[]' value='"+selectedId+"'>"+selectedcompanyname+"</td>"
            addrow+="<td>"+selectedcompanyno+"</td>"
            addrow+="<td>"+selectedaddress+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='submitted_c_role[]' value='"+selectRole+"'>"+selectRole+"</td>"
            addrow+="<td><a id="+i+" class='c_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#company").append(addrow); 
        });
    });
</script>
@endpush