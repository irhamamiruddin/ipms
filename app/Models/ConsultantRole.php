<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultantRole extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function consultants()
    {
        return $this->hasMany('App\Models\Consultant', 'role_id');
    }
}
