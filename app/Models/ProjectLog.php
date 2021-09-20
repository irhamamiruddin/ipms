<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nature',
        'log_date',
        'log_desc',
        'level_1',
        'level_2',
        'level_3',
        'report',
        'reminder_date',
        'reminder_date_noty'
    ];

    protected $table = 'project_logs';

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
