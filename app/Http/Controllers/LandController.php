<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Land;
use App\Models\LandClassification;
use App\Models\LandAcquisitionStatus;
use App\Models\CategoriesOfLand;
use App\Models\User;
use App\Models\Contact;
use App\Models\Company;
use App\Models\RegisteredProprietorNature;
use App\Models\Consent;
use App\Models\RegisteredProprietor;
use App\Models\Nominee;
use App\Models\Trustee;
use App\Models\Beneficiary;

class LandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lands = Land::all();

        return view('lands.index', ['lands'=>$lands]);
    }

    public function create()
    {
        $classifications = LandClassification::pluck('classification','id');
        $land_acquisition_status = LandAcquisitionStatus::pluck('status','id');
        $categories_of_land = CategoriesOfLand::pluck('category','id');
        $officers = User::where('role', 'land_staff')
                        ->orWhere('role', 'project_staff')
                        ->orWhere('role', 'manager')
                        ->get();
        $contacts = Contact::all();
        $companies = Company::all();
        $agreements = RegisteredProprietorNature::all();
        $consents = Consent::all();

        $units = [
            'Hectares' => 'Hectares',
            'Acres' => 'Acres',
            'Metre Square' => 'Metre Square'
        ];

        $types = [
            'NULL' => 'Select Type',
            '0' => 'Individual',
            '1' => 'Company'
        ];

        $data = compact(
            'units',
            'classifications',
            'land_acquisition_status',
            'categories_of_land',
            'officers',
            'contacts',
            'types',
            'companies',
            'agreements',
            'consents'
        );

        return view('lands.create', $data);
    }

    public function store()
    {
        $lands = New Land();

        $lands->land_description = request('land_description');
        $lands->field_lot = request('field_lot');
        $lands->lot = request('lot');
        $lands->block = request('block');
        $lands->district = request('district');
        $lands->locality = request('locality');
        $lands->gps_land_size = request('gps_land_size');
        $lands->gps_land_size_unit = request('gps_land_size_unit');
        $lands->size = request('size');
        $lands->size_unit = request('size_unit');
        $lands->classification = request('classification');
        $lands->term = request('term');
        $lands->commencement_date = request('commencement_date');
        $lands->expiry_date = request('expiry_date');
        $lands->date_of_registration = request('date_of_registration');
        $lands->annual_rent = request('annual_rent');
        $lands->land_acquisition_status_id = request('land_acquisition_status_id');
        $lands->division = request('division');
        $lands->categories_of_land_id = request('categories_of_land_id');
        $lands->special_condition = request('special_condition');
        $lands->annual_rent_last_paid_date = request('annual_rent_last_paid_date');
        $lands->annual_rent_next_paid_date = request('annual_rent_next_paid_date');
        $lands->remark = request('remark');

        $lands->save();

        $land = Land::find($lands->id);

        if (request('oic_id') != NULL) {
            $oic_id = request('oic_id');

            for($i = 0; $i < count($oic_id); $i++) {
                $land->officer_in_charge()->attach($oic_id[$i]);
            }
        }
        
        if (request('roic_id') != NULL) {
            $roic_id = request('roic_id');

            for($i = 0; $i < count($roic_id); $i++) {
                $land->relief_officer_in_charge()->attach($roic_id[$i]);
            }
        }

        if (request('kk_id') != NULL) {
            $kk_id = request('kk_id');
            $kk_remark = request('kk_remark');

            for($i = 0; $i < count($kk_id); $i++) {
                $land->ketua_kampung()->attach($kk_id[$i], ['remark' => $kk_remark[$i]]);
            }
        }

        if (request('rp_id') != NULL) {
            $rp_id = request('rp_id');
            $rp_type = request('rp_type');
            $rp_share = request('rp_share');
            $rp_totalshare = request('rp_totalshare');
            $rp_remark = request('rp_remark');

            for($i = 0; $i < count($rp_id); $i++) {
                $registered_proprietor = new RegisteredProprietor;

                $registered_proprietor->land_id = $lands->id;
                $registered_proprietor->type = $rp_type[$i];
                $registered_proprietor->item_id = $rp_id[$i];
                $registered_proprietor->share = $rp_share[$i];
                $registered_proprietor->total_share = $rp_totalshare[$i];
                $registered_proprietor->remarks = $rp_remark[$i];

                $registered_proprietor->save();
            }
        }

        if (request('agreement_id') != NULL) {
            $agreement_id = request('agreement_id');
            $signing_date = request('signing_date');
            $stamping_date = request('stamping_date');
            $expiry_date_agreement = request('expiry_date_agreement');
            $reminder_period = request('reminder_period');
            $reminder_date = request('reminder_date');
            $s_p_price = request('s_p_price');
            $consideration = request('consideration');

            for($i = 0; $i < count($agreement_id); $i++) {
                $land->agreement()->attach($agreement_id[$i], [
                    'signing_date' => $signing_date[$i],
                    'stamping_date' => $stamping_date[$i],
                    'expiry_date' => $expiry_date_agreement[$i],
                    'reminder_period' => $reminder_period[$i],
                    'reminder_date' => $reminder_date[$i],
                    's_p_price' => $s_p_price[$i],
                    'consideration' => $consideration[$i]
                    ]);
            }
        }

        if (request('nominee_id') != NULL) {
            $nominee_id = request('nominee_id');
            $nominee_type = request('nominee_type');
            $nominee_share = request('nominee_share');
            $nominee_totalshare = request('nominee_totalshare');
            $nominee_remark = request('nominee_remark');

            for($i = 0; $i < count($nominee_id); $i++) {
                $nominee = new Nominee;

                $nominee->land_id = $lands->id;
                $nominee->type = $nominee_type[$i];
                $nominee->item_id = $nominee_id[$i];
                $nominee->share = $nominee_share[$i];
                $nominee->total_share = $nominee_totalshare[$i];
                $nominee->remarks = $nominee_remark[$i];

                $nominee->save();
            }
        }

        if (request('consent_id') != NULL) {
            $consent_id = request('consent_id');
            $signing_date_consent = request('signing_date_consent');
            $stamping_date_consent = request('stamping_date_consent');
            $instrument_no = request('instrument_no');
            $instrument_registered_date = request('instrument_registered_date');

            for($i = 0; $i < count($consent_id); $i++) {
                $land->consent()->attach($consent_id[$i], [
                    'signing_date' => $signing_date_consent[$i],
                    'stamping_date' => $stamping_date_consent[$i],
                    'instrument_no' => $instrument_no[$i],
                    'instrument_registered_date' => $instrument_registered_date[$i]
                    ]);
            }
        }

        if (request('trustee_id') != NULL) {
            $trustee_id = request('trustee_id');
            $trustee_type = request('trustee_type');
            $trustee_share = request('trustee_share');
            $trustee_totalshare = request('trustee_totalshare');
            $trustee_remark = request('trustee_remark');

            for($i = 0; $i < count($trustee_id); $i++) {
                $trustee = new Trustee;

                $trustee->land_id = $lands->id;
                $trustee->type = $trustee_type[$i];
                $trustee->item_id = $trustee_id[$i];
                $trustee->share = $trustee_share[$i];
                $trustee->total_share = $trustee_totalshare[$i];
                $trustee->remarks = $trustee_remark[$i];

                $trustee->save();
            }
        }

        if (request('beneficiary_id') != NULL) {
            $beneficiary_id = request('beneficiary_id');
            $beneficiary_type = request('beneficiary_type');
            $beneficiary_share = request('beneficiary_share');
            $beneficiary_totalshare = request('beneficiary_totalshare');
            $beneficiary_remark = request('beneficiary_remark');

            for($i = 0; $i < count($beneficiary_id); $i++) {
                $beneficiary = new Beneficiary;

                $beneficiary->land_id = $lands->id;
                $beneficiary->type = $beneficiary_type[$i];
                $beneficiary->item_id = $beneficiary_id[$i];
                $beneficiary->share = $beneficiary_share[$i];
                $beneficiary->total_share = $beneficiary_totalshare[$i];
                $beneficiary->remarks = $beneficiary_remark[$i];

                $beneficiary->save();
            }
        }
        
        return redirect('/lands');
    }

    public function show($id)
    {
        $land = Land::findOrFail($id);

        $classifications = LandClassification::pluck('classification','id');
        $land_acquisition_status = LandAcquisitionStatus::pluck('status','id');
        $categories_of_land = CategoriesOfLand::pluck('category','id');
        $officers = User::where('role', 'land_staff')
                        ->orWhere('role', 'project_staff')
                        ->orWhere('role', 'manager')
                        ->get();
        $contacts = Contact::all();
        $companies = Company::all();
        $agreements = RegisteredProprietorNature::all();
        $consents = Consent::all();

        $units = [
            'Hectares' => 'Hectares',
            'Acres' => 'Acres',
            'Metre Square' => 'Metre Square'
        ];

        $types = [
            'NULL' => 'Select Type',
            '0' => 'Individual',
            '1' => 'Company'
        ];

        $data = compact(
            'land',
            'units',
            'classifications',
            'land_acquisition_status',
            'categories_of_land',
            'officers',
            'contacts',
            'types',
            'companies',
            'agreements',
            'consents'
        );
        
        return view('lands.show',$data);
    }

    // public function edit($id)
    // {
    //     $company = Company::where('id',$id)->first();
    //     $business_natures = BusinessNature::pluck('type','id');
    //     $contacts = Contact::all();
        

    //     $data = compact(
    //         'business_natures',
    //         'company',
    //         'contacts'
    //     );
        
    //     return view('companies.edit', $data);
    // }

    // public function update()
    // {
    //     $id = request('id');

    //     $company = Company::findOrFail($id);

    //     $company->business_nature_id = request('business_nature');
    //     $company->company_name = request('company_name');
    //     $company->company_no = request('company_no');
    //     $company->principle_name = request('principle_name');
    //     $company->registered_person_no = request('registered_person_no');
    //     $company->address = request('address');
    //     $company->phone = request('phone');
    //     $company->email = request('email');
    //     $company->banker = request('banker');
    //     $company->bank_ac_no = request('bank_ac_no');
    //     $company->home_phone = request('home_phone');
    //     $company->office_phone = request('office_phone');
    //     $company->fax_phone = request('fax_phone');
    //     $company->website_url = request('website_url');
    //     $company->remark = request('remark');

    //     $company->save();

    //     if (request('contact_id') != NULL) {
    //         // $company->contacts()->where('id', $id)->detach();

    //         $contact_id = request('contact_id');
    //         $submitted_role = request('submitted_role');

    //         for($j = 0; $j < count($contact_id); $j++) {
    //             $company->contacts()->attach($contact_id[$j], ['role' => $submitted_role[$j]]);
    //         }
    //     }

    //     return redirect('/companies');
    // }
    
    public function destroy($id){

        $land = Land::findOrFail($id);
        $land->delete();

        
        return redirect('/lands');
    }
}
