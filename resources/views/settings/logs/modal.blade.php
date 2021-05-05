<!-- Log Natures Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="nature_modal" tabindex="-1" role="dialog" aria-labelledby="nature_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nature_modal_label">Log Natures</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('nature.store') }}" method="POST">
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
@forelse($log_natures as $nature)
<div class="modal fade" id="nature_edit_{{$nature->id}}" tabindex="-1" role="dialog" aria-labelledby="nature_edit_{{$nature->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nature_edit_label">Log Natures</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('nature.update') }}" method="POST">
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
<!-- Log Natures Modal Ends-->

<!-- Level 1 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="level1_modal" tabindex="-1" role="dialog" aria-labelledby="level1_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="level1_modal_label">Level 1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('level1.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="level_1" id="level_1" placeholder="Enter Level 1">
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
@forelse($level_1 as $lvl1)
<div class="modal fade" id="lvl1_edit_{{$lvl1->id}}" tabindex="-1" role="dialog" aria-labelledby="lvl1_edit_{{$lvl1->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lvl1_edit_label">Level 1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('level1.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$lvl1->id}}">
          <input type="text" class="form-control" name="level_1" id="level_1" value="{{$lvl1->level_1}}">
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
<!-- Level 1 Modal Ends-->

<!-- Level 2 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="level2_modal" tabindex="-1" role="dialog" aria-labelledby="level2_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="level2_modal_label">Level 2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('level2.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="level_2" id="level_2" placeholder="Enter Level 2">
        </div>
        <div class="form-group">
          <label for="level_1">Level 1:</label>
          <select name="level_1" class="form-control">
          @forelse($level_1 as $lvl1)
          <option value="{{ $lvl1->level_1 }}">{{ $lvl1->level_1 }}</option>
          @empty
          <option value="NULL">No Level 1 is set.</option>
          @endforelse
          </select>
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
@forelse($level_2 as $lvl2)
<div class="modal fade" id="lvl2_edit_{{$lvl2->id}}" tabindex="-1" role="dialog" aria-labelledby="lvl2_edit_{{$lvl2->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lvl2_edit_label">Level 2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('level2.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$lvl2->id}}">
          <input type="text" class="form-control" name="level_2" id="level_2" value="{{$lvl2->level_2}}">
        </div>
        <div class="form-group">
          <label for="level_1">Level 1:</label>
          <select name="level_1" class="form-control">
          @forelse($level_1 as $lvl1)
          <option value="{{ $lvl1->level_1 }}" @if($lvl1->level_1 == $lvl2->level_1) selected @endif>{{ $lvl1->level_1 }}</option>
          @empty
          <option value="NULL">No Level 1 is set.</option>
          @endforelse
          </select>
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
<!-- Level 2 Modal Ends-->

<!-- Level 3 Modal Start-->
<!-- Create Modal -->
<div class="modal fade" id="level3_modal" tabindex="-1" role="dialog" aria-labelledby="level3_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="level3_modal_label">Level 3</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('level3.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="level_3" id="level_3" placeholder="Enter Level 3">
        </div>
        <div class="form-group">
          <label for="level_2">Level 2:</label>
          <select name="level_2" class="form-control">
          @forelse($level_2 as $lvl2)
          <option value="{{ $lvl2->level_2 }}">{{ $lvl2->level_2 }}</option>
          @empty
          <option value="NULL">No Level 2 is set.</option>
          @endforelse
          </select>
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
@forelse($level_3 as $lvl3)
<div class="modal fade" id="lvl3_edit_{{$lvl3->id}}" tabindex="-1" role="dialog" aria-labelledby="lvl3_edit_{{$lvl3->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lvl3_edit_label">Level 3</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('level3.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="{{$lvl3->id}}">
          <input type="text" class="form-control" name="level_3" id="level_3" value="{{$lvl3->level_3}}">
        </div>
        <div class="form-group">
          <label for="level_2">Level 2:</label>
          <select name="level_2" class="form-control">
          @forelse($level_2 as $lvl2)
          <option value="{{ $lvl2->level_2 }}" @if($lvl2->level_2 == $lvl3->level_2) selected @endif>{{ $lvl2->level_2 }}</option>
          @empty
          <option value="NULL">No Level 2 is set.</option>
          @endforelse
          </select>
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
<!-- Level 3 Modal Ends-->