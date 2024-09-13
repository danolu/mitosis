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
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('previous_email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('phone', 18);  
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->string('language')->default('en-gb');
            $table->string('profile_photo')->nullable();
            $table->string('bank_name')->nullable();
            $table->unsignedBigInteger('account_number')->nullable();
            $table->unsignedBigInteger('routing_number')->nullable();
            $table->string('paypal')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('wallet_address')->nullable();
            $table->ipAddress('ip_address')->nullable();            
            $table->unsignedBigInteger('balance')->default(0);
            $table->unsignedBigInteger('profits')->default(0);
            $table->unsignedBigInteger('referral_bonus')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->softDeletes();
            $table->unsignedTinyInteger('status')->default(1);            
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
