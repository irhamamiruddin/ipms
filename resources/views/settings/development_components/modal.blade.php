<!-- R1 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="r1_modal" tabindex="-1" role="dialog" aria-labelledby="r1_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="r1_modal_label">Type R1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('r1.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type_r1" id="type_r1" placeholder="Enter R1">
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
@forelse($type_r1 as $r1)
<div class="modal fade" id="r1_edit_{{$r1->id}}" tabindex="-1" role="dialog" aria-labelledby="r1_edit_{{$r1->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="r1_edit_label">Type R1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('r1.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$r1->id}}">
          <input type="text" class="form-control" name="type_r1" id="type_r1" value="{{$r1->type_r1}}">
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
<!-- R1 Modal Ends-->

<!-- R2 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="r2_modal" tabindex="-1" role="dialog" aria-labelledby="r2_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="r2_modal_label">Type R2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('r2.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type_r2" id="type_r2" placeholder="Enter R2">
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
@forelse($type_r2 as $r2)
<div class="modal fade" id="r2_edit_{{$r2->id}}" tabindex="-1" role="dialog" aria-labelledby="r2_edit_{{$r2->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="r2_edit_label">Type R2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('r2.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$r2->id}}">
          <input type="text" class="form-control" name="type_r2" id="type_r2" value="{{$r2->type_r2}}">
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
<!-- R2 Modal Ends-->

<!-- R3 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="r3_modal" tabindex="-1" role="dialog" aria-labelledby="r3_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="r3_modal_label">Type R3</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('r3.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type_r3" id="type_r3" placeholder="Enter R3">
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
@forelse($type_r3 as $r3)
<div class="modal fade" id="r3_edit_{{$r3->id}}" tabindex="-1" role="dialog" aria-labelledby="r3_edit_{{$r3->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="r3_edit_label">Type R3</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('r3.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$r3->id}}">
          <input type="text" class="form-control" name="type_r3" id="type_r3" value="{{$r3->type_r3}}">
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
<!-- R3 Modal Ends-->

<!-- A1 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="a1_modal" tabindex="-1" role="dialog" aria-labelledby="a1_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="a1_modal_label">Type A1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('a1.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type_a1" id="type_a1" placeholder="Enter A1">
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
@forelse($type_a1 as $a1)
<div class="modal fade" id="a1_edit_{{$a1->id}}" tabindex="-1" role="dialog" aria-labelledby="a1_edit_{{$a1->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="a1_edit_label">Type A1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('a1.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$a1->id}}">
          <input type="text" class="form-control" name="type_a1" id="type_a1" value="{{$a1->type_a1}}">
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
<!-- A1 Modal Ends-->

<!-- C1 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="c1_modal" tabindex="-1" role="dialog" aria-labelledby="c1_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="c1_modal_label">Type C1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('c1.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type_c1" id="type_c1" placeholder="Enter C1">
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
@forelse($type_c1 as $c1)
<div class="modal fade" id="c1_edit_{{$c1->id}}" tabindex="-1" role="dialog" aria-labelledby="c1_edit_{{$c1->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="c1_edit_label">Type C1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('c1.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$c1->id}}">
          <input type="text" class="form-control" name="type_c1" id="type_c1" value="{{$c1->type_c1}}">
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
<!-- C1 Modal Ends-->

<!-- O1 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="o1_modal" tabindex="-1" role="dialog" aria-labelledby="o1_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="o1_modal_label">Type O1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('o1.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="type_o1" id="type_o1" placeholder="Enter O1">
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
@forelse($type_o1 as $o1)
<div class="modal fade" id="o1_edit_{{$o1->id}}" tabindex="-1" role="dialog" aria-labelledby="o1_edit_{{$o1->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="o1_edit_label">Type O1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('o1.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$o1->id}}">
          <input type="text" class="form-control" name="type_o1" id="type_o1" value="{{$o1->type_o1}}">
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
<!-- O1 Modal Ends-->