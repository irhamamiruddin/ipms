<div class="form-row">
    <div class="form-group col-md-5">
    <label for="user">Affiliated User</label>
    <select class="form-control" id="user-drop">
        <option selected disabled>Select User</option>
        @foreach ($users as $user)
            <option 
                value="{{ $user->id }}"
                data-user-name="{{ $user->name }}"
                data-user-email="{{ $user->email }}"
            >
            {{ $user->name }}
            </option>
        @endforeach
    </select>
    </div>
    <div class="form-group col-md-5">
    <label for="u_role">Role</label>
    <input type="text" class="form-control" id="u_role" placeholder="">
    </div>
    <div class="form-group col-md-2">
    <button type="button" id="add-user" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="user-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>User Name</td>
                    <td>User Email</td>
                    <td>Role</td>
                </tr>
            </thead>
            <tbody id="user">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var j = 0;
    $(document).on('click', '.u_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#u_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#add-user').click(function(){
            $("#user-table").removeAttr('hidden'); 

            var uSel = document.getElementById("user-drop");
            var selectedu = uSel.options[uSel.selectedIndex];
            var selectedIdu = uSel.value;
            var selectedusername = selectedu.getAttribute("data-user-name");
            var selecteduseremail = selectedu.getAttribute("data-user-email");
            var selectRoleu = document.getElementById("u_role").value;

            j++;
            var addrow= "<tr id='u_row"+j+"'>"
            addrow+="<td><input type='hidden' id='id"+j+"' name='user_id[]' value='"+selectedIdu+"'>"+selectedusername+"</td>"
            addrow+="<td>"+selecteduseremail+"</td>"
            addrow+="<td><input type='hidden' id='id"+j+"' name='submitted_u_role[]' value='"+selectRoleu+"'>"+selectRoleu+"</td>"
            addrow+="<td><a id="+j+" class='u_remove'><i class='icon-directions p-1'></i></a></td>"
            addrow+="</tr>";
            $("#user").append(addrow); 
        });
    });
</script>
@endpush