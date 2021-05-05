<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherTypeO1 extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'others_type_o1';
}
