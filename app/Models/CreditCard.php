<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
	use HasFactory;
	protected $fillable = [
		'first_name',
		'last_name',
		'mobile_number',
		'email',
		'gender',
		'dob',
		'qualification',
		'current_pincode',
		'permanent_pincode',
		'office_pincode',
		'income_salary',
		'existing_card',
		'pan_number',
		'employment_type',
		'profession',
		'company_name',
		'designation',
		'mother_name',
		'loan_mode',
		'step',
		'status',
		'agent_id',
		'dsa_id',
		'created_at',
		'updated_at'
	];

	public function agents()
    {
        return $this->belongsTo('App\Models\User','agent_id','id');
    }
}
