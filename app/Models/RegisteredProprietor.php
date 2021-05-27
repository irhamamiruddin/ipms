<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisteredProprietor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'registered_proprietors';

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact', 'item_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'item_id');
    }
}
