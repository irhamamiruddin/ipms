<?php

namespace App\Exports;

use App\Models\ProjectLog;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjectLogFromView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reports.exports.project_logs', [
            'project_logs' => ProjectLog::all()
        ]);
    }
}
