@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <a href="{{ route('lands.logs.index', $log->land_id) }}" class="btn btn-primary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body pb-0">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {{ Form::label('nature', 'Nature') }}
                        <select name="nature" class="form-control" disabled>
                            @foreach ($natures as $nature)
                                <option
                                    @if ($log->nature == $nature->nature)
                                    selected
                                    @endif
                                >
                                {{ $nature->nature }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    {{ Form::label('log_date', 'Date') }}
                    {{ Form::date('log_date', $log->log_date, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group col-md-4">
                    {{ Form::label('reminder_date', 'Reminder Date') }}
                    {{ Form::date('reminder_date', $log->reminder_date, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                    {{ Form::label('level_1', 'Level 1') }}
                        <select name="level_1" class="form-control" disabled>
                            @foreach ($level_1 as $l1)
                                <option
                                    @if ($log->level_1 == $l1->level_1)
                                    selected
                                    @endif
                                >
                                {{ $l1->level_1 }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    {{ Form::label('level_2', 'Level 2') }}
                        <select name="level_2" class="form-control" disabled>
                            @foreach ($level_2 as $l2)
                                <option
                                    @if ($log->level_2 == $l2->level_2)
                                    selected
                                    @endif
                                >
                                {{ $l2->level_2 }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    {{ Form::label('level_3', 'Level 3') }}
                        <select name="level_3" class="form-control" disabled>
                            @foreach ($level_3 as $l3)
                                <option
                                    @if ($log->level_3 == $l3->level_3)
                                    selected
                                    @endif
                                >
                                {{ $l3->level_3 }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('log_desc', 'Description') }}
                    {{ Form::textarea('log_desc', $log->log_desc, ['class' => 'form-control', 'disabled' => true, 'rows' => '3', 'cols' => '170']) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection