<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassBatchSectionGroupMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_batch_section_group_masts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 11)->nullable();
            $table->string('class_id', 11)->nullable();
            $table->string('section_id',11)->nullable();
            $table->string('batch_id', 11)->nullable();
            $table->string('group_name', 100)->nullable();
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
        Schema::dropIfExists('class_batch_section_group_masts');
    }
}
