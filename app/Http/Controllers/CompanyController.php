<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\BusinessNature;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::all();

        return view('companies.index', ['companies'=>$companies]);
    }

    public function create()
    {
        $business_natures = BusinessNature::pluck('type','id');


        return view('companies.create', ['business_natures'=>$business_natures]);
    }

    public function store()
    {
        $companies = New Company();

        $companies->business_nature_id = request('business_nature');
        $companies->company_name = request('company_name');
        $companies->company_no = request('company_no');
        $companies->principle_name = request('principle_name');
        $companies->registered_person_no = request('registered_person_no');
        $companies->address = request('address');
        $companies->phone = request('phone');
        $companies->email = request('email');
        $companies->banker = request('banker');
        $companies->bank_ac_no = request('bank_ac_no');
        $companies->home_phone = request('home_phone');
        $companies->office_phone = request('office_phone');
        $companies->fax_phone = request('fax_phone');
        $companies->website_url = request('website_url');
        $companies->remark = request('remark');

        $companies->save();

        return redirect('/companies');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        
        return view('companies.show',['company'=>$company]);
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $business_natures = BusinessNature::pluck('type','id');
        
        return view('companies.edit',['company'=>$company, 'business_natures'=>$business_natures]);
    }

    public function update()
    {
        $id = request('id');

        $company = Company::findOrFail($id);

        $company->business_nature_id = request('business_nature');
        $company->company_name = request('company_name');
        $company->company_no = request('company_no');
        $company->principle_name = request('principle_name');
        $company->registered_person_no = request('registered_person_no');
        $company->address = request('address');
        $company->phone = request('phone');
        $company->email = request('email');
        $company->banker = request('banker');
        $company->bank_ac_no = request('bank_ac_no');
        $company->home_phone = request('home_phone');
        $company->office_phone = request('office_phone');
        $company->fax_phone = request('fax_phone');
        $company->website_url = request('website_url');
        $company->remark = request('remark');

        $company->save();

        return redirect('/companies');
    }
    
    public function destroy($id){

        $company = Company::findOrFail($id);
        $company->delete();

        
        return redirect('/companies');
    }
}
