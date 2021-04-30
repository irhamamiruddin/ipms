@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <h5 class="card-title">Land Reminder</h5>
        <div class="row">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <td>Land Description</td>
                  <td>Expiry Date</td>
                </tr>
              </thead>

              <tbody>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <h5 class="card-title">Land Annual Rent Reminders</h5>
        <div class="row">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <td>Land Description</td>
                  <td>Last Paid Date</td>
                  <td>Next Paid Date</td>
                </tr>
              </thead>

              <tbody>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <h5 class="card-title">Land Log Reminders</h5>
        <div class="row">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <td>Land Title</td>
                  <td>Reminder Date</td>
                </tr>
              </thead>

              <tbody>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <h5 class="card-title">Project Consultant Key Approved Plan Reminders</h5>
        <div class="row">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <td>Project</td>
                  <td>Consultant</td>
                  <td>Key Approved Plan</td>
                  <td>Reminder Date</td>
                  <td>Expiry Date</td>
                </tr>
              </thead>

              <tbody>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <h5 class="card-title">Project Log Reminders</h5>
        <div class="row">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <td>Project</td>
                  <td>Reminder Date</td>
                </tr>
              </thead>

              <tbody>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection