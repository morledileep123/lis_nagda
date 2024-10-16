<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsGuardiantMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_guardiant_masts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',11);
            $table->string('s_id',11)->nullable();
            $table->string('relation_id',11)->nullable();
            $table->string('name',11)->nullable();
            $table->string('mobile',11)->nullable();
            $table->string('g_name',100)->nullable();
            $table->string('g_mobile',12)->nullable();
            $table->string('work_status',100)->nullable();
            $table->string('employment_type',100)->nullable();
            $table->string('profession_status',100)->nullable();
            $table->string('employer',100)->nullable();
            $table->string('designation',50)->nullable();
            $table->string('g_check',11)->nullable();
            $table->string('g_id',11)->nullable();
            $table->string('photo',255)->nullable();
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
        Schema::dropIfExists('students_guardiant_masts');
    }
}
