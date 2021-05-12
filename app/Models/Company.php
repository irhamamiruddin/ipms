<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'company_id');
    }

    public function business_natures()
    {
        return $this->belongsTo('App\Models\BusinessNature', 'business_nature_id');
    }

    public function contacts()
    {
        return $this->belongsToMany('App\Models\Contact')
            ->withPivot('role');
    }
}