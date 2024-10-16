<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesHeadTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_head_trans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fees_head_mast_id')->nullable();
            $table->integer('fees_head_id')->nullable();
            $table->decimal('amount',9,2)->nullable();
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
        Schema::dropIfExists('fees_head_trans');
    }
}
