<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('user-access','HomeController@userAccess');

Route::get('/hellow','TestController@index');

Route::get('/logs','HomeController@logs');

Route::get('/test-search','HomeController@testSearch');
Route::get('/bootstrap-modal','HomeController@bootstrapModal');
Route::any("bootstrap/test", [
    "as"   => "bootstrap.test",
    "uses" => "UserController@login"
]);

Route::any("update/{id}", [
    "as"   => "bootstrap.test",
    "uses" => "UserController@login"
]);

Route::any("drop-down", [
    "as"   => "dropdown",
    "uses" => "HomeController@dropDownForm"
]);
Route::any("dropdown/data", [
    "as"   => "dropdown/data",
    "uses" => "HomeController@dropDownData"
]);

Route::any("get-file", [
    "as"   => "getFile",
    "uses" => "HomeController@getFile"
]);

Route::any("date-picker", [
    "as"   => "datePicker",
    "uses" => "HomeController@datePicker"
]);


Route::any("sortable", [
    "as"   => "sortable",
    "uses" => "HomeController@sortable"
]);

Route::get('/upload', 'HomeController@getUploadForm');
Route::post('/upload/image','HomeController@postUpload');


Route::group( array('before' => 'auth'), function(){

    /*
    ==================================================================
    Selim
    ==================================================================
    */

    Route::get('/','HomeController@index');
    Route::any('user/create','HomeController@userCreate');

    Route::any('user/sign','HomeController@userSign');

    Route::any('user/registration','HomeController@userSignUp');
    Route::any('user/infostore','HomeController@userInfoStore');
    Route::any('user/usermeta','HomeController@testUserMeta');


    /*
    ==================================================================
    Shafi
    ==================================================================
    */


    //degree-level
    Route::get('degree_level/','DegreeLevelController@index');
    Route::any('degree_level/create','DegreeLevelController@create');
    Route::any('degree_level/store', ['as' => 'degreelevel.store', 'uses' => 'DegreeLevelController@store' ]);
    Route::get('degree_level/show/{id}', [ 'as' => 'degreelevel.show', 'uses' => 'DegreeLevelController@show' ]);
    Route::any('degree_level/edit/{id}', ['as' => 'degreelevel.edit', 'uses' => 'DegreeLevelController@edit' ]);
    Route::any('degree_level/update/{id}', ['as' => 'degreelevel.update','uses' => 'DegreeLevelController@update' ]);
    Route::any('degree_level/destroy/{id}', ['as' => 'degreelevel.destroy', 'uses' => 'DegreeLevelController@destroy' ]);
    Route::any('degree_level/batchDelete','DegreeLevelController@batchDelete');


    //Course
//    Route::get('course/','CourseController@index');
//    Route::any('course/create','CourseController@create');
//    Route::any('course/store', ['as' => 'course.store', 'uses' => 'CourseController@store' ]);
//    Route::get('course/show/{id}', [ 'as' => 'course.show', 'uses' => 'CourseController@show' ]);
//    Route::any('course/edit/{id}', ['as' => 'course.edit', 'uses' => 'CourseController@edit' ]);
//    Route::any('course/update/{id}', ['as' => 'course.update','uses' => 'CourseController@update' ]);
//    Route::any('course/destroy/{id}', ['as' => 'course.destroy', 'uses' => 'CourseController@destroy' ]);
//    Route::any('course/batchDelete','CourseController@batchDelete');




    //Target Role
    Route::get('target_role/','TargetRoleController@index');
    Route::any('target_role/create','TargetRoleController@create');
    Route::any('target_role/store', ['as' => 'target_role.store', 'uses' => 'TargetRoleController@store' ]);
    Route::get('target_role/show/{id}', [ 'as' => 'target_role.show', 'uses' => 'TargetRoleController@show' ]);
    Route::any('target_role/edit/{id}', ['as' => 'target_role.edit', 'uses' => 'TargetRoleController@edit' ]);
    Route::any('target_role/update/{id}', ['as' => 'target_role.update','uses' => 'TargetRoleController@update' ]);
    Route::any('target_role/destroy/{id}', ['as' => 'target_role.destroy', 'uses' => 'TargetRoleController@destroy' ]);
    Route::any('target_role/batchDelete','TargetRoleController@batchDelete');


    //Target List Role
    Route::get('target_list_role/','TaskListRoleController@index');
    Route::any('target_list_role/create','TaskListRoleController@create');
    Route::any('target_list_role/store', ['as' => 'target_list_role.store', 'uses' => 'TaskListRoleController@store' ]);
    Route::get('target_list_role/show/{id}', [ 'as' => 'target_list_role.show', 'uses' => 'TaskListRoleController@show' ]);
    Route::any('target_list_role/edit/{id}', ['as' => 'target_list_role.edit', 'uses' => 'TaskListRoleController@edit' ]);
    Route::any('target_list_role/update/{id}', ['as' => 'target_list_role.update','uses' => 'TaskListRoleController@update' ]);
    Route::any('target_list_role/destroy/{id}', ['as' => 'target_list_role.destroy', 'uses' => 'TaskListRoleController@destroy' ]);
    Route::any('target_list_role/batchDelete','TaskListRoleController@batchDelete');



    //Role Task User
    Route::get('role_task_user/','RoleTaskUserController@index');
    Route::any('role_task_user/create','RoleTaskUserController@create');
    Route::any('role_task_user/store', ['as' => 'role_task_user.store', 'uses' => 'RoleTaskUserController@store' ]);
    Route::get('role_task_user/show/{id}', [ 'as' => 'role_task_user.show', 'uses' => 'RoleTaskUserController@show' ]);
    Route::any('role_task_user/edit/{id}', ['as' => 'role_task_user.edit', 'uses' => 'RoleTaskUserController@edit' ]);
    Route::any('role_task_user/update/{id}', ['as' => 'role_task_user.update','uses' => 'RoleTaskUserController@update' ]);
    Route::any('role_task_user/destroy/{id}', ['as' => 'role_task_user.destroy', 'uses' => 'RoleTaskUserController@destroy' ]);
    Route::any('role_task_user/batchDelete','RoleTaskUserController@batchDelete');


    // Courses under semester/term
    Route::get('create/term','TermUnderSemesterController@Index');
    Route::post('term/save','TermUnderSemesterController@save');
    Route::any('term/show','TermUnderSemesterController@showterm');
    Route::any('term/show/{id}',['as' => 'term.show', 'uses'=> 'TermUnderSemesterController@show_one']);
    Route::get('term/edit/{id}', ['as' => 'term.edit','uses' => 'TermUnderSemesterController@edit']);
    Route::any('term/update/{id}', ['as' => 'term/update','uses' => 'TermUnderSemesterController@update']);
    Route::get('term/delete/{id}','TermUnderSemesterController@delete');
    Route::any('term/batch/delete','TermUnderSemesterController@batchdelete');

    // End courses

    /*
    ==================================================================
    Tanin
    ==================================================================
    */

//{---------------------------------Version:2 -> Degree Group------------------------------------}

    Route::any('common/degree-group',
        ['as'=>'common.degree-group.index',
            'uses'=>'DegreeGroupController@degreeGroupIndex']);

    Route::any('common/degree-group/create',
        ['as'=>'common.degree-group.create',
            'uses'=>'DegreeGroupController@degreeGroupCreate']);

    Route::any('common/degree-group/store',
        ['as'=>'common.degree-group.store',
            'uses'=>'DegreeGroupController@degreeGroupStore']);


    Route::any('common/degree-group/show/{id}',
        ['as'=>'common.degree-group.show',
            'uses'=>'DegreeGroupController@degreeGroupShow']);

    Route::any('common/degree-group/edit/{id}',
        ['as'=>'common.degree-group.edit',
            'uses'=>'DegreeGroupController@degreeGroupEdit']);

    Route::any('common/degree-group/update/{id}',
        ['as'=>'common.degree-group.update',
            'uses'=>'DegreeGroupController@degreeGroupUpdate']);

    Route::any('common/degree-group/delete/{id}',
        ['as'=>'common.degree-group.delete',
            'uses'=>'DegreeGroupController@degreeGroupDelete']);

    Route::any('common/degree-group/batch_delete',
            ['as'=>'common.degree-group.batch_delete',
            'uses'=>'DegreeGroupController@degreeGroupBatchDelete']);

// {------------------------------- Version:2 -> Exm-Center------------------------------------}
    Route::any('common/exm-center',
           ['as'=>'common.exm-center.index',
            'uses'=>'ExamCenterController@exmCenterIndex']);

    Route::any('common/exm-center/create',
            ['as'=>'common.exm-center.create',
            'uses'=>'ExamCenterController@exmCenterCreate']);

    Route::any('common/exm-center/store',
            ['as'=>'common.exm-center.store',
            'uses'=>'ExamCenterController@exmCenterStore']);

    Route::any('common/exm-center/show/{id}',
           ['as'=>'common.exm-center.show',
            'uses'=>'ExamCenterController@exmCenterShow']);

    Route::any('common/exm-center/edit/{id}',
        ['as'=>'common.exm-center.edit',
            'uses'=>'ExamCenterController@exmCenterEdit']);

    Route::any('common/exm-center/delete/{id}',
           ['as'=>'common.exm-center.delete',
            'uses'=>'ExamCenterController@exmCenterDelete']);

    Route::any('common/exm-center/batch-delete',
           ['as'=>'common.exm-center.batch-delete',
            'uses'=>'ExamCenterController@exmCenterBatchDelete']);

    Route::any('common/exm-center/update/{id}',
           ['as'=>'common.exm-center.update',
            'uses'=>'ExamCenterController@exmCenterUpdate']);

//{------------------------------------ Waiver ---------------------------------------------------------}

    Route::any('common/waiver/index',
          ['as'=>'common.waiver.index',
            'uses'=>'WaiverController@waiverIndex']);

    Route::any('common/waiver/create',
          ['as'=>'common.waiver.create',
            'uses'=>'WaiverController@waiverCreate']);

    Route::any('common/waiver/store',
          ['as'=>'common.waiver.store',
            'uses'=>'WaiverController@waiverStore']);




    //{------------------ Degree Program  --------------------}
    Route::any('degreeprogram/index','DegreeProgController@index');
    Route::any('degreeprogram/store','DegreeProgController@store');
    Route::any('degreeprogram/destroy/{id}','DegreeProgController@destroy');
    Route::any('degreeprogram/edit/{id}','DegreeProgController@edit');
    Route::post('degreeprogram/update/{id}','DegreeProgController@update');
    Route::get('degreeprogram/show/{id}', 'DegreeProgController@show' );



    //{------------------ Role Task  --------------------}
    Route::any('roletask/index','RoleTaskController@index');
    Route::any('roletask/store','RoleTaskController@store');
    Route::any('roletask/delete/{id}','RoleTaskController@destroy');
    Route::any('roletask/edit/{id}','RoleTaskController@edit');
    Route::post('roletask/update/{id}','RoleTaskController@update');
    Route::get('roletask/show/{id}', 'RoleTaskController@show' );

});


// if Missing any error
/*Route::get('/logs', function(){
    throw new RuntimeException('Hello');
    return View::make('error.missing');
});*/

App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});

/*
App::error(function(ModelNotFoundException $e) {
    return Response::make('Not Found', 404);
});*/
