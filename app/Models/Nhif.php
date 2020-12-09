<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhif extends Model
{
    use HasFactory;
    public $table = 'aic_nhif_details';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];
}

