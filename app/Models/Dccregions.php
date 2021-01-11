<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dccregions extends Model
{
    use HasFactory;
    public $table = 'aic_dccs';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

    // public function dccRegions()
    // {
    //     return $this->hasMany(Dccregions::class);
    // }

    public function region()
    {
        return $this->hasMany(Region::class);
    }
    
}
