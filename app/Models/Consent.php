<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consent extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function lands()
    {
        return $this->belongsToMany('App\Models\Land', 'consent_land',
        'land_id', 'consent_id')
        ->withPivot(
            'signing_date',
            'stamping_date',
            'instrument_no',
            'instrument_registered_date'
        );
    }
}
