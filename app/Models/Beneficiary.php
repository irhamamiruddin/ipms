<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiary extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'land_id',
        'type',
        'item_id',
        'share',
        'total_share',
        'remarks'
    ];


    protected $table = 'beneficiaries';

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact', 'item_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'item_id');
    }
}
