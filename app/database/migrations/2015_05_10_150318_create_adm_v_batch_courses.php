<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmVBatchCourses extends Migration {

	public function up()
	{
        DB::statement( 'CREATE VIEW adm_v_batch_course AS (select `bc`.`id` AS `id`,`bc`.`is_mandatory` AS `mandatory`,`yr`.`title` AS `year`,`sm`.`title` AS `semester`,`cs`.`title` AS `course`,`cs`.`credit` AS `course_credit`,`ct`.`title` AS `course_type`,`dp`.`title` AS `department` from (((((((`batch_course` `bc` join `year` `yr` on((`yr`.`id` = `bc`.`year_id`))) join `semester` `sm` on((`sm`.`id` = `bc`.`semester_id`))) join `course` `cs` on((`cs`.`id` = `bc`.`course_id`))) join `course_type` `ct` on((`ct`.`id` = `cs`.`course_type_id`))) join `batch` `ba` on((`ba`.`id` = `bc`.`batch_id`))) join `degree` `dg` on((`dg`.`id` = `ba`.`degree_id`))) join `department` `dp` on((`dp`.`id` = `dg`.`department_id`))) order by `bc`.`id`) ' );
	}


	public function down()
	{

	}

}
