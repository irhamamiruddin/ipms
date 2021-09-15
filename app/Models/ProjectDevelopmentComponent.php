<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDevelopmentComponent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'component_type',
        'type1',
        'type2',
        'type3',
        'units',
        'storeys'
    ];

    protected $table = 'project_development_components';
}
