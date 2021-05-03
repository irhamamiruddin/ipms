<div class="form-row">
    <div class="form-group col-md-5">
    <label for="user">Affiliated User</label>
    <select class="form-control">
        <option name="user" selected disabled>Select User</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    </div>
    <div class="form-group col-md-5">
    <label for="u_role">Role</label>
    <input type="text" class="form-control" name="u_role" placeholder="">
    </div>
    <div class="form-group col-md-2">
    <button id="" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
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
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>