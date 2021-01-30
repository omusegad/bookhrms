<?php

namespace App\Models;

use App\Models\Region;
use App\Models\Dccregions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employees extends Model
{
    use HasFactory;
    public $table = 'employees';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

    public function region() {
        return $this->hasOne(Region::class, 'aic_regions_id');
    }

    public function dcc(){
        return $this->hasOne(Dccregions::class, 'aic_dccs_id');
    }
    public function lcc(){
        return $this->hasOne(Lccregions::class, 'aic_lccs_id');
    }
}
