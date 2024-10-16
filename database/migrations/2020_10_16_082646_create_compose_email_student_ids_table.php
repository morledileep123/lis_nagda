<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposeEmailStudentIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compose_email_student_ids', function (Blueprint $table) {
            $table->string('compose_email_id', 11)->nullable();
            $table->string('students_id', 11)->nullable();
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
        Schema::dropIfExists('compose_email_student_ids');
    }
}
