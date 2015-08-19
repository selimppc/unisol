<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdmVDegreeCourse extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement( 'CREATE VIEW adm_v_degree_course AS (
            select `dc`.`id` AS `id`,`dc`.`course_id` AS `course_id`,`dc`.`degree_id` AS `degree_id`,`ba`.`id` AS `batch_id`,`cs`.`title` AS `course`,`cs`.`course_code` AS `course_code`,`cs`.`credit` AS `course_credit`,`dp`.`title` AS `department`,`ct`.`title` AS `course_type` from ((((((`degree_course` `dc` join `degree` `dg` on((`dg`.`id` = `dc`.`degree_id`))) join `batch` `ba` on((`ba`.`degree_id` = `dg`.`id`))) join `course` `cs` on((`cs`.`id` = `dc`.`course_id`))) join `course_type` `ct` on((`ct`.`id` = `cs`.`course_type_id`))) join `department` `dp` on((`dp`.`id` = `dg`.`department_id`))) left join `batch_course` `bc` on(((`bc`.`course_id` = `dc`.`course_id`) and (`bc`.`batch_id` = `ba`.`id`)))) where isnull(`bc`.`id`) order by `dc`.`degree_id`
        ) ' );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
