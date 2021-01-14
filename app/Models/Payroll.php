<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    public $table = 'payroll';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

}
