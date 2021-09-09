<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompanyFromView;
use App\Models\Company;
use App\Models\BusinessNature;
use App\Models\Contact;
use App\Models\ActivityLog;
use Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:company-index', ['only' => ['index']]);
        $this->middleware('can:company-create', ['only' => ['create']]);
        $this->middleware('can:company-edit', ['only' => ['edit']]);
        $this->middleware('can:company-destroy', ['only' => ['destroy']]);
    }

    public function index()
    {
        $companies = Company::all();

        return view('companies.index', ['companies'=>$companies]);
    }

    public function create()
    {
        $business_natures = BusinessNature::pluck('type','id');
        $contacts = Contact::all();

        $data = compact(
            'business_natures',
            'contacts'
        );


        return view('companies.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['email', 'max:255', 'unique:users', 'unique:contacts', 'unique:companies']
        ]);

        $company = Company::create($request->all());

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('company_name'),
            'class' => 'Company',
            'action' => 'Add',
        ]);

        if ($request->has('contact_id')) {
            $contact_id = $request->input('contact_id');
            $submitted_role = $request->input('submitted_role');

            for($j = 0; $j < count($contact_id); $j++) {
                $company->contacts()->attach($contact_id[$j], ['role' => $submitted_role[$j]]);
            }
        }
        
        return redirect('/companies')->with('success','Created Successfully!');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        
        return view('companies.show',['company'=>$company]);
    }

    public function edit($id)
    {
        $company = Company::where('id',$id)->first();
        $business_natures = BusinessNature::pluck('type','id');
        $contacts = Contact::all();
        

        $data = compact(
            'business_natures',
            'company',
            'contacts'
        );
        
        return view('companies.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => ['email', 'max:255', 'unique:users', 'unique:contacts', 'unique:companies,email,'.$id]
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('company_name'),
            'class' => 'Company',
            'action' => 'Update',
        ]);

        if ($request->has('contact_id')) {
            $contact_id = $request->input('contact_id');
            $submitted_role = $request->input('submitted_role');

            for($j = 0; $j < count($contact_id); $j++) {
                $company->contacts()->attach($contact_id[$j], ['role' => $submitted_role[$j]]);
            }
        }

        return redirect('/companies')->with('success','Updated Successfully!');
    }
    
    public function destroy($id){

        $company = Company::findOrFail($id);

        if ($company->delete()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $company->company_name,
                'class' => 'Company',
                'action' => 'Delete',
            ]);
        } else {
            return back()->withErrors('Deletion Failed!');
        }
        
        return redirect('/companies')->with('success','Deleted!');
    }

    public function export() {
        return Excel::download(new CompanyFromView, 'companies.xlsx');
    }
}