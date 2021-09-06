<table>
    <thead>
        <tr>
            <th>Land</th>
            <th>Registered Proprietors</th>
            <th>Nominees</th>
            <th>Trustees</th>
            <th>Beneficiaries</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lands as $land)
        <tr>
            <td>{{$land->land_description}}</td>
            <td>
                @foreach($land->registered_proprietors as $rp)
                    @if($rp->type == 0)
                        - {{$rp->contact->name}} <br>
                    @elseif($rp->type == 1)
                        - {{$rp->company->company_name}} <br>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($land->nominees as $nominee)
                    @if($nominee->type == 0)
                        - {{$nominee->contact->name}} <br>
                    @elseif($nominee->type == 1)
                        - {{$nominee->company->company_name}} <br>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($land->trustees as $trustee)
                    @if($trustee->type == 0)
                        - {{$trustee->contact->name}} <br>
                    @elseif($trustee->type == 1)
                        - {{$trustee->company->company_name}} <br>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($land->beneficiaries as $beneficiary)
                    @if($beneficiary->type == 0)
                        - {{$beneficiary->contact->name}} <br>
                    @elseif($beneficiary->type == 1)
                        - {{$beneficiary->company->company_name}} <br>
                    @endif
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>