<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeDdTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_dd_trans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_fees_pay_id')->nullable();
            $table->string('cheque_dd_number',100)->nullable();
            $table->string('cheque_dd_bank',100)->nullable();
            $table->string('cheque_dd_no_of',100)->nullable();
            $table->integer('cheque_dd_status')->nullable();
            $table->decimal('cheque_dd_amount',9,2)->nullable();
            $table->date('cheque_dd_date')->nullable();
            $table->string('payee_name',100)->nullable();
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
        Schema::dropIfExists('cheque_dd_trans');
    }
}
