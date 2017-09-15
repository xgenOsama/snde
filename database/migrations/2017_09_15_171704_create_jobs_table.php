<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('job_title');
            $table->integer('company_id')->unsigned();
            $table->string('mobile');
            $table->string('address');
            $table->text('description');
            $table->dateTime('start_work'); // 24-format not am/pm
            $table->dateTime('end_work'); // 24-format not am/pm
            $table->enum('gender', ['male', 'female']);
            $table->decimal('salary', 9, 3);
            $table->string('skills');
            $table->foreign('company_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
