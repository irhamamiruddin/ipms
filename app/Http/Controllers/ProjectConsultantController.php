<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Consultant;
use App\Models\KeyApprovedPlan;
use App\Models\ConsultantRole;
use App\Models\Contact;
use App\Models\ActivityLog;
use Auth;

class ProjectConsultantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $project = Project::findOrFail($id);
        $consultants = Consultant::all();

        $data = compact(
            'project',
            'consultants'
        );
        
        return view('projects.consultants.index', $data);
    }

    public function create($id)
    {
        $project = Project::findOrFail($id);

        $roles = ConsultantRole::pluck('type','id');
        $contacts = Contact::pluck('name','id');

        $data = compact(
            'project',
            'roles',
            'contacts'
        );
        
        return view('projects.consultants.create', $data);
    }

    public function store($id)
    {
        $consultants = New Consultant();

        $consultants->project_id = $id;
        $consultants->contact_id = request('contact_id');
        $consultants->role_id = request('role_id');

        $consultants->save();

        if (request('kap_display_name') != NULL) {
            $display_name = request('kap_display_name');
            $approved_date = request('kap_approved_date');
            $expiry_date = request('kap_expiry_date');
            $reminder_date = request('kap_reminder_date');

            for($i = 0; $i < count($display_name); $i++) {
                $kap = new KeyApprovedPlan;

                $kap->consultant_id = $consultants->id;
                $kap->display_name = $display_name[$i];
                $kap->approved_date = $approved_date[$i];
                $kap->expiry_date = $expiry_date[$i];
                $kap->reminder_date = $reminder_date[$i];

                if ($kap->save()) {
                    $activitylog = New ActivityLog();
        
                    $activitylog->user_id = Auth::id();
                    $activitylog->name = $display_name[$i];
                    $activitylog->class = "Consultant/Key Approved Plan";
                    $activitylog->action = "Add";
        
                    $activitylog->save();
                }
            }
        }

        return redirect()->route('projects.consultants.index', $id);
    }

    public function show($project_id, $consultant_id)
    {
        $consultant = Consultant::findOrFail($consultant_id);

        $data = compact(
            'consultant'
        );
        
        return view('projects.consultants.show', $data);
    }

    public function edit($project_id, $consultant_id)
    {
        $consultant = Consultant::findOrFail($consultant_id);

        $roles = ConsultantRole::pluck('type','id');
        $contacts = Contact::pluck('name','id');

        $data = compact(
            'consultant',
            'roles',
            'contacts'
        );
        
        return view('projects.consultants.edit', $data);
    }

    public function update($project_id, $consultant_id)
    {
        $consultant = Consultant::findOrFail($consultant_id);

        $consultant->project_id = $project_id;
        $consultant->contact_id = request('contact_id');
        $consultant->role_id = request('role_id');

        $consultant->save();

        if (request('kap_display_name') != NULL) {
            $display_name = request('kap_display_name');
            $approved_date = request('kap_approved_date');
            $expiry_date = request('kap_expiry_date');
            $reminder_date = request('kap_reminder_date');

            for($i = 0; $i < count($display_name); $i++) {
                $kap = new KeyApprovedPlan;

                $kap->consultant_id = $consultant->id;
                $kap->display_name = $display_name[$i];
                $kap->approved_date = $approved_date[$i];
                $kap->expiry_date = $expiry_date[$i];
                $kap->reminder_date = $reminder_date[$i];

                if ($kap->save()) {
                    $activitylog = New ActivityLog();
        
                    $activitylog->user_id = Auth::id();
                    $activitylog->name = $display_name[$i];
                    $activitylog->class = "Consultant/Key Approved Plan";
                    $activitylog->action = "Add";
        
                    $activitylog->save();
                }
            }
        }

        return redirect()->route('projects.consultants.index', $project_id);
    }

    public function destroy($project_id, $consultant_id)
    {
        $consultant = Consultant::findOrFail($consultant_id);
        if ($consultant->delete()) {
            $activitylog = New ActivityLog();

            $activitylog->user_id = Auth::id();
            $activitylog->name = $consultant->contact->name;
            $activitylog->class = "Consultant";
            $activitylog->action = "Delete";

            $activitylog->save();
        }

        
        return redirect()->route('projects.consultants.index', $project_id);
    }
}