<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Library extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function lib_type()
    {
        return $this->belongsTo('App\Models\LibraryType', 'type');
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }

}
