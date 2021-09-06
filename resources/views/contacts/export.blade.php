<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>NRIC</th>
            <th>Race</th>
            <th>Address</th>
            <th>Contact No.</th>
            <th>Remark</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->name}}</td>
            <td>{{$contact->nric}}</td>
            <td>{{$contact->race}}</td>
            <td>{{$contact->address}}</td>
            <td>{{$contact->contact_no}}</td>
            <td>{{$contact->remark}}</td>
        </tr>
        @endforeach
    </tbody>
</table>