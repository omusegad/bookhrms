<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    public $table = 'employee_salary';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'id');
    }
}
