<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_flag',2)->nullable();
            $table->string('status',3)->default(1);
            $table->string('parent_id',11)->nullable();
            $table->string('mobile_no',12)->nullable();
            $table->string('alternative_mo_no',12)->nullable();
            $table->string('photo',255)->nullable();
            $table->string('country_id',11)->nullable();
            $table->string('state_id',11)->nullable();
            $table->string('city_id',11)->nullable();
            $table->string('zip_code',11)->nullable();
            $table->string('dob',20)->nullable();
            $table->string('message_sent',2)->default(0);
            $table->string('compose_message_sent',2)->default(0);
            $table->softDeletes();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
