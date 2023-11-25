<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanMaster extends Model
{
    use HasFactory;

    public function leads()
    {
    	return $this->hasMany('App\Models\LoanApplication','type','id');
    }
}
