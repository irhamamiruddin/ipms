<table>
    <thead>
        <tr>
            <th>Business Nature</th>
            <th>Company Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->business_natures->type}}</td>
            <td>{{$company->company_name}}</td>
            <td>{{$company->phone}}</td>
            <td>{{$company->address}}</td>
            <td>{{$company->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>