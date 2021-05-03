<div class="form-row">
    <div class="form-group col-md-5">
    <label for="company">Affiliated Company</label>
    <select class="form-control">
        <option name="company" selected disabled>Select Company</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    </div>
    <div class="form-group col-md-5">
    <label for="c_role">Role</label>
    <input type="text" class="form-control" name="c_role" placeholder="">
    </div>
    <div class="form-group col-md-2">
    <button id="" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
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
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>