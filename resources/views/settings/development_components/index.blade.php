@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Type R1</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#r1_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($type_r1 as $r1)
              <tr>
                <td>{{ $r1->type_r1 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#r1_edit_{{$r1->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('r1.destroy',$r1->id) }}"><i class="icon-directions p-1"></i></a>
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
            <span class="card-title">Type R2</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#r2_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($type_r2 as $r2)
              <tr>
                <td>{{ $r2->type_r2 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#r2_edit_{{$r2->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('r2.destroy',$r2->id) }}"><i class="icon-directions p-1"></i></a>
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
            <span class="card-title">Type R3</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#r3_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($type_r3 as $r3)
              <tr>
                <td>{{ $r3->type_r3 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#r3_edit_{{$r3->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('r3.destroy',$r3->id) }}"><i class="icon-directions p-1"></i></a>
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
            <span class="card-title">Type A1</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#a1_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($type_a1 as $a1)
              <tr>
                <td>{{ $a1->type_a1 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#a1_edit_{{$a1->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('a1.destroy',$a1->id) }}"><i class="icon-directions p-1"></i></a>
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
            <span class="card-title">Type C1</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#c1_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($type_c1 as $c1)
              <tr>
                <td>{{ $c1->type_c1 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#c1_edit_{{$c1->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('c1.destroy',$c1->id) }}"><i class="icon-directions p-1"></i></a>
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
            <span class="card-title">Type O1</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#o1_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($type_o1 as $o1)
              <tr>
                <td>{{ $o1->type_o1 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#o1_edit_{{$o1->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('o1.destroy',$o1->id) }}"><i class="icon-directions p-1"></i></a>
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

@include('settings.development_components.modal')

@endsection