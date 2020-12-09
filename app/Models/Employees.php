<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    public $table = 'employees';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];
}
