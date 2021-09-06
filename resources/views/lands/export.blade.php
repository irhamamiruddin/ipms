<table>
    <thead>
        <tr>
            <th>Project</th>
            <th>Land Description</th>
            <th>Area</th>
            <th>Classification</th>
        </tr>
    </thead>
    <tbody>
    @foreach($lands as $land)
        <tr>
            <td>@if($land->project_id == NULL) None @else {{$land->project->title}} @endif</td>
            <td>{{$land->land_description}}</td>
            <td>{{$land->locality}}</td>
            <td>@if($land->classification == NULL) None @else {{$land->classifications->classification}} @endif</td>
        </tr>
    @endforeach
    </tbody>
</table>