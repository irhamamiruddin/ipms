<div class="form-row">
    <div class="form-group col-md-5">
    <label for="contact-drop">Contact</label>
    <select class="form-control" id="contact-drop">
        <option selected disabled>Select Contact</option>
        @foreach ($contacts as $contact)
            <option 
                value="{{ $contact->id }}"
                data-name="{{ $contact->name }}"
                data-nric="{{ $contact->nric }}"
                data-race="{{ $contact->race }}"
                data-contact_no="{{ $contact->contact_no }}"
            >
            {{ $contact->name }} ({{$contact->contact_no}})
            </option>
        @endforeach
    </select>
    </div>
    <div class="form-group col-md-5">
    <label for="contact-role">Role</label>
    <input type="text" class="form-control" id="contact-role" placeholder="">
    </div>
    <div class="form-group col-md-2">
    <button type="button" id="add-contact" class="btn btn-sm btn-inverse-primary btn-rounded ml-5">Add Contact</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="contact-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Contact Name</td>
                    <td>Contact NRIC</td>
                    <td>Contact Race</td>
                    <td>Contact No</td>
                    <td>Role</td>
                    <td></td>
                </tr>
            </thead>
            <tbody id="contact">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#add-contact').click(function(){
            $("#contact-table").removeAttr('hidden'); 

            var cSel = document.getElementById("contact-drop");
            var selectedc = cSel.options[cSel.selectedIndex];
            var selectedId = cSel.value;
            var selectedname = selectedc.getAttribute("data-name");
            var selectednric = selectedc.getAttribute("data-nric");
            var selectedrace = selectedc.getAttribute("data-race");
            var selectedcontact_no = selectedc.getAttribute("data-contact_no");
            var selectRole = document.getElementById("contact-role").value;

            i++;
            var addrow= "<tr id='row"+i+"'>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='contact_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
            addrow+="<td>"+selectednric+"</td>"
            addrow+="<td>"+selectedrace+"</td>"
            addrow+="<td>"+selectedcontact_no+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='submitted_role[]' value='"+selectRole+"'>"+selectRole+"</td>"
            addrow+="<td><a id="+i+" class='remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#contact").append(addrow); 
        });
    });
</script>
@endpush