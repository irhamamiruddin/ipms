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
use App\Models\LogNature;
use App\Models\LogLevel1;
use App\Models\LogLevel2;
use App\Models\LogLevel3;
use App\Models\ProjectLog;
use App\Models\ActivityLog;
use Auth;

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

        if ($projects->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('title');
            $log->class = "Project";
            $log->action = "Add";

            $log->save();
        }
        

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
            'lands',
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

    public function update($id)
    {
        $project = Project::findOrFail($id);

        $project->title = request('title');
        $project->address = request('address');
        $project->company_id = request('company');
        $project->project_status_id = request('project_status');

        if ($project->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('title');
            $log->class = "Project";
            $log->action = "Update";

            $log->save();
        }

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

                $land->project_id = $id;

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
                $dev_comp->project_id = $id;
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
    
    public function destroy($id){

        $project = Project::findOrFail($id);
        if ($project->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $project->title;
            $log->class = "Project";
            $log->action = "Delete";

            $log->save();
        }

        
        return redirect('/projects');
    }
}
