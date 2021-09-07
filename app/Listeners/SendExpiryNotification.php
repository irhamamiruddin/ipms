<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;
use Notification;
use App\Notifications\ExpiryNotification;
use DB;
use App\Models\LandLog;
use App\Models\ProjectLog;
use App\Models\KeyApprovedPlan;

class SendExpiryNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

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

        foreach ($expiringLands as $expiringland) {
            $data = [
                'module' => 'Land',
                'name' => $expiringland->land_description,
                'date' => $expiringland->expiry_date
            ];

            Notification::send($user, new ExpiryNotification($data));
        }

        foreach ($annualRentNextPaid as $nextpaid) {
            $data = [
                'module' => 'Annual Payment',
                'name' => $nextpaid->land_description,
                'date' => $nextpaid->annual_rent_next_paid_date
            ];

            Notification::send($user, new ExpiryNotification($data));
        }

        foreach ($landLogs as $log) {
            $data = [
                'module' => 'Land Log',
                'name' => $log->land->land_description,
                'date' => $log->reminder_date
            ];

            Notification::send($user, new ExpiryNotification($data));
        }

        foreach ($expiring_kaps as $expiring_kap) {
            $data = [
                'module' => 'Expiring KAP',
                'name' => $expiring_kap->consultant->project->title,
                'date' => $expiring_kap->expiry_date
            ];

            Notification::send($user, new ExpiryNotification($data));
        }

        foreach ($projectLogs as $log) {
            $data = [
                'module' => 'Project Log',
                'name' => $log->project->title,
                'date' => $log->reminder_date
            ];

            Notification::send($user, new ExpiryNotification($data));
        }
    }
}
