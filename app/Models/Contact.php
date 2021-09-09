<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'nric',
        'race',
        'address',
        'contact_no',
        'home_phone',
        'office_phone',
        'fax_phone',
        'email',
        'remark'
    ];


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
