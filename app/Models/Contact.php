<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function companies()
    {
        return $this->belongsToMany('App\Models\Company')
            ->withPivot('role');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withPivot('role');
    }
}
