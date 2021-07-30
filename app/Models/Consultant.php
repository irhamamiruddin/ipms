<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultant extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function key_approved_plans()
    {
        return $this->hasMany('App\Models\KeyApprovedPlan', 'consultant_id');
    }

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact', 'contact_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\ConsultantRole', 'role_id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($consultant) { // before delete() method call this
             $consultant->key_approved_plans()->each(function($kap) {
                $kap->delete(); // <-- direct deletion
             });
             // do the rest of the cleanup...
        });
    }

    protected $table = 'consultants';
}
