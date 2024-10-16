<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFineTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fine_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fine_type_id')->nullable();
            $table->string('fine_amount_status')->nullable();
            $table->string('fine_type')->nullable();
            $table->string('no_of_days',10)->nullable();
            $table->decimal('fine_amount',9,2)->nullable();
            $table->integer('fees_head_mast_id')->nullable();
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
        Schema::dropIfExists('fine_types');
    }
}
