<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmVQuestionEvaluation extends Migration {

    public function up()
    {
        DB::statement( 'CREATE VIEW adm_v_question_evaluation AS (
            SELECT
            aqe.batch_applicant_id 			AS batch_applicant_id,
            aqe.adm_question_id 			AS adm_question_id,
            aqe.adm_question_items_id		AS adm_question_items_id,
            aqe.id							AS adm_question_evaluation_id,
            aqe.marks						AS marks,
            aqe.progress_status				AS progress_status,
            aqat.answer						AS tanswer,
            aqar.answer						AS ranswer,
            aqac.answer						AS canswer

         FROM
            `adm_question_items`  aqi
             JOIN adm_question_evaluation aqe 		ON aqe.adm_question_items_id 			= aqi.id
            LEFT JOIN adm_question_ans_text aqat 		ON aqat.adm_question_evaluation_id 		= aqe.id
            LEFT JOIN adm_question_ans_radio aqar 		ON aqar.adm_question_evaluation_id 		= aqe.id
            LEFT JOIN adm_question_ans_checkbox aqac 	ON aqac.adm_question_evaluation_id 		= aqe.id

        )' );
    }


    public function down()
    {

    }

}
