<div class="form-row">
    <div class="form-group col-md-11">
    <label for="land">Land</label>
        <select id="land-drop" class="form-control">
            <option selected disabled>Select Land</option>
            @foreach ($lands as $land)
                <option 
                    value="{{ $land->id }}"
                    data-land-name="{{ $land->land_description }}"
                    data-land-lot="{{ $land->lot }}"
                    data-land-block="{{ $land->block }}"
                    data-land-district="{{ $land->district }}"
                    data-land-locality="{{ $land->locality }}"
                    data-land-size="{{ $land->size }}"
                    data-land-size-unit="{{ $land->size_unit }}"
                >
                {{ $land->land_description }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-land" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="land-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Land Name</td>
                    <td>Lot</td>
                    <td>Block</td>
                    <td>District</td>
                    <td>Locality</td>
                    <td>Land Size</td>
                </tr>
            </thead>
            <tbody id="land">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.land_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#land_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#add-land').click(function(){
            $("#land-table").removeAttr('hidden'); 

            var Sel = document.getElementById("land-drop");
            var selected = Sel.options[Sel.selectedIndex];
            var selectedId = Sel.value;
            var selectedname = selected.getAttribute("data-land-name");
            var selectedlot = selected.getAttribute("data-land-lot");
            var selectedblock = selected.getAttribute("data-land-block");
            var selecteddistrict = selected.getAttribute("data-land-district");
            var selectedlocality = selected.getAttribute("data-land-locality");
            var selectedsize = selected.getAttribute("data-land-size");
            var selectedsizeunit = selected.getAttribute("data-land-size-unit");

            i++;
            var addrow= "<tr id='land_row"+i+"'>"
            addrow+="<td><input type='hidden' id='id"+i+"' name='land_id[]' value='"+selectedId+"'>"+selectedname+"</td>"
            addrow+="<td>"+selectedlot+"</td>"
            addrow+="<td>"+selectedblock+"</td>"
            addrow+="<td>"+selecteddistrict+"</td>"
            addrow+="<td>"+selectedlocality+"</td>"
            addrow+="<td>"+selectedsize+" "+selectedsizeunit+"</td>"
            addrow+="<td><a id="+i+" class='land_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#land").append(addrow); 
        });
    });
</script>
@endpush