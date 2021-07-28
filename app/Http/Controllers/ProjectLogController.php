<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectLog;
use App\Models\LogNature;
use App\Models\LogLevel1;
use App\Models\LogLevel2;
use App\Models\LogLevel3;
use App\Models\ActivityLog;
use Auth;


class ProjectLogController extends Controller
{
    public function index($id)
    {
        $project = Project::findOrFail($id);

        $data = compact(
            'project'
        );
        
        return view('projects.logs.index', $data);
    }

    public function create($id)
    {
        $project = Project::findOrFail($id);

        $nature = LogNature::pluck('nature','nature');
        $level_1 = LogLevel1::all();
        $level_2 = LogLevel2::all();
        $level_3 = LogLevel3::all();

        $data = compact(
            'project',
            'nature',
            'level_1',
            'level_2',
            'level_3'
        );
        
        return view('projects.logs.create', $data);
    }

    public function store($id)
    {
        $logs = New ProjectLog();

        $logs->project_id = $id;
        $logs->nature = request('nature');
        $logs->log_date = request('log_date');
        $logs->log_desc = request('log_desc');
        $logs->level_1 = request('level_1');
        $logs->level_2 = request('level_2');
        $logs->level_3 = request('level_3');
        $logs->reminder_date = request('reminder_date');

        if ($logs->save()) {
            $activitylog = New ActivityLog();

            $activitylog->user_id = Auth::id();
            $activitylog->name = request('log_desc');
            $activitylog->class = "Project Log";
            $activitylog->action = "Add";

            $activitylog->save();
        }

        return redirect()->route('projects.logs.index', $id);
    }

    public function show($project_id, $log_id)
    {
        $log = ProjectLog::findOrFail($log_id);

        $natures = LogNature::all();
        $level_1 = LogLevel1::all();
        $level_2 = LogLevel2::all();
        $level_3 = LogLevel3::all();

        $data = compact(
            'log',
            'natures',
            'level_1',
            'level_2',
            'level_3'
        );
        
        return view('projects.logs.show', $data);
    }

    public function edit($project_id, $log_id)
    {
        $project = Project::findOrFail($project_id);
        $log = ProjectLog::findOrFail($log_id);

        $nature = LogNature::pluck('nature','nature');
        $level_1 = LogLevel1::all();
        $level_2 = LogLevel2::all();
        $level_3 = LogLevel3::all();

        $data = compact(
            'project',
            'log',
            'nature',
            'level_1',
            'level_2',
            'level_3'
        );
        
        return view('projects.logs.edit', $data);
    }

    public function update($project_id, $log_id)
    {
        $log = ProjectLog::findOrFail($log_id);

        $log->project_id = $project_id;
        $log->nature = request('nature');
        $log->log_date = request('log_date');
        $log->log_desc = request('log_desc');
        $log->level_1 = request('level_1');
        $log->level_2 = request('level_2');
        $log->level_3 = request('level_3');
        $log->reminder_date = request('reminder_date');

        if ($log->save()) {
            $activitylog = New ActivityLog();

            $activitylog->user_id = Auth::id();
            $activitylog->name = request('log_desc');
            $activitylog->class = "Project Log";
            $activitylog->action = "Update";

            $activitylog->save();
        }

        return redirect()->route('projects.logs.index', $project_id);
    }

    public function destroy($project_id, $log_id)
    {
        $log = ProjectLog::findOrFail($log_id);
        if ($log->delete()) {
            $activitylog = New ActivityLog();

            $activitylog->user_id = Auth::id();
            $activitylog->name = $log->log_desc;
            $activitylog->class = "Project Log";
            $activitylog->action = "Delete";

            $activitylog->save();
        }

        
        return redirect()->route('projects.logs.index', $project_id);
    }

    public function check_report(){
        $project_id = request('project_id');
        $log_id = request('log_id');
        $log = ProjectLog::findOrFail($log_id);

        $log->report = request('report');
        $log->save();

        return redirect()->route('projects.logs.index', $project_id);
    }
}
