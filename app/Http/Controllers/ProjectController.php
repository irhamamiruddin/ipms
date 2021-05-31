<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Company;
use App\Models\Land;
use App\Models\ProjectStatus;
use App\Models\User;
use App\Models\AmenityTypeA1;
use App\Models\CommercialTypeC1;
use App\Models\OtherTypeO1;
use App\Models\ResidentialTypeR1;
use App\Models\ResidentialTypeR2;
use App\Models\ResidentialTypeR3;
use App\Models\ProjectDevelopmentComponent;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all();
        
        return view('projects.index',['projects'=>$projects]);
    }

    public function create()
    {
        $companies = Company::all();
        $lands = Land::all();
        $project_status = ProjectStatus::pluck('project_status','id');
        $officers = User::where('role', 'land_staff')
                        ->orWhere('role', 'project_staff')
                        ->orWhere('role', 'manager')
                        ->get();
        $amenityTypeA1 = AmenityTypeA1::all();
        $commercialTypeC1 = CommercialTypeC1::all();
        $otherTypeO1 = OtherTypeO1::all();
        $residentialTypeR1 = ResidentialTypeR1::all();
        $residentialTypeR2 = ResidentialTypeR2::all();
        $residentialTypeR3 = ResidentialTypeR3::all();

        $data = compact(
            'companies',
            'lands',
            'project_status',
            'officers',
            'commercialTypeC1',
            'amenityTypeA1',
            'otherTypeO1',
            'residentialTypeR1',
            'residentialTypeR2',
            'residentialTypeR3'
        ); 

        return view('projects.create',$data);
    }

    public function store()
    {
        $projects = New Project();

        $projects->title = request('title');
        $projects->address = request('address');
        $projects->company_id = request('company');
        $projects->project_status_id = request('project_status');

        $projects->save();
        

        $project = Project::find($projects->id);

        if (request('oic_id') != NULL) {
            $oic_id = request('oic_id');

            for($i = 0; $i < count($oic_id); $i++) {
                $project->officer_in_charge()->attach($oic_id[$i]);
            }
        }
        
        if (request('roic_id') != NULL) {
            $roic_id = request('roic_id');

            for($i = 0; $i < count($roic_id); $i++) {
                $project->relief_officer_in_charge()->attach($roic_id[$i]);
            }
        }

        if (request('land_id') != NULL) {
            $land_id = request('land_id');

            for($i = 0; $i < count($land_id); $i++) {
                $land = Land::findOrFail($land_id[$i]);

                $land->project_id = $projects->id;

                $land->save();
            }
        }
        
        if (request('company_id') != NULL) {
            $company_id = request('company_id');

            for($i = 0; $i < count($company_id); $i++) {
                $project->companies()->attach($company_id[$i]);
            }
        }

        if (request('comtype') != NULL) {
            $comtype = request('comtype');
            $type1 = request('type1');
            $type2 = request('type2');
            $type3 = request('type3');
            $units = request('units');
            $storey = request('storey');

            for($i = 0; $i < count($comtype); $i++) {
                $dev_comp = new ProjectDevelopmentComponent;

                $dev_comp->component_type = $comtype[$i];
                $dev_comp->project_id = $projects->id;
                $dev_comp->type1 = $type1[$i];
                $dev_comp->type2 = $type2[$i];
                $dev_comp->type3 = $type3[$i];
                $dev_comp->units = $units[$i];
                $dev_comp->storeys = $storey[$i];

                $dev_comp->save();
            }
        }

        return redirect('/projects');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        
        return view('projects.show',['project'=>$project]);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        $companies = Company::all();
        $project_status = ProjectStatus::pluck('project_status','id');
        $officers = User::where('role', 'land_staff')
                        ->orWhere('role', 'project_staff')
                        ->orWhere('role', 'manager')
                        ->get();
        $amenityTypeA1 = AmenityTypeA1::all();
        $commercialTypeC1 = CommercialTypeC1::all();
        $otherTypeO1 = OtherTypeO1::all();
        $residentialTypeR1 = ResidentialTypeR1::all();
        $residentialTypeR2 = ResidentialTypeR2::all();
        $residentialTypeR3 = ResidentialTypeR3::all();

        $data = compact(
            'project',
            'companies',
            'project_status',
            'officers',
            'commercialTypeC1',
            'amenityTypeA1',
            'otherTypeO1',
            'residentialTypeR1',
            'residentialTypeR2',
            'residentialTypeR3'
        );
        
        return view('projects.edit',$data);
    }

    // public function update()
    // {
    //     $id = request('id');

    //     $contact = Contact::findOrFail($id);

    //     $contact->name = request('name');
    //     $contact->nric = request('nric');
    //     $contact->race = request('race');
    //     $contact->address = request('address');
    //     $contact->contact_no = request('contact_no');
    //     $contact->home_phone = request('home_phone');
    //     $contact->office_phone = request('office_phone');
    //     $contact->fax_phone = request('fax_phone');
    //     $contact->email = request('email');
    //     $contact->image = request('image');
    //     $contact->remark = request('remark');

    //     $contact->save();

    //     if (request('company_id') != NULL) {
    //         $company_id = request('company_id');
    //         $submitted_c_role = request('submitted_c_role');

    //         for($i = 0; $i < count($company_id); $i++) {
    //             $contact->companies()->attach($company_id[$i], ['role' => $submitted_c_role[$i]]);
    //         }
    //     }

    //     if (request('user_id') != NULL) {
    //         $user_id = request('user_id');
    //         $submitted_u_role = request('submitted_u_role');
            
    //         for($j = 0; $j < count($user_id); $j++) {
    //             $contact->users()->attach($user_id[$j], ['role' => $submitted_u_role[$j]]);
    //         }
    //     }

    //     return redirect('/contacts');
    // }
    
    public function destroy($id){

        $project = Project::findOrFail($id);
        $project->delete();

        
        return redirect('/projects');
    }
}
