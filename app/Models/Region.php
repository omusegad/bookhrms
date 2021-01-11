<?php

namespace App\Models;

use App\Models\Dccregions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;
    public $table = 'aic_regions';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

  

}
