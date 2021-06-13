<?php

namespace App\Models;

use App\Models\LeaveApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employees extends Model
{
    use HasFactory;
    public $table = 'employees';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

}
