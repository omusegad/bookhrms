<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lccregions extends Model
{
    use HasFactory;
    public $table = 'aic_lccs';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];
}
