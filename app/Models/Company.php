<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'business_nature_id',
        'company_name',
        'company_no',
        'principle_name',
        'registered_person_no',
        'address',
        'phone',
        'email',
        'banker',
        'bank_ac_no',
        'home_phone',
        'office_phone',
        'fax_phone',
        'website_url',
        'remark'
    ];

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