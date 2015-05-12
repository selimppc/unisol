<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmVDegree extends Migration {


	public function up()
	{
        DB::statement( 'CREATE VIEW adm_v_degree AS
            (
                SELECT
                dg.id 				AS id,
                dg.duration 			AS duration,
                dg.total_credit			AS total_credit,
                dg.policy_retake		AS policy_retake,
                dg.policy_course_taking		AS policy_course_taking,
                dg.credit_min_per_semester 	AS credit_min_per_semester,
                dg.credit_max_per_semester 	AS credit_max_per_semester,
                CONCAT(dl.code, dgp.code, " in ", dp.code) AS title,
                dpt.title			AS dept_title


                FROM degree dg
                JOIN degree_level dl ON dl.id = dg.degree_level_id
                JOIN degree_program dp ON dp.id = dg.degree_program_id
                JOIN degree_group dgp ON dgp.id = dg.degree_group_id
                JOIN department dpt ON dpt.id = dg.department_id

                ORDER BY dg.id

                )
        ' );
	}


	public function down()
	{
		//
	}

}
