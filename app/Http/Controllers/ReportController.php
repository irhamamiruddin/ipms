<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandLog;
use App\Models\ProjectLog;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
}
