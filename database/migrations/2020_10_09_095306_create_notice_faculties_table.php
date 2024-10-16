<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_faculties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 11)->nullable();
            $table->string('notice_circular_id', 11)->nullable();
            $table->string('notice_faculty_id',11)->nullable();
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
        Schema::dropIfExists('notice_faculties');
    }
}
