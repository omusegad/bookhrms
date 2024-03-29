<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded  = [
        'id','created_at','updated_at'
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

    public function region(){
        return $this->belongsTo(Region::class, 'aic_regions_id', 'id');
    }

    public function dcc(){
        return $this->belongsTo(Dccregions::class, 'aic_dccs_id', 'id');
    }

    public function lcc(){
        return $this->belongsTo(Lccregions::class, 'aic_lccs_id', 'id');
    }
    public function jobgroup(){
        return $this->belongsTo(Jobgroup::class, 'aic_jobgroups_id', 'id');
    }



}
