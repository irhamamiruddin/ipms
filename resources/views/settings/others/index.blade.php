@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Business Natures</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#business_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($business_natures as $business)
              <tr>
                <td>{{ $business->type }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#business_edit_{{$business->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('business.destroy',$business->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

      <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Categories of Land</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#category_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($categories_of_land as $category)
              <tr>
                <td>{{ $category->category }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#category_edit_{{$category->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('category.destroy',$category->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

      <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Consents</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#consent_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($consents as $consent)
              <tr>
                <td>{{ $consent->consent }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#consent_edit_{{$consent->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('consent.destroy',$consent->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row pt-3">
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

      <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Consultant Roles</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#role_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($consultant_roles as $role)
              <tr>
                <td>{{ $role->type }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#role_edit_{{$role->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('role.destroy',$role->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

      <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Land Acquisition Status</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#status_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($land_acquisition_status as $status)
              <tr>
                <td>{{ $status->status }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#status_edit_{{$status->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('status.destroy',$status->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Land Classifications</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#classification_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($land_classifications as $classification)
              <tr>
                <td>{{ $classification->classification }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#classification_edit_{{$classification->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('classification.destroy',$classification->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row pt-3">
<div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Library Types</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#library_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($library_types as $library)
              <tr>
                <td>{{ $library->type }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#library_edit_{{$library->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('library.destroy',$library->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Project Status</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#project_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($project_status as $status)
              <tr>
                <td>{{ $status->project_status }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#project_edit_{{$status->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('project.destroy',$status->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Type of Agreements</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#agreement_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($registered_proprietor_natures as $nature)
              <tr>
                <td>{{ $nature->nature }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#agreement_edit_{{$nature->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('agreement.destroy',$nature->id) }}"><i class="icon-directions p-1"></i></a>
                </td>
              </tr>
              @empty
                <td>No Data Available</td>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@include('settings.others.modal')

@endsection