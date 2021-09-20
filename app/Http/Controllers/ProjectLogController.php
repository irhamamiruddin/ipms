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

    public function store(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->logs()->create($request->all());
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('log_desc'),
            'class' => 'Project Log',
            'action' => 'Add',
        ]);

        return redirect()->route('projects.logs.index', $id)->with('success','Created Successfully!');
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

    public function update(Request $request, $project_id, $log_id)
    {
        $log = ProjectLog::findOrFail($log_id);

        $log->update($request->all());

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('log_desc'),
            'class' => 'Project Log',
            'action' => 'Update',
        ]);
        
        return redirect()->route('projects.logs.index', $project_id)->with('success','Edited Successfully!');
    }

    public function destroy($project_id, $log_id)
    {
        $log = ProjectLog::findOrFail($log_id);
        if ($log->delete()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $log->log_desc,
                'class' => 'Project Log',
                'action' => 'Delete',
            ]);
        }
        
        return redirect()->route('projects.logs.index', $project_id)->with('success','Deleted!');
    }

    public function update_report($project_id, $log_id){
        $log = ProjectLog::findOrFail($log_id);

        $log->report = request('report');
        $log->save();

        return redirect()->route('projects.logs.index', $project_id);
    }

    public function update_noty($project_id, $log_id) {
        $log = ProjectLog::findOrFail($log_id);

        $log->reminder_date_noty = request('reminder_date_noty');
        $log->save();

        return redirect()->route('projects.logs.index', $project_id);
    }
}
