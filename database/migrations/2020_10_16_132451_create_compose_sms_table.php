<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposeSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compose_sms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 11)->nullable();
            $table->string('class_id', 11)->nullable();
            $table->string('section_id',11)->nullable();
            $table->string('batch_id', 11)->nullable();
            $table->text('compose_sms_content')->nullable();
            $table->text('student_ids')->nullable();
            $table->text('staff_ids')->nullable();
            $table->string('sender_type', 30)->nullable();
            $table->text('reciver_id')->nullable();
            $table->string('status', 1)->default(1);
            
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
        Schema::dropIfExists('compose_sms');
    }
}
