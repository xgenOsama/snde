<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->enum('account_type', ['admin', 'delegate', 'company', 'user'])->default('user');
            $table->enum('company_type', ['null', 'commercial', 'service', 'advisory'])->default('null');
            $table->string('bank_number');
            $table->string('address');
            $table->string('pay_date')->nullable();
            $table->string('allow_date')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('logo')->nullable();
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
