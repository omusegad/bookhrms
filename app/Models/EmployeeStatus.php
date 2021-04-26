<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model{
    use HasFactory;
    use HasFactory;
    public $table = 'employee_status';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];
}
