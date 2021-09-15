<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'address'
    ];

    public function dev_components()
    {
        return $this->hasMany('App\Models\ProjectDevelopmentComponent', 'project_id');
    }

    public function logs()
    {
        return $this->hasMany('App\Models\ProjectLog', 'project_id');
    }

    public function lands()
    {
        return $this->hasMany('App\Models\Land', 'project_id');
    }

    public function project_status()
    {
        return $this->belongsTo('App\Models\ProjectStatus', 'project_status_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Models\Company');
    }

    public function officer_in_charge()
    {
        return $this->belongsToMany('App\Models\User', 'project_officer_in_charge', 
        'project_id', 'user_id');
    }

    public function relief_officer_in_charge()
    {
        return $this->belongsToMany('App\Models\User', 'project_relief_officer_in_charge', 
        'project_id', 'user_id');
    }
}
