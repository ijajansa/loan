<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    protected $fillable = [
    		'first_name',
            'middle_name',
            'last_name',
            'dob',
            'requested_amount',
            'requested_duration',
            'type',
            'email',
            'mobile_number',
            'pan_number',
            'employment_type',
            'company_name',
            'company_type',
            'income_salary',
            'residence_pincode',
            'permanent_pincode',
            'loan_mode',
            'step',
            'agent_id'
    ];

    public function agents()
    {
        return $this->belongsTo('App\Models\User','agent_id','id');
    }
}
