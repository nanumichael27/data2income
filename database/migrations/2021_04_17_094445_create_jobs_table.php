<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('timescompleted')->default(0);
            $table->integer('maximum')->default(100);
            $table->string('category');
            $table->string('title')->default('Job');
            $table->string('social_profile_link')->nullable();
            $table->string('social_username')->nullable();
            $table->string('link')->nullable();
            $table->float('amount');
            $table->string('description')->nullable();
            $table->string('status')->nullable()->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
