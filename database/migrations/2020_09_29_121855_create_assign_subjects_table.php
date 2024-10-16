<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_subjects', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('user_id', 11)->nullable();
            $table->string('std_class_id',11)->nullable();
            $table->string('batch_id',11)->nullable();
            $table->string('section_id',11)->nullable();
            $table->text('mendatory_subject_id')->nullable();
            $table->text('optional_subject_id')->nullable();
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
        Schema::dropIfExists('assign_subjects');
    }
}
