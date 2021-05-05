<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CategoriesOfLand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories_of_land';
}
