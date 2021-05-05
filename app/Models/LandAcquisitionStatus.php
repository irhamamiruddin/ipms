<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandAcquisitionStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'land_acquisition_status';
}
