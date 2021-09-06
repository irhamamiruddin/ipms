<?php

namespace App\Exports;

use App\Models\LandLog;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LandLogFromView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reports.exports.land_logs', [
            'land_logs' => LandLog::all()
        ]);
    }
}
