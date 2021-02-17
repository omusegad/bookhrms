<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LeaveApplication extends Model
{
    use HasFactory;
    public $table = 'aic_leave_applications';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

   public function leavetype()
   {
       return $this->belongsTo(LeaveType::class, 'aic_leave_type_id', 'id');
   }



}
