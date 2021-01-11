<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyTaxableIncome extends Model
{
    use HasFactory;
    public $table = 'monthly_taxable_income';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];
}
