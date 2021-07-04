<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    public $table = 'salaries';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];


    /**
     * Get the user that owns the Salary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
