<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('nature', 'Nature') }}
    {{ Form::select('nature', $nature, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('date', 'Date') }}
    {{ Form::date('date', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('reminder_date', 'Reminder Date') }}
    {{ Form::date('reminder_date', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
    {{ Form::label('level_1', 'Level 1') }}
        <select id="level_1" name="level_1" class="form-control">
            <option selected disabled>Select Level 1</option>
                @foreach ($level_1 as $l1)
                    <option 
                        value="{{ $l1->level_1 }}"
                    >
                    {{ $l1->level_1 }}
                    </option>
                @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('level_2', 'Level 2') }}
        <select id="level_2" name="level_2" class="form-control" disabled>
            <option selected disabled>Select Level 2</option>
                @foreach ($level_2 as $l2)
                    <option 
                        value="{{ $l2->level_2 }}"
                        data-level-1="{{ $l2->level_1 }}"
                    >
                    {{ $l2->level_2 }}
                    </option>
                @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
    {{ Form::label('level_3', 'Level 3') }}
        <select id="level_3" name="level_3" class="form-control" disabled>
            <option selected disabled>Select Level 3</option>
                @foreach ($level_3 as $l3)
                    <option 
                        value="{{ $l3->level_3 }}"
                        data-level-2="{{ $l3->level_2 }}"
                    >
                    {{ $l3->level_3 }}
                    </option>
                @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Type here...', 'rows' => '3', 'cols' => '170']) }}
</div>


@push('js')
<script>
    $(document).ready(function(){
        $('#level_1').change(function(){
            $("#level_2").removeAttr('disabled'); 
            level1 = $.trim($('#level_1 option:selected').text());

            var opt = document.getElementById("level_2").options;
            document.getElementById("level_2").selectedIndex = 0;

            for (var a = 0; a < opt.length; a++)
            {
                if (opt[a].getAttribute("data-level-1") == level1)
                {
                    $(opt[a]).show();
                }
                else
                {
                    $(opt[a]).hide();
                }
            }
        });

        $('#level_2').change(function(){
            $('#level_3').removeAttr("disabled");
            level2 = $.trim($('#level_2 option:selected').text());

            var opt = document.getElementById("level_3").options;
            document.getElementById("level_3").selectedIndex = 0;

            for (var a = 0; a < opt.length; a++)
            {
                if (opt[a].getAttribute("data-level-2") == level2)
                {
                    $(opt[a]).show();
                }
                else
                {
                    $(opt[a]).hide();
                }
            }
        });
    });
</script>
@endpush