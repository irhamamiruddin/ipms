<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'activity_logs';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
