<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('dob');
            $table->char('gender', 7)->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('state_of_residence')->nullable();
            $table->string('country')->nullable();
            $table->string('nationality')->nullable();
            $table->string('profile_pic')->default('avatar.png')->nullable();
            $table->string('identification')->nullable();
            $table->string('ref_code')->unique()->nullable();
            $table->string('ref_link')->unique()->nullable();
            $table->string('ref_by')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('bank_account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_beneficiary_name')->nullable();
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
