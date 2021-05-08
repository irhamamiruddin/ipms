<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessNature extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function companies()
    {
        return $this->hasMany('App\Models\Company', 'business_nature_id');
    }
}
