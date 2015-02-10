<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantManagementRl extends Migration {

    public function up()
    {
        Schema::create('applicant', function(Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->date('reg_date');
            $table->dateTime('last_visit');
            $table->string('ip_address', 16);
            $table->string('verified_code', 64);
            $table->string('csrf_token', 64);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('applicant_profile', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->string('phone',16);
            $table->date('date_of_birth');
            $table->string('place_of_birth', 128);
            $table->string('gender',64);
            $table->string('profile_image',128);
            $table->string('city',32);
            $table->string('state',32);
            $table->unsignedInteger('country_id')->nullable();
            $table->integer('zip_code', false, 5);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('applicant_profile', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
            $table->foreign('country_id')->references('id')->on('country');
        });


        Schema::create('applicant_meta', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->string('fathers_name',64);
            $table->string('mothers_name',64);
            $table->string('fathers_occupation',64);
            $table->string('fathers_phone',16);
            $table->tinyInteger('freedom_fighter',false, 1);
            $table->string('mothers_occupation',64);
            $table->string('mothers_phone',16);
            $table->string('national_id',16);
            $table->string('driving_licence',16);
            $table->string('passport',16);
            $table->string('place_of_birth',64);
            $table->string('marital_status',64);
            $table->string('nationality',64);
            $table->string('religion',64);
            $table->string('signature',128);
            $table->text('present_address');
            $table->text('permanent_address');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('applicant_meta', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
        });


        Schema::create('applicant_academic_record', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->enum('level_of_education',array(
                'psc', 'jsc', 'ssc', 'hsc', 'grad', 'under_grad', 'bachelor', 'diploma', 'post_grad', 'o_level', 'a_level'
            ));
            $table->string('degree_name',64);
            $table->string('institute_name',128);
            $table->enum('board_type',array(
                'board', 'university', 'other'
            ));
            $table->string('board_university',128);
            $table->string('academic_group',32);
            $table->string('major_subject',64);
            $table->enum('result_type',array(
                'division', 'gpa'
            ));
            $table->string('result',64);
            $table->decimal('gpa', 3,2);
            $table->decimal('gpa_scale', 3, 2);
            $table->string('registration_number', 64);
            $table->string('roll_number', 64);
            $table->enum('education_medium', array(
                'english', 'bangla'
            ));
            $table->enum('study_at', array(
                'national', 'abroad'
            ));
            $table->tinyInteger('year_of_passing', false, 4);
            $table->string('duration',64);
            $table->string('certificate',64);
            $table->string('transcript',128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('applicant_academic_record', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
        });


        Schema::create('applicant_miscellaneous_info', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->tinyInteger('ever_admit_this_university', false, 1);
            $table->tinyInteger('ever_dismiss', false, 1);
            $table->tinyInteger('academic_honors_received', false, 1);
            $table->tinyInteger('ever_admit_other_university', false, 1);
            $table->string('admission_test_center',128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('applicant_miscellaneous_info', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
        });


        Schema::create('applicant_extra_curricular_activity', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->string('title', 128);
            $table->text('description');
            $table->string('achievement', 128);
            $table->string('certificate_medal', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('applicant_extra_curricular_activity', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
        });


        Schema::create('applicant_supporting_doc', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->string('academic_goal_statement', 128);
            $table->string('essay', 128);
            $table->string('letter_of_intent', 128);
            $table->string('personal_statement', 128);
            $table->string('research_statement', 128);
            $table->string('portfolio', 128);
            $table->string('resume', 128);
            $table->string('readmission_personal_details', 128);
            $table->string('other', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('applicant_supporting_doc', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
        });


        Schema::create('applicant_reset_password', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->dateTime('reset_password_time');
            $table->dateTime('reset_password_expire');
            $table->string('reset_password_token');
            $table->tinyInteger('status', false, 1);
            $table->integer('created_by', false);
            $table->integer('updated_by', false);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('applicant_reset_password', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
        });

    }


    public function down()
    {
        Schema::drop('applicant');
        Schema::drop('applicant_profile');
        Schema::drop('applicant_meta');
        Schema::drop('applicant_academic_record');
        Schema::drop('applicant_miscellaneous_info');
        Schema::drop('applicant_extra_curricular_activity');
        Schema::drop('applicant_supporting_doc');
        Schema::drop('applicant_reset_password');
    }

}
