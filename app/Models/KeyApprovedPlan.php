<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeyApprovedPlan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'key_approved_plans';

    public function consultant()
    {
        return $this->belongsTo('App\Models\Consultant', 'consultant_id');
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }
}