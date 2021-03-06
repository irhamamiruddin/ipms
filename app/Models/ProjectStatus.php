<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'project_status_tb';

    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'project_status_id');
    }
}