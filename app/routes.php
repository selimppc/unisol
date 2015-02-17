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


Route::get('/hellow','TestController@index');

Route::get('/logs','HomeController@logs');

//Route::get('/logs', function(){
//    throw new RuntimeException('Hello');
//    return View::make('error.missing');
//});


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



    //semester
    Route::get('semester/','SemesterController@index');
    Route::any('semester/create','SemesterController@create');
    Route::any('semester/store', ['as' => 'semester.store', 'uses' => 'SemesterController@store' ]);
    Route::get('semester/show/{id}', [ 'as' => 'semester.show', 'uses' => 'SemesterController@show' ]);
    Route::any('semester/edit/{id}', ['as' => 'semester.edit', 'uses' => 'SemesterController@edit' ]);
    Route::any('semester/update/{id}', ['as' => 'semester.update','uses' => 'SemesterController@update' ]);
    Route::any('semester/destroy/{id}', ['as' => 'semester.destroy', 'uses' => 'SemesterController@destroy' ]);
    Route::any('semester/batchDelete','SemesterController@batchDelete');


    //Course
    Route::get('course/','CourseController@index');
    Route::any('course/create','CourseController@create');
    Route::any('course/store', ['as' => 'course.store', 'uses' => 'CourseController@store' ]);
    Route::get('course/show/{id}', [ 'as' => 'course.show', 'uses' => 'CourseController@show' ]);
    Route::any('course/edit/{id}', ['as' => 'course.edit', 'uses' => 'CourseController@edit' ]);
    Route::any('course/update/{id}', ['as' => 'course.update','uses' => 'CourseController@update' ]);
    Route::any('course/destroy/{id}', ['as' => 'course.destroy', 'uses' => 'CourseController@destroy' ]);
    Route::any('course/batchDelete','CourseController@batchDelete');


    //Course Type
    Route::get('course_type/','CourseTypeController@index');
    Route::any('course_type/create','CourseTypeController@create');
    Route::any('course_type/store', ['as' => 'course_type.store', 'uses' => 'CourseTypeController@store' ]);
    Route::get('course_type/show/{id}', [ 'as' => 'course_type.show', 'uses' => 'CourseTypeController@show' ]);
    Route::any('course_type/edit/{id}', ['as' => 'course_type.edit', 'uses' => 'CourseTypeController@edit' ]);
    Route::any('course_type/update/{id}', ['as' => 'course_type.update','uses' => 'CourseTypeController@update' ]);
    Route::any('course_type/destroy/{id}', ['as' => 'course_type.destroy', 'uses' => 'CourseTypeController@destroy' ]);
    Route::any('course_type/batchDelete','CourseTypeController@batchDelete');



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

    /*
    ==================================================================
    Ratna
    ==================================================================
    */

    //Subject
    Route::get('create/subject','SubjectController@Index');
    Route::post('subject/save','SubjectController@save');
    Route::any('subject/list','SubjectController@show');
    Route::any('subject/batch/delete','SubjectController@batchdelete');
    Route::get('subject/delete/{id}','SubjectController@delete');
    Route::get('subject/editvalue', 'SubjectController@edit');
    Route::post('subject/update/{id}', 'SubjectController@update');
    // Ends Subject


    //year
    Route::get('create/year','YearController@Index');
    Route::post('year/save','YearController@save');
    Route::any('year/show','YearController@show');
    Route::any('year/show/{id}',['as' => 'year.show', 'uses'=> 'YearController@show_one']);
    Route::get('year/edit/{id}', ['as' => 'year.edit','uses' => 'YearController@edit']);
    Route::any('year/update/{id}', ['as' => 'year/update','uses' => 'yearController@update']);
    Route::get('year/delete/{id}','yearController@delete');
    Route::any('batch/delete','yearController@batchdelete');
    // End year


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

    //{-------------------Department--------------------}
    Route::get('department/index','DepartmentController@index');
    Route::get('department/','DepartmentController@index');
    Route::get('department/create','DepartmentController@create');
    Route::any('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store' ]);
    Route::any('department/delete/{id}','DepartmentController@delete');
    Route::any('department/batchDelete','DepartmentController@batchDelete');
    Route::any('department/edit/{id}','DepartmentController@edit');
    Route::post('department/update/{id}','DepartmentController@update');
    Route::get('department/show/{id}', 'DepartmentController@show' );


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

