<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsMastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_masts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 11);
            $table->string('photo', 250)->nullable();
            $table->string('std_id',11)->nullable();
            $table->string('batch_id',11)->nullable();
            $table->string('admision_no',11)->nullable();
            $table->string('section_id',11)->nullable();
            $table->string('f_name',100)->nullable();
            $table->string('m_name',50)->nullable();
            $table->string('l_name',50)->nullable();
            $table->string('s_mobile',12)->nullable();
            $table->string('dob',20)->nullable();
            $table->string('birth_place',100)->nullable();
            $table->string('passout_date',20)->nullable();
            $table->string('dropout_date',20)->nullable();
            $table->string('forward_date',20)->nullable();
            $table->string('email',30)->nullable();
            $table->string('gender',10)->nullable();
            $table->string('reservation_class_id',11)->nullable();
            $table->string('religion_id',50)->nullable();
            $table->string('blood_group_id',11)->nullable();
            $table->string('spec_ailment',50)->nullable();
            $table->string('age',5)->nullable();
            $table->string('nationality_id',50)->nullable();
            $table->string('taluka',50)->nullable();
            $table->string('language_id',11)->nullable();
            $table->string('s_ssmid',20)->nullable();
            $table->string('f_ssmid',20)->nullable();
            $table->string('aadhar_card',20)->nullable();
            $table->string('teacher_ward',20)->nullable();
            $table->string('cbsc_reg',20)->nullable();
            $table->string('addm_date',20)->nullable();
            $table->string('enroll_no',20)->nullable();
            $table->string('roll_no',20)->nullable();
            $table->string('username',50)->nullable();
            $table->string('password',255)->nullable();
            $table->string('prev_school',100)->nullable();
            $table->string('year_of_prev_school',20)->nullable();
            $table->string('prev_school_address',255)->nullable();
            $table->string('acadmic_city_id',11)->nullable();
            $table->string('acadmic_state_id',11)->nullable();
            $table->string('acadmic_pin',10)->nullable();
            $table->string('acadmic_country_id',11)->nullable();
            $table->string('acadmic_cast_id',11)->nullable();
            $table->string('acadmic_attendance_reg_no',50)->nullable();
            $table->string('acadmic_remark',255)->nullable();
            $table->string('p_address',255)->nullable();
            $table->string('p_country_id',11)->nullable();
            $table->string('p_state_id',11)->nullable();
            $table->string('p_city_id',11)->nullable();
            $table->string('p_zip_code',10)->nullable();
            $table->string('l_address',255)->nullable();
            $table->string('l_country_id',11)->nullable();
            $table->string('l_state_id',11)->nullable();
            $table->string('l_city_id',11)->nullable();
            $table->string('l_zip_code',10)->nullable();
            $table->string('bank_name',50)->nullable();
            $table->string('bank_branch',50)->nullable();
            $table->string('account_name',50)->nullable();
            $table->string('account_no',20)->nullable();
            $table->string('ifsc_code',20)->nullable();
            $table->string('status',10)->nullable();
            $table->string('user_status',3)->nullable();
            $table->string('mobile_no',12)->nullable();
            $table->string('students_masts',2)->nullable();
            $table->string('other_language',255)->nullable();
            $table->string('cast',50)->nullable();
            $table->string('admission_status',2)->nullable();
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
        Schema::dropIfExists('students_masts');
    }
}
