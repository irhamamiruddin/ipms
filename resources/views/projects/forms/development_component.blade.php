<div class="form-row">
    <div class="form-group col-md-11">
    <label for="component-type">Component Type</label>
        <select id="component-type" class="form-control">
            <option value="c">Commercial</option>
            <option value="a">Amenities</option>
            <option value="o">Others</option>
            <option value="r">Residential</option>
        </select>
    </div>
    <div class="form-group col-md-1">
    <button type="button" id="add-component-type" class="btn btn-sm btn-inverse-primary btn-rounded ml-4">Add</button>
    </div>
</div>

<div class="form-row" id="type-c1-form">
    <div class="form-group col-md-4">
    <label for="type_c1">Commercial Type</label>
        <select id="type_c1" class="form-control">
            @foreach ($commercialTypeC1 as $c1)
                <option 
                    value="{{ $c1->id }}"
                    data-type_c1="{{ $c1->type_c1 }}"
                >
                {{ $c1->type_c1 }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row" id="type-a1-form">
    <div class="form-group col-md-4">
    <label for="type_a1">Amenities Type</label>
        <select id="type_a1" class="form-control">
            @foreach ($amenityTypeA1 as $a1)
                <option 
                    value="{{ $a1->id }}"
                    data-type_a1="{{ $a1->type_a1 }}"
                >
                {{ $a1->type_a1 }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row" id="type-o1-form">
    <div class="form-group col-md-4">
    <label for="type_o1">Others Type</label>
        <select id="type_o1" class="form-control">
            @foreach ($otherTypeO1 as $o1)
                <option 
                    value="{{ $o1->id }}"
                    data-type_o1="{{ $o1->type_o1 }}"
                >
                {{ $o1->type_o1 }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row" id="type-r-form">
    <div class="form-group col-md-4">
    <label for="type_r1">Residential Type R1</label>
        <select id="type_r1" class="form-control">
            @foreach ($residentialTypeR1 as $r1)
                <option 
                    value="{{ $r1->id }}"
                    data-type_r1="{{ $r1->type_r1 }}"
                >
                {{ $r1->type_r1 }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
    <label for="type_r2">Residential Type R2</label>
        <select id="type_r2" class="form-control">
            @foreach ($residentialTypeR2 as $r2)
                <option 
                    value="{{ $r2->id }}"
                    data-type_r2="{{ $r2->type_r2 }}"
                >
                {{ $r2->type_r2 }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
    <label for="type_r3">Residential Type R3</label>
        <select id="type_r3" class="form-control">
        @foreach ($residentialTypeR3 as $r3)
                <option 
                    value="{{ $r3->id }}"
                    data-type_r3="{{ $r3->type_r3 }}"
                >
                {{ $r3->type_r3 }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="unit">Unit(s)</label>
        <input type="number" id="unit" class="form-control" value="1">
    </div>
    <div class="form-group col-md-6">
        <label for="storey">Storey</label>
        <input type="number" id="storey" class="form-control" value="1">
    </div>
</div>

<div class="row pt-3">
    <div class="col-lg-12 table-responsive">
        <table id="component-table" class="table table-striped" hidden>
            <thead>
                <tr>
                    <td>Component Type</td>
                    <td>Type 1</td>
                    <td>Type 2</td>
                    <td>Type 3</td>
                    <td>Unit(s)</td>
                    <td>Storey</td>
                </tr>
            </thead>
            <tbody id="devcomponent">
                
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    var i = 0;
    $(document).on('click', '.com_remove', function(){  
        var button_id = $(this).attr("id");  
        
        $('#com_row'+button_id).remove();  
    });

    $(document).ready(function(){
        $('#type-c1-form').show();
        $('#type-a1-form').hide();
        $('#type-o1-form').hide();
        $('#type-r-form').hide();

        $('#component-type').click(function(){
			var comtype = document.getElementById("component-type").value;

			switch (comtype)
			{
				case "c":
                $('#type-c1-form').show();
                $('#type-a1-form').hide();
                $('#type-o1-form').hide();
                $('#type-r-form').hide();
				break;

				case "a":
                $('#type-c1-form').hide();
                $('#type-a1-form').show();
                $('#type-o1-form').hide();
                $('#type-r-form').hide();
				break;

				case "o":
                $('#type-c1-form').hide();
                $('#type-a1-form').hide();
                $('#type-o1-form').show();
                $('#type-r-form').hide();
				break;

				case "r":
                $('#type-c1-form').hide();
                $('#type-a1-form').hide();
                $('#type-o1-form').hide();
                $('#type-r-form').show();
				break;
			}
      	});

          $('#add-component-type').click(function(){
            $("#component-table").removeAttr('hidden');
			var comtype = document.getElementById("component-type").value;

			switch (comtype)
			{
				case "c":
				var ct_desc = "Commercial";
				var type1 = document.getElementById("type_c1").options[document.getElementById("type_c1").selectedIndex].text;
				var type1id = document.getElementById("type_c1").value;
				var type2 = "";
				var type2id = "";
				var type3 = "";
				var type3id = "";
				break;

				case "r":
				var ct_desc = "Residential";
				var type1 = document.getElementById("type_r1").options[document.getElementById("type_r1").selectedIndex].text;
				var type1id = document.getElementById("type_r1").value;
				var type2 = document.getElementById("type_r2").options[document.getElementById("type_r2").selectedIndex].text;
				var type2id = document.getElementById("type_r2").value;
				var type3 = document.getElementById("type_r3").options[document.getElementById("type_r3").selectedIndex].text;
				var type3id = document.getElementById("type_r3").value;
				break;

				case "o":
				var ct_desc = "Other";
				var type1 = document.getElementById("type_o1").options[document.getElementById("type_o1").selectedIndex].text;
				var type1id = document.getElementById("type_o1").value;
				var type2 = "";
				var type2id = "";
				var type3 = "";
				var type3id = "";
				break;

				case "a":
				var ct_desc = "Amenities";
				var type1 = document.getElementById("type_a1").options[document.getElementById("type_a1").selectedIndex].text;
				var type1id = document.getElementById("type_a1").value;
				var type2 = "";
				var type2id = "";
				var type3 = "";
				var type3id = "";
				break;
			}
			var units = document.getElementById("unit").value;
			var storey = document.getElementById("storey").value;
            i++;

            var addrow= "<tr id='com_row"+i+"'>"
			addrow+="<td><input type='hidden' name='comtype[]' value='"+ct_desc+"'>"+ct_desc+"</td>"
			addrow+="<td><input type='hidden' name='type1[]' value='"+type1+"'>"+type1+"</td>"
			addrow+="<td><input type='hidden' name='type2[]' value='"+type2+"'>"+type2+"</td>"
			addrow+="<td><input type='hidden' name='type3[]' value='"+type3+"'>"+type3+"</td>"
			addrow+="<td><input type='hidden' name='units[]' value='"+units+"'>"+units+"</td>"
			addrow+="<td><input type='hidden' name='storey[]' value='"+storey+"'>"+storey+"</td>"
			addrow+="<td><a id="+i+" class='com_remove'><i class='icon-directions p-1'></i></a></td>"
			addrow+="</tr>";
			$("#devcomponent").append(addrow); 
      	});
    });
</script>
@endpush