<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Land;
use App\Models\LandLog;
use App\Models\LogNature;
use App\Models\LogLevel1;
use App\Models\LogLevel2;
use App\Models\LogLevel3;
use App\Models\ActivityLog;
use Auth;


class LandLogController extends Controller
{
    public function index($id)
    {
        $land = Land::findOrFail($id);

        $data = compact(
            'land'
        );
        
        return view('lands.logs.index', $data);
    }

    public function create($id)
    {
        $land = Land::findOrFail($id);

        $nature = LogNature::pluck('nature','nature');
        $level_1 = LogLevel1::all();
        $level_2 = LogLevel2::all();
        $level_3 = LogLevel3::all();

        $data = compact(
            'land',
            'nature',
            'level_1',
            'level_2',
            'level_3'
        );
        
        return view('lands.logs.create', $data);
    }

    public function store($id)
    {
        $logs = New LandLog();

        $logs->land_id = $id;
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
            $activitylog->class = "Land Log";
            $activitylog->action = "Add";

            $activitylog->save();
        }

        return redirect()->route('lands.logs.index', $id);
    }

    public function show($land_id, $log_id)
    {
        $log = Landlog::findOrFail($log_id);

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
        
        return view('lands.logs.show', $data);
    }

    public function edit($land_id,$log_id)
    {
        $land = Land::findOrFail($land_id);
        $log = LandLog::findOrFail($log_id);

        $nature = LogNature::pluck('nature','nature');
        $level_1 = LogLevel1::all();
        $level_2 = LogLevel2::all();
        $level_3 = LogLevel3::all();

        $data = compact(
            'land',
            'log',
            'nature',
            'level_1',
            'level_2',
            'level_3'
        );
        
        return view('lands.logs.edit', $data);
    }

    public function update($land_id,$log_id)
    {
        $log = LandLog::findOrFail($log_id);

        $log->land_id = $land_id;
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
            $activitylog->class = "Land Log";
            $activitylog->action = "Update";

            $activitylog->save();
        }

        return redirect()->route('lands.logs.index', $land_id);
    }

    public function destroy($land_id,$log_id)
    {
        $log = LandLog::findOrFail($log_id);
        if ($log->delete()) {
            $activitylog = New ActivityLog();

            $activitylog->user_id = Auth::id();
            $activitylog->name = $log->log_desc;
            $activitylog->class = "Land Log";
            $activitylog->action = "Delete";

            $activitylog->save();
        }

        
        return redirect()->route('lands.logs.index', $land_id);
    }

    public function update_report($land_id, $log_id){
        $log = LandLog::findOrFail($log_id);

        $log->report = request('report');
        $log->save();

        return redirect()->route('lands.logs.index', $land_id);
    }

    public function update_noty($land_id, $log_id) {
        $log = LandLog::findOrFail($log_id);

        $log->reminder_date_noty = request('reminder_date_noty');
        $log->save();

        return redirect()->route('lands.logs.index', $land_id);
    }
}
