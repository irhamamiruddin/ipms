<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'project_logs';

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
