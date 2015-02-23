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
     * @param $selectedApplicantListWithChoiceList
     * @param $centerListWithCurrentCapacity
     * @return mixed
     */
    public function selectCenter($selectedApplicantListWithChoiceList, $centerListWithCurrentCapacity, $user){
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
     * @param array $query
     * @param $model
     * @return mixed
     */
    public function search(array $query, $model)
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

} 