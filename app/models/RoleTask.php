<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/22/2014
 * Time: 1:15 PM
 */

class RoleTask  extends Eloquent{

    protected $table = 'role_task';

    //Shafi
    public static function getRoleTaskName($roletaskId){
        $data = RoleTask::find($roletaskId);
        return $data->title;
    }

} 