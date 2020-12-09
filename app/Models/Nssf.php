<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nssf extends Model
{
    use HasFactory;
    public $table = 'aic_nssf_details';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];
}
}
