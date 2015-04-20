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
include("routes_sh.php");
//Route::get('admin/common', function() {
//    return '<h1>Hello</h1>
//'; });
//foreach (Config::get('content::channels') as $key => $channel)
//{
//    Route::get('admin/content/' . $key, function() use ($channel) {
//        return "<h1>Channel [{$channel['title']}]</h1>";
//    });
//}

Route::get('admin/common', function() { return '<h1>Hello World !</h1>'; });
Route::get('admin/mon','CommonController@index');
Route::get('/helloworld','FowController@index');

/*
 ******Ratna
*/
//*******************Year Start*****************************
Route::any('common/year/',
    'YearController@index'
);
Route::post('year/save',
    'YearController@save'
);
Route::any('year/show/{id}',[
    'as' => 'year.show',
    'uses'=> 'YearController@show_one'
]);
Route::get('year/edit/{id}', [
    'as' => 'year.edit',
    'uses' => 'YearController@edit'
]);
Route::any('year/update/{id}', [
    'as' => 'year/update',
    'uses' => 'YearController@update'
]);
Route::get('year/delete/{id}',
    'YearController@delete'
);
Route::any('batch/delete',
    'YearController@batchdelete'
);
//*****************Semester Start*******************************
Route::get('common/semester/',
    'SemesterController@index'
);
Route::any('semester/store', [
    'as' => 'semester.store',
    'uses' => 'SemesterController@store'
]);
Route::get('semester/show/{id}', [
    'as' => 'semester.show',
    'uses' => 'SemesterController@show'
]);
Route::any('semester/edit/{id}', [
    'as' => 'semester.edit',
    'uses' => 'SemesterController@edit'
]);
Route::any('semester/update/{id}', [
    'as' => 'semester.update',
    'uses' => 'SemesterController@update'
]);
Route::any('semester/destroy/{id}', [
    'as' => 'semester.destroy',
    'uses' => 'SemesterController@destroy'
]);
Route::any('semester/batchDelete',
    'SemesterController@batchDelete'
);
//*****************Subject Start*******************************
Route::any('common/subject/',
    'SubjectController@index'
);
Route::post('subject/save',
    'SubjectController@save'
);
Route::any('subject/batch/delete',
    'SubjectController@batchdelete'
);
Route::get('subject/delete/{id}',
    'SubjectController@delete'
);
Route::get('subject/edit/{id}', [
    'as' => 'subject.edit',
    'uses' => 'SubjectController@edit'
]);
Route::post('subject/update/{id}',
    'SubjectController@update'
);
Route::any('common/subject/show/{id}',[
    'as' => 'common/subject/show',
    'uses'=> 'SubjectController@show'
]);
//*****************Department Start*******************************
Route::get('common/department/',
    'DepartmentController@index'
);
Route::any('department/store', [
    'as' => 'department.store',
    'uses' => 'DepartmentController@store'
]);
Route::any('department/delete/{id}',
    'DepartmentController@delete'
);
Route::any('department/batchDelete',
    'DepartmentController@batchDelete'
);
Route::any('department/edit/{id}',
    'DepartmentController@edit'
);
Route::post('department/update/{id}',
    'DepartmentController@update'
);
Route::get('department/show/{id}',
    'DepartmentController@show'
);

//{----------------------------------- Degree Program -------------------------------------------------------------------}


Route::any('common/degree-program',
    ['as'=>'common.degree-program.index',
        'uses'=>'DegreeProgramController@degreeProgramIndex']);

Route::any('common/degree-program/create',
    ['as'=>'common.degree-program.create',
        'uses'=>'DegreeProgramController@degreeProgramCreate']);

Route::any('common/degree-program/store',
    ['as'=>'common.degree-program.store',
        'uses'=>'DegreeProgramController@degreeProgramStore']);


Route::any('common/degree-program/show/{id}',
    ['as'=>'common.degree-program.show',
        'uses'=>'DegreeProgramController@degreeProgramShow']);

Route::any('common/degree-program/edit/{id}',
    ['as'=>'common.degree-program.edit',
        'uses'=>'DegreeProgramController@degreeProgramEdit']);

Route::any('common/degree-program/update/{id}',
    ['as'=>'common.degree-program.update',
        'uses'=>'DegreeProgramController@degreeProgramUpdate']);

Route::any('common/degree-program/delete/{id}',
    ['as'=>'common.degree-program.delete',
        'uses'=>'DegreeProgramController@degreeProgramDelete']);

Route::any('common/degree-program/batch_delete',
    ['as'=>'common.degree-program.batch_delete',
        'uses'=>'DegreeProgramController@degreeProgramBatchDelete']);

//{-------------------------------Course Type--------------------------------------------------------------------------}

Route::any('common/course-type',
    ['as'=>'common.course-type.index',
        'uses'=>'CourseTypeController@index']);


Route::any('common/course-type/create',
    ['as'=>'common.course-type.create',
        'uses'=>'CourseTypeController@create']);


Route::any('common/course-type/store',
    ['as'=>'common.course-type.store',
        'uses'=>'CourseTypeController@store']);


Route::any('common/course-type/show/{id}',
    ['as'=>'common.course-type.show',
        'uses'=>'CourseTypeController@show']);

Route::any('common/course-type/edit/{id}',
    ['as'=>'common.course-type.edit',
        'uses'=>'CourseTypeController@edit']);


Route::any('common/course-type/update/{id}',
    ['as'=>'common.course-type.update',
        'uses'=>'CourseTypeController@update']);


Route::any('common/course-type/delete/{id}',
    ['as'=>'common.course-type.delete',
        'uses'=>'CourseTypeController@delete']);

Route::any('common/course-type/batch-delete',
    ['as'=>'common.course-type.batch-delete',
        'uses'=>'CourseTypeController@batchDelete']);


//{--------------------------------- Degree Group ------------------------------------}

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

// {------------------------------- Exm-Center ------------------------------------}
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

