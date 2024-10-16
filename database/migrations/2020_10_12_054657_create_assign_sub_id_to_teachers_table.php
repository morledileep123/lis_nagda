<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubIdToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_sub_id_to_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('assign_subject_teacher_id',11)->nullable();
            $table->string('assign_subject_id',11)->nullable();
            $table->string('status',2)->default(1);
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
        Schema::dropIfExists('assign_sub_id_to_teachers');
    }
}
