<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesHeadMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_head_masts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100)->nullable();
            $table->decimal('amount',9,2)->nullable();
            $table->string('head_type')->nullable();
            $table->integer('head_sq_no')->nullable();
            $table->string('refundable_status')->nullable();
            $table->integer('instalment_applicable_status')->nullable();
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('fees_head_masts');
    }
}
