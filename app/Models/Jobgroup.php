<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobgroup extends Model
{
    use HasFactory;
    public $table = 'aic_jobgroups';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

}
