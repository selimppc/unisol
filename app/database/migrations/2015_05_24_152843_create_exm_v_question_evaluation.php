<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExmVQuestionEvaluation extends Migration {

    public function up()
    {
        DB::statement( 'CREATE VIEW exm_v_question_evaluation AS (
            SELECT
            `aqe`.`student_user_id`       AS `student_user_id`,
            `aqe`.`exm_question_id`       AS `exm_question_id`,
            `aqe`.`exm_question_items_id` AS `exm_question_items_id`,
            `aqi`.`question_type`         AS `question_type`,
            `aqe`.`id`                    AS `exm_question_evaluation_id`,
            `aqe`.`marks`                 AS `marks`,
            `aqe`.`progress_status`       AS `progress_status`,
            `aqat`.`answer`               AS `tanswer`,
            `aqar`.`answer`               AS `ranswer`,
            `aqac`.`answer`               AS `canswer`
        FROM ((((`exm_question_items` `aqi`
            JOIN `exm_question_evaluation` `aqe`
                ON ((`aqe`.`exm_question_items_id` = `aqi`.`id`)))
            LEFT JOIN `exm_question_ans_text` `aqat`
                ON ((`aqat`.`exm_question_evaluation_id` = `aqe`.`id`)))
            LEFT JOIN `exm_question_ans_radio` `aqar`
                ON ((`aqar`.`exm_question_evaluation_id` = `aqe`.`id`)))
            LEFT JOIN `exm_question_ans_checkbox` `aqac`
                ON ((`aqac`.`exm_question_evaluation_id` = `aqe`.`id`)))

        )' );
    }


    public function down()
    {

    }
}
