<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeCircularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_circulars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 11)->nullable();
            $table->string('circular_title', 100)->nullable();
            $table->string('date_from_display',30)->nullable();
            $table->string('date_to_display',30)->nullable();
            $table->string('file', 255)->nullable();
            $table->text('circular_description')->nullable();
            $table->text('selected_student')->nullable();
            $table->text('class_batch_section_id')->nullable();
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
        Schema::dropIfExists('notice_circulars');
    }
}
