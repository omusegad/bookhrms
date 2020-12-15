<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    public $table = 'aic_leave_type';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];
}
