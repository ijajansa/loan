<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('first_name');
            $table->text('middle_name')->nullable();
            $table->text('last_name');
            $table->date('dob');
            $table->text('requested_amount');
            $table->text('requested_duration');
            $table->text('type');
            $table->text('email');
            $table->text('mobile_number');
            $table->text('pan_number');
            $table->text('employment_type');
            $table->text('company_name');
            $table->text('company_type');
            $table->text('income_salary');
            $table->text('residence_pincode');
            $table->text('permanent_pincode');
            $table->text('loan_mode');
            $table->text('step');
            $table->integer('agent_id');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_applications');
    }
};
