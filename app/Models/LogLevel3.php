<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogLevel3 extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'log_level_3';
}
