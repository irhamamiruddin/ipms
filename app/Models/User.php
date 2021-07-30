<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'access_rights',
        'role',
        'role_id',
        'status',
        'superadmin_permission',
        'bp_permission',
        'cp_permission',
        'land_staff_permission',
        'project_staff_permission',
        'manager_permission',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function land_officer_in_charge()
    {
        return $this->belongsToMany('App\Models\Land', 'land_officer_in_charge', 
        'land_id', 'user_id');
    }

    public function land_relief_officer_in_charge()
    {
        return $this->belongsToMany('App\Models\Land', 'land_relief_officer_in_charge', 
        'land_id', 'user_id');
    }

    public function project_officer_in_charge()
    {
        return $this->belongsToMany('App\Models\Project', 'project_officer_in_charge', 
        'project_id', 'user_id');
    }

    public function project_relief_officer_in_charge()
    {
        return $this->belongsToMany('App\Models\Project', 'project_relief_officer_in_charge', 
        'project_id', 'user_id');
    }

    public function contacts()
    {
        return $this->belongsToMany('App\Models\Contact')
            ->withPivot('role');
    }

    public function activity_logs()
    {
        return $this->hasMany('App\Models\ActivityLog', 'user_id');
    }
}