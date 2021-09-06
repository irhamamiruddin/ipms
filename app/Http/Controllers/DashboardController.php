<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandLog;
use App\Models\ProjectLog;
use App\Models\KeyApprovedPlan;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = date('Y-m-d');
        $expiringLands = DB::table('lands')
        ->where('expiry_date', '>=', $today)
        ->where('expiry_date_noty', '=', '1')
        ->orderBy('expiry_date', 'asc')
        ->get();

        $annualRentNextPaid = DB::table('lands')
        ->where('annual_rent_next_paid_date', '>=', $today)
        ->where('annual_rent_next_paid_date_noty', '=', '1')
        ->orderBy('annual_rent_next_paid_date', 'asc')
        ->get();

        $landLogs = LandLog::with('land')
        ->where('reminder_date', '>=', $today)
        ->where('reminder_date_noty', '=', '1')
        ->orderBy('reminder_date', 'asc')
        ->get();

        $expiring_kaps = KeyApprovedPlan::with('consultant')
        ->where('reminder_date', '>=', $today)
        ->where('reminder_date_noty', '=', '1')
        ->orderBy('reminder_date', 'asc')
        ->get();

        $projectLogs = ProjectLog::with('project')
        ->where('reminder_date', '>=', $today)
        ->where('reminder_date_noty', '=', '1')
        ->orderBy('reminder_date', 'asc')
        ->get();
        
        $data = compact(
            'expiringLands',
            'annualRentNextPaid',
            'landLogs',
            'expiring_kaps',
            'projectLogs'
        );

        // return $landLogs;
        return view('dashboard', $data);
    }
}
