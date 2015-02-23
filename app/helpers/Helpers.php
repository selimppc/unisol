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

    public function selectCenter($selectedApplicantListWithChoiceList, $centerListWithCurrentCapacity){
        foreach( $selectedApplicantListWithChoiceList as $salwcl){
            foreach($salwcl['personChoiceList'] as $pcl){
                if( $centerListWithCurrentCapacity[$pcl]['capacity'] > 0 ){
                    $centerListWithCurrentCapacity[$pcl]['capacity']--;
                    return $pcl;
                }
            }
        }
    }

} 