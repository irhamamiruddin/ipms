<?php

namespace App\Exports;

use App\Models\Land;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LandOwnershipFromView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reports.exports.land_ownerships', [
            'lands' => Land::all()
        ]);
    }
}
