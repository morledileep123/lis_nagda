<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudenstDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studenst_docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 11)->nullable();
            $table->string('s_id',11)->nullable();
            $table->string('doc_title', 50)->nullable();
            $table->text('doc_description')->nullable();
            $table->string('student_doc',250)->nullable();
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
        Schema::dropIfExists('studenst_docs');
    }
}
