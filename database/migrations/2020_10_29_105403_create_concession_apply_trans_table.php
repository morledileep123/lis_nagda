<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcessionApplyTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concession_apply_trans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('class_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('fees_head_mast_id')->nullable();
            $table->integer('conssession_id')->nullable();
            $table->string('status',1)->default(1);
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
        Schema::dropIfExists('concession_apply_trans');
    }
}
