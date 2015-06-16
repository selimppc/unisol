<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingVApplicantHistory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::statement( 'CREATE VIEW billing_v_student_history AS (
            SELECT
              `bsa`.`id`         AS `id`,
              `bs`.`code`        AS `schedule_code`,
              `bs`.`title`       AS `schedule_title`,
              `bsa`.`total_cost` AS `amount`,
              `app`.`first_name` AS `first_name`,
              `app`.`last_name`  AS `last_name`,
              `b`.`id`           AS `batch_id`,
              `d`.`id`           AS `degree_id`,
              `dpt`.`id`         AS `department_id`
            FROM `billing_summary_applicant` `bsa`
                    JOIN `billing_schedule` `bs` ON `bs`.`id` = `bsa`.`billing_schedule_id`
                JOIN `applicant` `app` ON `app`.`id` = `bsa`.`applicant_id`
                JOIN `batch_applicant` `ba` ON `ba`.`applicant_id` = `app`.`id`
                JOIN `batch` `b` ON `b`.`id` = `ba`.`batch_id`
                JOIN `degree` `d` ON `d`.`id` = `b`.`degree_id`
                JOIN `department` `dpt` ON `dpt`.`id` = `d`.`department_id`

                GROUP BY `bsa`.`id`$$

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
