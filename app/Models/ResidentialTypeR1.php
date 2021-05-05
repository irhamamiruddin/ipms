<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResidentialTypeR1 extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'residential_type_r1';
}
