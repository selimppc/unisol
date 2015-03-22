<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 2/23/2015
 * Time: 12:28 PM
 */
//namespace Helpers;

class Helpers {

    public static function doMessage() {
        $message = 'Hello';
        return $message;
    }

    /**
     * @param $selectedApplicantListWithChoiceList :: Choice List of Center for Applicant
     * @param $centerListWithCurrentCapacity :: Center List with Current Capacity
     * @param $user :: User would be single or multiple
     * @return mixed
     */
    public function selectCenter($selectedApplicantListWithChoiceList, $centerListWithCurrentCapacity){
        foreach( $selectedApplicantListWithChoiceList as $salwcl){
            foreach($salwcl['clist'] as $pcl){
                if( $centerListWithCurrentCapacity[$pcl]['capacity'] > 0 ){
                    $centerListWithCurrentCapacity[$pcl]['capacity']--;
                    return $pcl;
                }
            }
        }
    }


    /**
     * @param array $query :: array of data ;
     * @param $model :: declare in which model;
     * @return mixed
     */
    public static function search(array $query, $model)
    {
        $model = $model;
        foreach ($query as $column => $term)
        {
            if (! empty($term))
            {
                $model = $model->where($column, 'LIKE', "$term%");
            }
        }
        return $model->get();
    }


    public static function searchBatchByDepartment()
    {
        $batch = new Batch();
        $degree = 'relDegree';
        $relationModel = 'relDegree.relDepartment';
        $department_id = 1;

        /*$query = $batch::with(['relDegree', 'relDegree.relDegreeProgram', 'relDegree.relDegreeGroup',
            'relDegree.relDepartment' => function ($query) use ($department_id){
                    //foreach($department_id as $value){
                        $query->where('id', '=', $department_id);
                    //}
                }]);
        $query = $query->get();*/

        $result = Degree::with(['relDepartment'])->where('department_id', '=', $department_id)->get();
        return $result;

        /*$tags = Batch::whereHas('usage', function($q)
        {
            $q->whereModel('Degree');

        })->get();
        return $tags;*/

        /*$model = $model;
        foreach ($query as $column => $term)
        {
            if (! empty($term))
            {
                $model = $model->where($column, 'LIKE', "$term%");
            }
        }
        return $model->get();*/
    }





    /**
     * @param $student_id
     * @return mixed
     */
    public static function extractStudentId($student_id){
        if(!empty($student_id)){
            $degree_id = substr($student_id, 0, -3);

            $degree = Degree::where('id', '=', $degree_id)->first();
            //Do a query by this degree_id and get all the following id

            $extract_result['dept_id'] = $degree->department_id;
            $extract_result['year_id'] = $degree->year_id;
            $extract_result['semester_id'] = $degree->semester_id;
            $extract_result['degree_program_id'] = $degree->degree_program_id;

            return $extract_result;
        }
    }


    public static function meritList($student_passed_at_test, $total_quota){
        $merit_position = 1;
        foreach($student_passed_at_test as $k => $v){
            if(isArray($v)){
                arsort($v);
                foreach($v as $kv => $vv){
                    if( $total_quota > 0 )
                        $merit_status = 'm';
                    else
                        $merit_status = 'w';
                    // Update merit_postion and merit_status at degree_applicant table
                    $merit_position ++;
                    $total_quota--;
                }
            }else{
                if( $total_quota > 0 )
                    $merit_status = 'm';
                else
                    $merit_status = 'w';
                // Update merit_postion and merit_status at degree_applicant table
                $merit_position ++;
                $total_quota--;
            }
        }
    }







} 