@extends('layouts.app')
@section('content')
<div class="row">
  @if ($expiringLands != '[]')
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
              @forelse($expiringLands as $expiringland)
              <tr>
                <td><a href="{{ route('lands.show',$expiringland->id) }}">{{$expiringland->land_description}}</a></td>
                <td>{{$expiringland->expiry_date}}</td>
              </tr>
              @empty
              <tr>
              <td>No reminder</td>
              </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif

  @if ($annualRentNextPaid != '[]')
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
              @forelse($annualRentNextPaid as $nextpaid)
              <tr>
                <td><a href="{{ route('lands.show',$nextpaid->id) }}">{{$nextpaid->land_description}}</a></td>
                <td>{{$nextpaid->annual_rent_last_paid_date}}</td>
                <td>{{$nextpaid->annual_rent_next_paid_date}}</td>
              </tr>
              @empty
              <tr>
              <td>No reminder</td>
              </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif

  @if ($landLogs != '[]')
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
              @forelse($landLogs as $landlog)
              <tr>
                <td><a href="{{ route('lands.show',$landlog->land->id) }}">{{$landlog->land->land_description}}</a></td>
                <td>{{$landlog->reminder_date}}</td>
              </tr>
              @empty
              <tr>
              <td>No reminder</td>
              </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif

  @if ($expiring_kaps != '[]')
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
                @forelse($expiring_kaps as $expiring_kap)
                <tr>
                  <td><a href="{{ route('projects.show',$expiring_kap->consultant->project->id) }}">{{$expiring_kap->consultant->project->title}}</a></td>
                  <td><a href="{{ route('contacts.show',$expiring_kap->consultant->contact->id) }}">{{$expiring_kap->consultant->contact->name}}</a></td>
                  <td><a href="{{ route('projects.consultants.show',[$expiring_kap->consultant->project->id,$expiring_kap->consultant_id]) }}">{{$expiring_kap->display_name}}</a></td>
                  <td>{{$expiring_kap->reminder_date}}</td>
                  <td>{{$expiring_kap->expiry_date}}</td>
                </tr>
                @empty
                <tr>
                <td>No reminder</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif

  @if ($projectLogs != '[]')
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
              @forelse($projectLogs as $projectlog)
              <tr>
                <td><a href="{{ route('projects.show',$projectlog->project->id) }}">{{$projectlog->project->title}}</a></td>
                <td>{{$projectlog->reminder_date}}</td>
              </tr>
              @empty
              <tr>
              <td>No reminder</td>
              </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif
</div>
@endsection