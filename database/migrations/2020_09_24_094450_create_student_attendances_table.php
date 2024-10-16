<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_id', 11)->nullable();
            $table->string('user_id', 11)->nullable();
            $table->string('present', 3)->nullable();
            $table->string('submitted_by', 11)->nullable();
            $table->dateTime('attendance_date')->nullable();
            $table->dateTime('in_time')->nullable();
            $table->date('out_time')->nullable();
            $table->dateTime('staying_hour')->nullable();
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
        Schema::dropIfExists('student_attendances');
    }
}
