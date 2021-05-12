<div class="form-row">
    <div class="form-group col-md-10">
    <label for="oic">Officer In Charge</label>
        <select id="oic-drop" class="form-control">
            <option selected disabled>Select User</option>
            @foreach ($officers as $officer)
                <option 
                    value="{{ $officer->id }}"
                    data-oic-name="{{ $officer->name }}"
                >
                {{ $officer->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
    <button type="button" id="add-oic" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="oic-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Officer In Charge</td>
                    <td></td>
                </tr>
            </thead>
            <tbody id="oic">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.oic_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#oic_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#add-oic').click(function(){
            $("#oic-table").removeAttr('hidden'); 

            var Sel = document.getElementById("oic-drop");
            var selected = Sel.options[Sel.selectedIndex];
            var selectedId = Sel.value;
            var selectedname = selected.getAttribute("data-oic-name");

            i++;
            var addrow= "<tr id='oic_row"+i+"'>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='oic_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
            addrow+="<td><a id="+i+" class='oic_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#oic").append(addrow); 
        });
    });
</script>
@endpush