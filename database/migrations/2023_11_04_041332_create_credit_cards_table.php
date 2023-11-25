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
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('qualification');
            $table->integer('current_pincode');
            $table->integer('permanent_pincode');
            $table->integer('office_pincode');
            $table->integer('income_salary');
            $table->integer('existing_card');
            $table->string('pan_number');
            $table->string('employment_type');
            $table->string('profession');
            $table->string('company_name');
            $table->string('designation');
            $table->string('mother_name');
            $table->string('loan_mode');
            $table->string('step');
            $table->string('status')->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('agent_id');
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
        Schema::dropIfExists('credit_cards');
    }
};
