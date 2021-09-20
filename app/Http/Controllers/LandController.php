<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LandFromView;
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
use App\Models\LogNature;
use App\Models\LogLevel1;
use App\Models\LogLevel2;
use App\Models\LogLevel3;
use App\Models\LandLog;
use App\Models\ActivityLog;
use App\Models\File;
use App\Models\Agreement;
use Auth;
use Bouncer;

class LandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:land-index', ['only' => ['index']]);
        $this->middleware('can:land-create', ['only' => ['create']]);
        $this->middleware('can:land-edit', ['only' => ['edit']]);
        $this->middleware('can:land-destroy', ['only' => ['destroy']]);
        $this->middleware('can:land-download', ['only' => ['download']]);
        $this->middleware('can:land-export', ['only' => ['export']]);
    }

    public function index()
    {
        $user = User::findOrFail(Auth::id());

        if (Bouncer::is($user)->a('superadmin', 'manager')) {
            $lands = Land::all();
        } else {
            $lands = $user->land_officer_in_charge()->get();
            $lands = $lands->merge($user->land_relief_officer_in_charge()->get());
            $lands = $lands->unique()->sort();
        }
        return view('lands.index', ['lands'=>$lands]);
    }

    public function create()
    {
        $classifications = LandClassification::pluck('classification','id');
        $land_acquisition_status = LandAcquisitionStatus::pluck('status','id');
        $categories_of_land = CategoriesOfLand::pluck('category','id');
        $officers = User::whereIs('manager', 'land_officer', 'project_officer')->get();
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

    public function store(Request $request)
    {
        $land = Land::create($request->all());
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('land_description'),
            'class' => 'Land',
            'action' => 'Add',
        ]);

        if ($request->has('file')) {
            $filename = $request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $filepath = $request->file->store('files');

            $file = new File([
                'filename' => $filename,
                'extension' => $extension,
                'filepath' => $filepath,
            ]);

            $land->files()->save($file);
        }

        if ($request->has('oic_id')) {
            $oic_id = $request->input('oic_id');

            for($i = 0; $i < count($oic_id); $i++) {
                $land->officer_in_charge()->attach($oic_id[$i]);
            }
        }
        
        if ($request->has('roic_id')) {
            $roic_id = $request->input('roic_id');

            for($i = 0; $i < count($roic_id); $i++) {
                $land->relief_officer_in_charge()->attach($roic_id[$i]);
            }
        }

        if ($request->has('kk_id')) {
            $kk_id = $request->input('kk_id');
            $kk_remark = $request->input('kk_remark');

            for($i = 0; $i < count($kk_id); $i++) {
                $land->ketua_kampung()->attach($kk_id[$i], ['remark' => $kk_remark[$i]]);
            }
        }

        if ($request->has('rp_id')) {
            $rp_id = $request->input('rp_id');
            $rp_type = $request->input('rp_type');
            $rp_share = $request->input('rp_share');
            $rp_totalshare = $request->input('rp_totalshare');
            $rp_remark = $request->input('rp_remark');

            for($i = 0; $i < count($rp_id); $i++) {
                RegisteredProprietor::create([
                    'land_id' => $land->id,
                    'type' => $rp_type[$i],
                    'item_id' => $rp_id[$i],
                    'share' => $rp_share[$i],
                    'total_share' => $rp_totalshare[$i],
                    'remarks' => $rp_remark[$i],
                ]);
            }
        }

        if ($request->has('agreement_id')) {
            $agreement_id = $request->input('agreement_id');
            $signing_date = $request->input('signing_date');
            $stamping_date = $request->input('stamping_date');
            $expiry_date_agreement = $request->input('expiry_date_agreement');
            $reminder_period = $request->input('reminder_period');
            $reminder_date = $request->input('reminder_date');
            $s_p_price = $request->input('s_p_price');
            $consideration = $request->input('consideration');

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

        if ($request->has('nominee_id')) {
            $nominee_id = $request->input('nominee_id');
            $nominee_type = $request->input('nominee_type');
            $nominee_share = $request->input('nominee_share');
            $nominee_totalshare = $request->input('nominee_totalshare');
            $nominee_remark = $request->input('nominee_remark');

            for($i = 0; $i < count($nominee_id); $i++) {
                Nominee::create([
                    'land_id' => $land->id,
                    'type' => $nominee_type[$i],
                    'item_id' => $nominee_id[$i],
                    'share' => $nominee_share[$i],
                    'total_share' => $nominee_totalshare[$i],
                    'remarks' => $nominee_remark[$i],
                ]);
            }
        }

        if ($request->has('consent_id')) {
            $consent_id = $request->input('consent_id');
            $signing_date_consent = $request->input('signing_date_consent');
            $stamping_date_consent = $request->input('stamping_date_consent');
            $instrument_no = $request->input('instrument_no');
            $instrument_registered_date = $request->input('instrument_registered_date');

            for($i = 0; $i < count($consent_id); $i++) {
                $land->consent()->attach($consent_id[$i], [
                    'signing_date' => $signing_date_consent[$i],
                    'stamping_date' => $stamping_date_consent[$i],
                    'instrument_no' => $instrument_no[$i],
                    'instrument_registered_date' => $instrument_registered_date[$i]
                    ]);
            }
        }

        if ($request->has('trustee_id')) {
            $trustee_id = $request->input('trustee_id');
            $trustee_type = $request->input('trustee_type');
            $trustee_share = $request->input('trustee_share');
            $trustee_totalshare = $request->input('trustee_totalshare');
            $trustee_remark = $request->input('trustee_remark');

            for($i = 0; $i < count($trustee_id); $i++) {
                Trustee::create([
                    'land_id' => $land->id,
                    'type' => $trustee_type[$i],
                    'item_id' => $trustee_id[$i],
                    'share' => $trustee_share[$i],
                    'total_share' => $trustee_totalshare[$i],
                    'remarks' => $trustee_remark[$i],
                ]);
            }
        }

        if ($request->has('beneficiary_id')) {
            $beneficiary_id = $request->input('beneficiary_id');
            $beneficiary_type = $request->input('beneficiary_type');
            $beneficiary_share = $request->input('beneficiary_share');
            $beneficiary_totalshare = $request->input('beneficiary_totalshare');
            $beneficiary_remark = $request->input('beneficiary_remark');

            for($i = 0; $i < count($beneficiary_id); $i++) {
                Beneficiary::create([
                    'land_id' => $land->id,
                    'type' => $beneficiary_type[$i],
                    'item_id' => $beneficiary_id[$i],
                    'share' => $beneficiary_share[$i],
                    'total_share' => $beneficiary_totalshare[$i],
                    'remarks' => $beneficiary_remark[$i],
                ]);
            }
        }
        
        return redirect('/lands')->with('success','Created Successfully!');
    }

    public function show($id)
    {
        $land = Land::findOrFail($id);

        $classifications = LandClassification::pluck('classification','id');
        $land_acquisition_status = LandAcquisitionStatus::pluck('status','id');
        $categories_of_land = CategoriesOfLand::pluck('category','id');
        $officers = User::whereIs('manager', 'land_officer', 'project_officer')->get();
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

    public function edit($id)
    {
        $land = Land::findOrFail($id);

        $classifications = LandClassification::pluck('classification','id');
        $land_acquisition_status = LandAcquisitionStatus::pluck('status','id');
        $categories_of_land = CategoriesOfLand::pluck('category','id');
        $officers = User::whereIs('manager', 'land_officer', 'project_officer')->get();
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
        
        return view('lands.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $land = Land::findOrFail($id);

        $land->update($request->all());
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('land_description'),
            'class' => 'Land',
            'action' => 'Add',
        ]);

        if ($request->has('file')) {
            $filename = $request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $filepath = $request->file->store('files');

            $file = new File([
                'filename' => $filename,
                'extension' => $extension,
                'filepath' => $filepath,
            ]);

            $land->files()->save($file);
        }

        if ($request->has('oic_id')) {
            $oic_id = $request->input('oic_id');

            for($i = 0; $i < count($oic_id); $i++) {
                $land->officer_in_charge()->attach($oic_id[$i]);
            }
        }
        
        if ($request->has('roic_id')) {
            $roic_id = $request->input('roic_id');

            for($i = 0; $i < count($roic_id); $i++) {
                $land->relief_officer_in_charge()->attach($roic_id[$i]);
            }
        }

        if ($request->has('kk_id')) {
            $kk_id = $request->input('kk_id');
            $kk_remark = $request->input('kk_remark');

            for($i = 0; $i < count($kk_id); $i++) {
                $land->ketua_kampung()->attach($kk_id[$i], ['remark' => $kk_remark[$i]]);
            }
        }

        if ($request->has('rp_id')) {
            $rp_id = $request->input('rp_id');
            $rp_type = $request->input('rp_type');
            $rp_share = $request->input('rp_share');
            $rp_totalshare = $request->input('rp_totalshare');
            $rp_remark = $request->input('rp_remark');

            for($i = 0; $i < count($rp_id); $i++) {
                RegisteredProprietor::create([
                    'land_id' => $land->id,
                    'type' => $rp_type[$i],
                    'item_id' => $rp_id[$i],
                    'share' => $rp_share[$i],
                    'total_share' => $rp_totalshare[$i],
                    'remarks' => $rp_remark[$i],
                ]);
            }
        }

        if ($request->has('agreement_id')) {
            $agreement_id = $request->input('agreement_id');
            $signing_date = $request->input('signing_date');
            $stamping_date = $request->input('stamping_date');
            $expiry_date_agreement = $request->input('expiry_date_agreement');
            $reminder_period = $request->input('reminder_period');
            $reminder_date = $request->input('reminder_date');
            $s_p_price = $request->input('s_p_price');
            $consideration = $request->input('consideration');

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

        if ($request->has('nominee_id')) {
            $nominee_id = $request->input('nominee_id');
            $nominee_type = $request->input('nominee_type');
            $nominee_share = $request->input('nominee_share');
            $nominee_totalshare = $request->input('nominee_totalshare');
            $nominee_remark = $request->input('nominee_remark');

            for($i = 0; $i < count($nominee_id); $i++) {
                Nominee::create([
                    'land_id' => $land->id,
                    'type' => $nominee_type[$i],
                    'item_id' => $nominee_id[$i],
                    'share' => $nominee_share[$i],
                    'total_share' => $nominee_totalshare[$i],
                    'remarks' => $nominee_remark[$i],
                ]);
            }
        }

        if ($request->has('consent_id')) {
            $consent_id = $request->input('consent_id');
            $signing_date_consent = $request->input('signing_date_consent');
            $stamping_date_consent = $request->input('stamping_date_consent');
            $instrument_no = $request->input('instrument_no');
            $instrument_registered_date = $request->input('instrument_registered_date');

            for($i = 0; $i < count($consent_id); $i++) {
                $land->consent()->attach($consent_id[$i], [
                    'signing_date' => $signing_date_consent[$i],
                    'stamping_date' => $stamping_date_consent[$i],
                    'instrument_no' => $instrument_no[$i],
                    'instrument_registered_date' => $instrument_registered_date[$i]
                    ]);
            }
        }

        if ($request->has('trustee_id')) {
            $trustee_id = $request->input('trustee_id');
            $trustee_type = $request->input('trustee_type');
            $trustee_share = $request->input('trustee_share');
            $trustee_totalshare = $request->input('trustee_totalshare');
            $trustee_remark = $request->input('trustee_remark');

            for($i = 0; $i < count($trustee_id); $i++) {
                Trustee::create([
                    'land_id' => $land->id,
                    'type' => $trustee_type[$i],
                    'item_id' => $trustee_id[$i],
                    'share' => $trustee_share[$i],
                    'total_share' => $trustee_totalshare[$i],
                    'remarks' => $trustee_remark[$i],
                ]);
            }
        }

        if ($request->has('beneficiary_id')) {
            $beneficiary_id = $request->input('beneficiary_id');
            $beneficiary_type = $request->input('beneficiary_type');
            $beneficiary_share = $request->input('beneficiary_share');
            $beneficiary_totalshare = $request->input('beneficiary_totalshare');
            $beneficiary_remark = $request->input('beneficiary_remark');

            for($i = 0; $i < count($beneficiary_id); $i++) {
                Beneficiary::create([
                    'land_id' => $land->id,
                    'type' => $beneficiary_type[$i],
                    'item_id' => $beneficiary_id[$i],
                    'share' => $beneficiary_share[$i],
                    'total_share' => $beneficiary_totalshare[$i],
                    'remarks' => $beneficiary_remark[$i],
                ]);
            }
        }
        
        return redirect('/lands')->with('success','Edited Successfully!');
    }
    
    public function destroy($id){

        $land = Land::findOrFail($id);
        if ($land->delete()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $land->land_description,
                'class' => 'Land',
                'action' => 'Delete',
            ]);
        } else {
            return back()->withErrors('Deletion Failed!');
        }
        
        return redirect('/lands')->with('success','Deleted!');
    }

    public function download($id) {
        $file = File::find($id);

        return Storage::download($file->filepath, $file->filename);
    }

    public function export() {
        return Excel::download(new LandFromView, 'lands.xlsx');
    }

    public function update_exp_noty($id) {
        $land = Land::findOrFail($id);

        $land->expiry_date_noty = request('expiry_date_noty');
        $land->save();

        return redirect()->route('lands.index');
    }

    public function update_annual_noty($id) {
        $land = Land::findOrFail($id);

        $land->annual_rent_next_paid_date_noty = request('annual_noty');
        $land->save();

        return redirect()->route('lands.index');
    }
}