<div class="form-row">
    <div class="form-group col-md-5">
        <label for="kk">Ketua Kampung (KK)</label>
        <select id="kk-drop" class="form-control">
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
    <div class="form-group col-md-6">
        <label for="kk-remark">Remarks</label>
        <input type="text" id="kk-remark" class="form-control">
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-kk" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="kk-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Ketua Kampung</td>
                    <td>Contact No.</td>
                    <td>Remarks</td>
                </tr>
            </thead>
            <tbody id="kk">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.kk_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#kk_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#add-kk').click(function(){
            $("#kk-table").removeAttr('hidden'); 

            var Sel = document.getElementById("kk-drop");
            var selected = Sel.options[Sel.selectedIndex];
            var selectedId = Sel.value;
            var selectedname = selected.getAttribute("data-name");
            var selectedcontactno = selected.getAttribute("data-contact-no");
            var selectremark = document.getElementById("kk-remark").value;

            i++;
            var addrow= "<tr id='kk_row"+i+"'>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='kk_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
            addrow+="<td>"+selectedcontactno+"</td>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='kk_remark[]' value='"+selectremark+"'>"+selectremark+"</td>"
            addrow+="<td><a id="+i+" class='kk_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#kk").append(addrow); 
        });
    });
</script>
@endpush