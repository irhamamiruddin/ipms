<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Company</th>
            <th>Size</th>
            <th>Status</th>
            <th>Officer in Charge</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->company->company_name}}</td>
            <td>
                @forelse($project->lands as $land)
                    {{$land->size}} {{$land->size_unit}}<br>
                @empty
                    No Records.
                @endforelse
            </td>
            <td>{{$project->project_status->project_status}}</td>
            <td>
                @forelse($project->officer_in_charge as $oic)
                    {{$oic->name}} <br>
                @empty
                    No Records.
                @endforelse
            </td>
        </tr>
        @endforeach
    </tbody>
</table>