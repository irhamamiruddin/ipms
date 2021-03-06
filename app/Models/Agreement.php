<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agreement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'agreement_land';

    public function registered_proprietor_nature()
    {
        return $this->belongsTo('App\Models\RegisteredProprietorNature', 'registered_proprietor_nature_id');
    }
}
