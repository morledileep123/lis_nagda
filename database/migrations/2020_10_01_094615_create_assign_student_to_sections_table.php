<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignStudentToSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_student_to_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 11)->nullable();
            $table->string('assign_students_id',11)->nullable();
            $table->string('un_assign_students_id',11)->nullable();
            $table->string('course_id',11)->nullable();
            $table->string('batch_id',11)->nullable();
            $table->string('section_id',50)->nullable();
            $table->string('status',3)->default(1);
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
        Schema::dropIfExists('assign_student_to_sections');
    }
}
