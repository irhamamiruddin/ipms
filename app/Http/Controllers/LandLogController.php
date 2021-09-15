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

    public function store(Request $request, $id)
    {
        $land = Land::findOrFail($id);

        $land->logs()->create($request->all());
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('log_desc'),
            'class' => 'Land Log',
            'action' => 'Add',
        ]);

        return redirect()->route('lands.logs.index', $id)->with('success','Created Successfully!');
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

    public function update(Request $request, $land_id, $log_id)
    {
        $log = LandLog::findOrFail($log_id);

        $log->update($request->all());

        ActivityLog::create([
            'user_id' => Auth::id(),
            'name' => $request->input('log_desc'),
            'class' => 'Land Log',
            'action' => 'Update',
        ]);

        return redirect()->route('lands.logs.index', $land_id)->with('success','Edit Successfully!');
    }

    public function destroy($land_id,$log_id)
    {
        $log = LandLog::findOrFail($log_id);
        
        if ($log->delete()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'name' => $log->log_desc,
                'class' => 'Land Log',
                'action' => 'Delete',
            ]);
        } else {
            return back()->withErrors('Deletion Failed!');
        }

        return redirect()->route('lands.logs.index', $land_id)->with('success','Deleted!');
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
