<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('name',50)->nullable();
            // $table->string('user_id', 11)->nullable();
            // $table->string('email',50)->nullable();
            $table->string('id',11)->nullable();
            $table->string('user_id',11)->nullable();
            // $table->string('status',3)->default(1)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('teachers');
    }
}
