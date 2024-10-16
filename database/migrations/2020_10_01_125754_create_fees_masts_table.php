<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_masts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fees_name',150)->nullable();
            $table->string('header_name_to_be_display_reci',150)->nullable();
            $table->decimal('fees_amt',9,2)->nullable();
            $table->integer('receipt_head_id')->nullable();
            $table->string('currency_code')->nullable();
            $table->integer('no_of_instalment')->nullable();
            $table->integer('courseselection')->nullable();
            $table->decimal('discount',9,2)->nullable();
            $table->boolean('refundable')->default(1);
            $table->integer('is_fees_student_assign')->nullable();
            $table->string('gender',2)->nullable();
            $table->integer('cast_category')->nullable();
            $table->integer('rte_status')->nullable();
            $table->integer('feesfor')->nullable();
            $table->integer('course_batches')->nullable();
            // $table->boolean('fees_student_assign')->default(1);
            // $table->decimal('due_fees',9,2)->nullable();
            // $table->integer('class_id')->nullable();
            // $table->integer('batch_id')->nullable();
            // $table->integer('section_id')->nullable();
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
        Schema::dropIfExists('fees_masts');
    }
}
