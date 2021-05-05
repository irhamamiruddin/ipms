@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

      <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Natures</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#nature_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($log_natures as $nature)
              <tr>
                <td>{{ $nature->nature }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#nature_edit_{{$nature->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('nature.destroy',$nature->id) }}"><i class="icon-directions p-1"></i></a>
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

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

        <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Level 1</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#level1_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($level_1 as $lvl1)
              <tr>
                <td>{{ $lvl1->level_1 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#lvl1_edit_{{$lvl1->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('level1.destroy',$lvl1->id) }}"><i class="icon-directions p-1"></i></a>
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
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

      <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Level 2</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#level2_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($level_2 as $lvl2)
              <tr>
                <td>{{ $lvl2->level_2 }}</td>
                <td>{{ $lvl2->level_1 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#lvl2_edit_{{$lvl2->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('level2.destroy',$lvl2->id) }}"><i class="icon-directions p-1"></i></a>
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

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body pb-0">

      <div class="row">
          <div class="col-md-8 grid-margin">
            <span class="card-title">Level 3</span>
          </div>
          <div class="col-md-4 grid-margin text-center">
            <button class="btn btn-sm btn-inverse-primary btn-rounded" data-toggle="modal" data-target="#level3_modal">Add</button>
          </div>
        </div>
        
        <div class="row">
          <div class="table-responsive">
            <table class="table text-center">
              <tbody>
              @forelse($level_3 as $lvl3)
              <tr>
                <td>{{ $lvl3->level_3 }}</td>
                <td>{{ $lvl3->level_2 }}</td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#lvl3_edit_{{$lvl3->id}}"><i class="icon-like p-1"></i></a>
                  <a href="{{ route('level3.destroy',$lvl3->id) }}"><i class="icon-directions p-1"></i></a>
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

@include('settings.logs.modal')

@endsection