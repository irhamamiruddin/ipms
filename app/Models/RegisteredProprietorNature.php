<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisteredProprietorNature extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function lands()
    {
        return $this->belongsToMany('App\Models\Land', 'agreement_land',
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
}
