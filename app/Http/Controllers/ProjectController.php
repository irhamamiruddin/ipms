<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProjectFromView;
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

        $this->middleware('can:project-index', ['only' => ['index']]);
        $this->middleware('can:project-create', ['only' => ['create']]);
        $this->middleware('can:project-edit', ['only' => ['edit']]);
        $this->middleware('can:project-destroy', ['only' => ['destroy']]);
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
        $officers = User::whereIs('manager', 'land_officer', 'project_officer')->get();
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

    public function store(Request $request)
    {
        $project = new Project($request->all());
        $project->company()->associate($request->input('company'));
        $project->project_status()->associate($request->input('project_status'));
        $project->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('title'),
            'class' => 'Project',
            'action' => 'Add',
        ]);

        if ($request->has('oic_id')) {
            $oic_id = $request->input('oic_id');

            for($i = 0; $i < count($oic_id); $i++) {
                $project->officer_in_charge()->attach($oic_id[$i]);
            }
        }
        
        if ($request->has('roic_id')) {
            $roic_id = $request->input('roic_id');

            for($i = 0; $i < count($roic_id); $i++) {
                $project->relief_officer_in_charge()->attach($roic_id[$i]);
            }
        }

        if ($request->has('land_id')) {
            $land_id = $request->input('land_id');

            for($i = 0; $i < count($land_id); $i++) {
                $land = Land::findOrFail($land_id[$i]);

                $land->project()->associate($project->id);
                $land->save();
            }
        }
        
        if ($request->has('company_id')) {
            $company_id = $request->input('company_id');

            for($i = 0; $i < count($company_id); $i++) {
                $project->companies()->attach($company_id[$i]);
            }
        }

        if ($request->has('comtype')) {
            $comtype = $request->input('comtype');
            $type1 = $request->input('type1');
            $type2 = $request->input('type2');
            $type3 = $request->input('type3');
            $units = $request->input('units');
            $storey = $request->input('storey');

            for($i = 0; $i < count($comtype); $i++) {
                $project->dev_components()->create([
                    'component_type' => $comtype[$i],
                    'type1' => $type1[$i],
                    'type2' => $type2[$i],
                    'type3' => $type3[$i],
                    'units' => $units[$i],
                    'storeys' => $storey[$i],
                ]);
            }
        }

        return redirect('/projects')->with('success','Created Successfully!');
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
        $officers = User::whereIs('manager', 'land_officer', 'project_officer')->get();
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

    public function update(Request $request,$id)
    {
        $project = Project::findOrFail($id);

        $project->fill($request->all());
        $project->company()->associate($request->input('company'));
        $project->project_status()->associate($request->input('project_status'));
        $project->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('title'),
            'class' => 'Project',
            'action' => 'Update',
        ]);

        if ($request->has('oic_id')) {
            $oic_id = $request->input('oic_id');

            for($i = 0; $i < count($oic_id); $i++) {
                $project->officer_in_charge()->attach($oic_id[$i]);
            }
        }
        
        if ($request->has('roic_id')) {
            $roic_id = $request->input('roic_id');

            for($i = 0; $i < count($roic_id); $i++) {
                $project->relief_officer_in_charge()->attach($roic_id[$i]);
            }
        }

        if ($request->has('land_id')) {
            $land_id = $request->input('land_id');

            for($i = 0; $i < count($land_id); $i++) {
                $land = Land::findOrFail($land_id[$i]);

                $land->project()->associate($project->id);
                $land->save();
            }
        }
        
        if ($request->has('company_id')) {
            $company_id = $request->input('company_id');

            for($i = 0; $i < count($company_id); $i++) {
                $project->companies()->attach($company_id[$i]);
            }
        }

        if ($request->has('comtype')) {
            $comtype = $request->input('comtype');
            $type1 = $request->input('type1');
            $type2 = $request->input('type2');
            $type3 = $request->input('type3');
            $units = $request->input('units');
            $storey = $request->input('storey');

            for($i = 0; $i < count($comtype); $i++) {
                $project->dev_components()->create([
                    'component_type' => $comtype[$i],
                    'type1' => $type1[$i],
                    'type2' => $type2[$i],
                    'type3' => $type3[$i],
                    'units' => $units[$i],
                    'storeys' => $storey[$i],
                ]);
            }
        }

        return redirect('/projects')->with('success','Edited Successfully!');
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
        } else {
            return back()->withErrors('Deletion Failed!');
        }
        
        return redirect('/projects')->with('success','Deleted!');
    }

    public function export() {
        return Excel::download(new ProjectFromView, 'projects.xlsx');
    }
}
