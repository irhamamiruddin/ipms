<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandClassification extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function lands()
    {
        return $this->hasMany('App\Models\Land', 'classification');
    }
}
