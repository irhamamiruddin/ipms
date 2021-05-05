<!-- Business Natures Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="business_modal" tabindex="-1" role="dialog" aria-labelledby="business_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="business_modal_label">Business Nature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('business.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type" id="type" placeholder="Enter Business Nature">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($business_natures as $business)
<div class="modal fade" id="business_edit_{{$business->id}}" tabindex="-1" role="dialog" aria-labelledby="business_edit_{{$business->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="business_edit_label">Business Nature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('business.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$business->id}}">
          <input type="text" class="form-control" name="type" id="type" value="{{$business->type}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Business Natures Modal Ends-->

<!-- Categories of Land Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="category_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="category_modal_label">Categories of Land</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('category.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="category" id="category" placeholder="Enter Categories of Land">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($categories_of_land as $category)
<div class="modal fade" id="category_edit_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="category_edit_{{$category->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="category_edit_label">Categories of Land</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('category.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$category->id}}">
          <input type="text" class="form-control" name="category" id="category" value="{{$category->category}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Categories of Land Modal Ends-->

<!-- Consents Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="consent_modal" tabindex="-1" role="dialog" aria-labelledby="consent_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consent_modal_label">Consent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('consent.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="consent" id="consent" placeholder="Enter Consent">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($consents as $consent)
<div class="modal fade" id="consent_edit_{{$consent->id}}" tabindex="-1" role="dialog" aria-labelledby="consent_edit_{{$consent->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consent_edit_label">Consent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('consent.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$consent->id}}">
          <input type="text" class="form-control" name="consent" id="consent" value="{{$consent->consent}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Consents Modal Ends-->

<!-- Consultant Roles Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="role_modal" tabindex="-1" role="dialog" aria-labelledby="role_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="role_modal_label">Consulant Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('role.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type" id="type" placeholder="Enter Consulant Role">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($consultant_roles as $role)
<div class="modal fade" id="role_edit_{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="role_edit_{{$role->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="role_edit_label">Consulant Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('role.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$role->id}}">
          <input type="text" class="form-control" name="type" id="type" value="{{$role->type}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Consultant Roles Modal Ends-->

<!-- Land Acquisition Status Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="status_modal" tabindex="-1" role="dialog" aria-labelledby="status_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="status_modal_label">Land Acquisition Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('status.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="status" id="status" placeholder="Enter Status">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($land_acquisition_status as $status)
<div class="modal fade" id="status_edit_{{$status->id}}" tabindex="-1" role="dialog" aria-labelledby="status_edit_{{$status->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="status_edit_label">Land Acquisition Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('status.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$status->id}}">
          <input type="text" class="form-control" name="status" id="status" value="{{$status->status}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Land Acquisition Status Modal Ends-->

<!-- Land Classification Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="classification_modal" tabindex="-1" role="dialog" aria-labelledby="classification_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="classification_modal_label">Land Classification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('classification.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="classification" id="classification" placeholder="Enter Classification">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($land_classifications as $classification)
<div class="modal fade" id="classification_edit_{{$classification->id}}" tabindex="-1" role="dialog" aria-labelledby="classification_edit_{{$classification->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="classification_edit_label">Land Classification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('classification.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$classification->id}}">
          <input type="text" class="form-control" name="classification" id="classification" value="{{$classification->classification}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Land Classification Modal Ends-->

<!-- Library Types Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="library_modal" tabindex="-1" role="dialog" aria-labelledby="library_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="library_modal_label">Library Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('library.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type" id="type" placeholder="Enter Library Type">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($library_types as $library)
<div class="modal fade" id="library_edit_{{$library->id}}" tabindex="-1" role="dialog" aria-labelledby="library_edit_{{$library->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="library_edit_label">Library Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('library.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$library->id}}">
          <input type="text" class="form-control" name="type" id="type" value="{{$library->type}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Library Types Modal Ends-->

<!-- Project Status Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="project_modal" tabindex="-1" role="dialog" aria-labelledby="project_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="project_modal_label">Project Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('project.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="status" id="status" placeholder="Enter Status">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($project_status as $status)
<div class="modal fade" id="project_edit_{{$status->id}}" tabindex="-1" role="dialog" aria-labelledby="project_edit_{{$status->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="project_edit_label">Project Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('project.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$status->id}}">
          <input type="text" class="form-control" name="status" id="status" value="{{$status->project_status}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Project Status Modal Ends-->

<!-- Type of Agreement Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="agreement_modal" tabindex="-1" role="dialog" aria-labelledby="agreement_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agreement_modal_label">Type of Agreement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('agreement.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="nature" id="nature" placeholder="Enter Nature">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal Ends-->
<!-- Edit Modal -->
@forelse($registered_proprietor_natures as $nature)
<div class="modal fade" id="agreement_edit_{{$nature->id}}" tabindex="-1" role="dialog" aria-labelledby="agreement_edit_{{$nature->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agreement_edit_label">Type of Agreement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('agreement.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$nature->id}}">
          <input type="text" class="form-control" name="nature" id="nature" value="{{$nature->nature}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
@empty
@endforelse
<!-- Edit Modal Ends-->
<!-- Type of Agreement Modal Ends-->