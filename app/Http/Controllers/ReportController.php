<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\LandOwnershipFromView;
use App\Exports\LandLogFromView;
use App\Exports\ProjectLogFromView;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\LandLog;
use App\Models\ProjectLog;
use App\Models\Land;
use App\Models\ActivityLog;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:report-land_log', ['only' => ['land_log']]);
        $this->middleware('can:report-project_log', ['only' => ['project_log']]);
        $this->middleware('can:report-land_ownerships', ['only' => ['land_ownerships']]);
        $this->middleware('can:report-system_log', ['only' => ['system_log']]);
    }

    public function land_log()
    {
        $land_logs = LandLog::all();

        $data = compact(
            'land_logs'
        );
        
        return view('reports.land_logs', $data);
    }

    public function project_log()
    {
        $project_logs = ProjectLog::all();

        $data = compact(
            'project_logs'
        );
        
        return view('reports.project_logs', $data);
    }

    public function land_ownerships()
    {
        $lands = Land::all();

        $data = compact(
            'lands'
        );
        
        return view('reports.land_ownerships', $data);
    }

    public function system_log()
    {
        $logs = ActivityLog::all();

        $data = compact(
            'logs'
        );
        
        return view('reports.system_log', $data);
    }

    public function land_log_export() {
        return Excel::download(new LandLogFromView, 'land_logs.xlsx');
    }

    public function project_log_export() {
        return Excel::download(new ProjectLogFromView, 'project_logs.xlsx');
    }

    public function land_ownerships_export() {
        return Excel::download(new LandOwnershipFromView, 'land_ownerships.xlsx');
    }
}
