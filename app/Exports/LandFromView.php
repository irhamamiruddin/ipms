<?php

namespace App\Exports;

use App\Models\Land;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LandFromView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('lands.export', [
            'lands' => Land::all()
        ]);
    }
}
