<?php

class ApplicantAdmissionController extends \BaseController {
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function admission_test()
    {
        if(Auth::applicant()->check()) {
            $applicant_id = Auth::applicant()->get()->id;
            $data = BatchApplicant::with('relBatch','relBatch.relDegree','relBatch.relSemester','relBatch.relYear')
                ->where('applicant_id', '=', $applicant_id)
                ->get();
            return View::make('applicant::admission_test.index',compact('data','applicant'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }

    }

    public function admission_test_subject($batch_id)
    {
        $batch_applicant = BatchApplicant::with('relBatch','relBatch.relDegree','relBatch.relSemester','relBatch.relYear')
            ->where('batch_id', '=', $batch_id)->first();

        $test_subject = BatchAdmtestSubject::with('relBatch','relAdmtestSubject','relAdmQuestion')
            ->where('batch_id', '=', $batch_id)->get();

        return View::make('applicant::admission_test.subject_details',compact('test_subject','batch_applicant','question'));
    }

    public function admission_test_subject_exam($batch_id, $admtest_subject_id)
    {
        $data = BatchAdmtestSubject::where('batch_id', $batch_id)->where('admtest_subject_id', $admtest_subject_id)->first();
        $adm_question = AdmQuestion::where('batch_admtest_subject_id', $data->id)->first();
        if($adm_question){
            $adm_question_id = $adm_question->id;
        }else{
            $adm_question_id = '';
        }
        $batch_admtest_subject_id = $data->id;


        return View::make('applicant::admission_test.subject_exam',compact('data', 'adm_question_id', 'batch_admtest_subject_id'));
    }

    public function start_admission_test(){

        //Get Post Data
        $adm_question_id = Input::get('adm_question_id');
        $batch_admtest_subject_id = Input::get('batch_admtest_subject_id');
        $question_number = Input::get('question_number');
        $finish = Input::get('finish');

        // Common Data from Batch Admtest Subject
        $data = BatchAdmtestSubject::with('relAdmtestSubject')
            ->where('id', $batch_admtest_subject_id)->first();
        //All question item list
        $all_items = AdmQuestionItems::where('adm_question_id', $adm_question_id)->get();
        //convert question item's id in an Array()
        $q_item_id = [];
        foreach($all_items as $item){
            $q_item_id [] = $item->id;
        }
        //Total Question
        $total_question_item = count($all_items);
        // question sequence number
        $q_no = isset($question_number) ? $question_number : 0;
        //Option and answer according to the question item
        if($q_no < $total_question_item){
            $question_ans_opt = AdmQuestionItems::with('relAdmQuestionOptAns')
                ->where('id', $q_item_id[$q_no])->get();
        }

        //Save Procedure
        $adm_question_items_id = Input::get('adm_question_items_id');
        $question_type = Input::get('question_type');
        if( !empty($adm_question_id) || !empty( $adm_question_items_id ) ){
            DB::beginTransaction();
            try{
                $model = new AdmQuestionEvaluation();
                $model->batch_applicant_id = Auth::applicant()->get()->id;
                $model->adm_question_id = $adm_question_id;
                $model->adm_question_items_id = Input::get('adm_question_items_id');
                if($model->save()){
                    if($question_type == 'text'){
                        /*$ans_text = new AdmQuestionAnsText();
                        $ans_text->amd_question_evaluation_id = $model->id;
                        $ans_text->answer = Input::get('text_answer');
                        $ans_text->save();*/
                    }elseif($question_type == 'radio'){
                        /*$ans_radio = new AdmQuestionAnsRadio();
                        $ans_radio->amd_question_evaluation_id = $model->id;
                        $ans_radio->answer = Input::get('radio_answer');
                        $ans_radio->save();*/
                    }elseif($question_type == 'checkbox'){
                        /*$ids = Input::get('checkbox_answer');
                        for($i=0; $i<count($ids); $i++){
                            $ans_checkbox = new AdmQuestionAnsCheckbox();
                            $ans_checkbox->amd_question_evaluation_id = $model->id;
                            $ans_checkbox->answer = $ids[$i];
                            $ans_checkbox->save();
                        }*/
                    }
                }
                DB::commit();
                Session::flash('success', "Saved Successfully !");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Invalid Request !");
            }
        }
        // redirect or render to method / view
        if($finish != 9){
            Session::flash('success', "Saved Successfully !");
            return View::make('applicant::admission_test.exam_question_item', compact(
                'data', 'total_question_item' , 'q_no' , 'question_ans_opt',
                'adm_question_id', 'batch_admtest_subject_id'
            ));
        }else{
            Session::flash('success', "Saved Successfully !");
            return Redirect::to('applicant/admission-test');
            //return Redirect::to('applicant/admission-test-subject/'.$batch_id);
        }

    }

}
