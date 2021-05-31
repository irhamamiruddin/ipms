<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Land extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function registered_proprietors()
    {
        return $this->hasMany('App\Models\RegisteredProprietor', 'land_id');
    }

    public function nominees()
    {
        return $this->hasMany('App\Models\Nominee', 'land_id');
    }

    public function trustees()
    {
        return $this->hasMany('App\Models\Trustee', 'land_id');
    }

    public function beneficiaries()
    {
        return $this->hasMany('App\Models\Beneficiary', 'land_id');
    }

    public function classifications()
    {
        return $this->belongsTo('App\Models\LandClassification', 'classification');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function agreement()
    {
        return $this->belongsToMany('App\Models\RegisteredProprietorNature', 'agreement_land',
        'land_id', 'registered_proprietor_nature_id')
        ->withPivot(
            'signing_date',
            'stamping_date',
            'expiry_date',
            'reminder_period',
            'reminder_date',
            'reminder_noty',
            's_p_price',
            'consideration'
        );
    }

    public function consent()
    {
        return $this->belongsToMany('App\Models\Consent', 'consent_land',
        'land_id', 'consent_id')
        ->withPivot(
            'signing_date',
            'stamping_date',
            'instrument_no',
            'instrument_registered_date'
        );
    }
    
    public function officer_in_charge()
    {
        return $this->belongsToMany('App\Models\User', 'land_officer_in_charge', 
        'land_id', 'user_id');
    }

    public function relief_officer_in_charge()
    {
        return $this->belongsToMany('App\Models\User', 'land_relief_officer_in_charge', 
        'land_id', 'user_id');
    }

    public function ketua_kampung()
    {
        return $this->belongsToMany('App\Models\Contact', 'land_ketua_kampung', 
        'land_id', 'contact_id')->withPivot('remark');
    }
}
