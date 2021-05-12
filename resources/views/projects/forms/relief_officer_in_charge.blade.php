<div class="form-row">
    <div class="form-group col-md-10">
    <label for="roic">Relief Officer In Charge</label>
        <select id="roic-drop" class="form-control">
            <option selected disabled>Select User</option>
            @foreach ($officers as $officer)
                <option 
                    value="{{ $officer->id }}"
                    data-roic-name="{{ $officer->name }}"
                >
                {{ $officer->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
    <button type="button" id="add-roic" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="roic-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Relief Officer In Charge</td>
                    <td></td>
                </tr>
            </thead>
            <tbody id="roic">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.roic_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#roic_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#add-roic').click(function(){
            $("#roic-table").removeAttr('hidden'); 

            var Sel = document.getElementById("roic-drop");
            var selected = Sel.options[Sel.selectedIndex];
            var selectedId = Sel.value;
            var selectedname = selected.getAttribute("data-roic-name");

            i++;
            var addrow= "<tr id='roic_row"+i+"'>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='roic_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
            addrow+="<td><a id="+i+" class='roic_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#roic").append(addrow); 
        });
    });
</script>
@endpush