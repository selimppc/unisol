<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingVStudentHistory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement( 'CREATE VIEW billing_v_student_history AS (
            SELECT
              `bss`.`id`         	AS `id`,
              `bs`.`code`        	AS `schedule_code`,
              `bs`.`title`       	AS `schedule_title`,
              `bss`.`total_cost` 	AS `amount`,
              `u`.`student_id`   	AS `student_id`,
              uf.first_name	     	AS first_name,
              uf.last_name		AS last_name,
              b.id		     	AS batch_id,
              d.id			AS degree_id,
              dpt.id		AS department_id


            FROM `billing_student_head` `bss`
                JOIN `billing_schedule` `bs` ON `bs`.`id` = `bss`.`billing_schedule_id`
                JOIN `user` `u` ON `u`.`id` = `bss`.`student_user_id`
                JOIN user_profile uf ON uf.user_id = u.id
                JOIN `applicant` `app`  ON `app`.`id` = `u`.`applicant_id`
                JOIN batch_applicant ba ON ba.applicant_id = app.id
                JOIN batch b ON b.id = ba.batch_id
                JOIN degree d ON d.id = b.degree_id
                JOIN department dpt ON dpt.id = d.department_id

                GROUP BY bss.id

        )' );
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
