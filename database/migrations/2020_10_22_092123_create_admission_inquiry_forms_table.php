<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionInquiryFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_inquiry_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('your_name', 111)->nullable();
            $table->string('your_email',30)->nullable();
            $table->string('child_name', 111)->nullable();
            $table->string('child_age', 2)->nullable();
            $table->string('child_class', 11)->nullable();
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
        Schema::dropIfExists('admission_inquiry_forms');
    }
}
