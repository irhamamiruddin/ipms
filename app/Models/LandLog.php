<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'land_logs';

    public function land()
    {
        return $this->belongsTo('App\Models\Land', 'land_id');
    }
}
