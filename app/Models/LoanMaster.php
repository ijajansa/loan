<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LoanMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function leads()
    {
    	return $this->hasMany('App\Models\LoanApplication','type','id');
    }

    public function commission_details()
    {
    	return $this->hasMany('App\Models\BankCommission','loan_master_id','id');	
    }
}
