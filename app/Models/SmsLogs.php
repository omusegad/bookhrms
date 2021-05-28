<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsLogs extends Model
{
    use HasFactory;
    public $table = 'sms_logs';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

}
