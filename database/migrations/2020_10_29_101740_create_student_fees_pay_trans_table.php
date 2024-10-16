<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFeesPayTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fees_pay_trans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('s_id')->nullable();
            $table->integer('student_fees_id')->nullable();
            $table->decimal('total_amnt',9,2)->nullable();
            $table->decimal('fine_amnt',9,2)->nullable();
            $table->decimal('consession_amnt',9,2)->nullable();
            $table->decimal('discount_amnt',9,2)->nullable();
            $table->decimal('paybale_amnt',9,2)->nullable();
            $table->decimal('charges_amnt',9,2)->nullable();
            $table->decimal('excess_amnt',9,2)->nullable();
            $table->integer('payment_mode')->nullable();
            $table->integer('transcation_id')->nullable();
            $table->string('reciept_no',100)->nullable();
            $table->date('date_no')->nullable();
            $table->text('remark')->nullable();
            $table->string('fees_month',20)->nullable();
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
        Schema::dropIfExists('student_fees_pay_trans');
    }
}
