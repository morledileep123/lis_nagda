<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesInstalmentMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_instalment_masts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('st_date1')->nullable();
            $table->date('ed_date1')->nullable();
            $table->decimal('instalment_amount1',9,2)->nullable();  
            $table->date('st_date2')->nullable();
            $table->date('ed_date2')->nullable();
            $table->decimal('instalment_amount2',9,2)->nullable();  
            $table->date('st_date3')->nullable();
            $table->date('ed_date3')->nullable();
            $table->decimal('instalment_amount3',9,2)->nullable();  
            $table->date('st_date4')->nullable();
            $table->date('ed_date4')->nullable();
            $table->decimal('instalment_amount4',9,2)->nullable();  
            $table->date('st_date5')->nullable();
            $table->date('ed_date5')->nullable();
            $table->decimal('instalment_amount5',9,2)->nullable();  
            $table->date('st_date6')->nullable();
            $table->date('ed_date6')->nullable();
            $table->decimal('instalment_amount6',9,2)->nullable();  
            $table->date('st_date7')->nullable();
            $table->date('ed_date7')->nullable();
            $table->decimal('instalment_amount7',9,2)->nullable();  
            $table->date('st_date8')->nullable();
            $table->date('ed_date8')->nullable();
            $table->decimal('instalment_amount8',9,2)->nullable();  
            $table->date('st_date9')->nullable();
            $table->date('ed_date9')->nullable();
            $table->decimal('instalment_amount9',9,2)->nullable();  
            $table->date('st_date10')->nullable();
            $table->date('ed_date10')->nullable();
            $table->decimal('instalment_amount10',9,2)->nullable();
            $table->date('st_date11')->nullable();
            $table->date('ed_date11')->nullable();
            $table->decimal('instalment_amount11',9,2)->nullable();
            $table->date('st_date12')->nullable();
            $table->date('ed_date12')->nullable();
            $table->decimal('instalment_amount12',9,2)->nullable();
            $table->integer('fees_mast_id')->nullable();
            $table->integer('installment_mode')->nullable();
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
        Schema::dropIfExists('fees_instalment_masts');
    }
}
