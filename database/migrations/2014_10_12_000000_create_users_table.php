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
            $table->string('name');
            $table->string('email', 250)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('phone')->nullable();
            $table->float('balance')->default(0.00);
            $table->boolean('activated')->default(false);
            $table->string('sex', 10)->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('user_id')->nullable();
            $table->integer('level')->default(1)->nullable();

            // Bank details
            $table->string('bankname')->nullable();
            $table->string('accountname')->nullable();
            $table->string('accountnumber')->nullable();
            $table->string('sortcode')->nullable();
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
