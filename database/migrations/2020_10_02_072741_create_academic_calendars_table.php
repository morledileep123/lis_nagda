<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_calendars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 11)->nullable();
            $table->string('title', 100)->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_upto')->nullable();
            $table->string('is_holiday',3)->default(1)->nullable();
            $table->string('is_exam',3)->default(1)->nullable();
            $table->text('class_ids')->nullable();
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
        Schema::dropIfExists('academic_calendars');
    }
}
