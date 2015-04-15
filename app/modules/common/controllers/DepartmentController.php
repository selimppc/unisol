<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/15/2014
 * Time: 11:06 AM
 */

class DepartmentController extends BaseController{

     public function index(){

         $departmentList = Department::orderBy('id', 'DESC')->paginate(10);
         $facultyList = User::FacultyList();
         //print_r($facultyList);
         return View::make('common::department.index', compact('departmentList','facultyList'));
      }

    public function store(){

        // get the POST data
        $data = Input::all();

        // create a new model instance
        $department = new Department();
        // attempt validation
        if ($department->validate($data))
        {
            // success code
            $department->title = Input::get('title');
            $name = $department->title;
            $checkDeptHead = $this->checkIfFaculty($data['dept_head_user_id']);
            if($checkDeptHead){
                $department->dept_head_user_id = Input::get('dept_head_user_id');
            }else{
                $department->dept_head_user_id = null;
            }
            $department->description = Input::get('description');
            $department->save();
            // redirect
            Session::flash('message', "$name Department Added");
            return Redirect::to('common/department/');
        }
        else
        {
            // failure, get errors
            $errors = $department->errors();
            Session::flash('errors', $errors);
            return Redirect::to('common/department/');
        }
    }

    protected function checkIfFaculty($dept_head_user_id){
        $result = DB::table('department')->select(DB::raw('1'))
            ->where('dept_head_user_id', $dept_head_user_id)->first();
        return $result;
    }


    public function delete($id)
    {
     try {
            $data= Department::find($id);
            $name = $data->title;
            if($data->delete())
            {
                Session::flash('message', "$name Department Deleted");
                return Redirect::to('common/department/');
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDelete()
    {
        try {
            Department::destroy(Request::get('ids'));
            return Redirect::back();
           
        }
        catch (exception $ex) {
            return Redirect::back()->with('message', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
    public function edit($id)
    {
        $facultyList = User::FacultyList();
        $department = Department::find($id);
        // Show the edit employee form.
        return View::make('common::department.edit', compact('department','facultyList'));

    }

    public function update($id)
    {
        $rules = array(
           // 'title' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

            $department = Department::find($id);
            $department->title = Input::get('dept_name');
            $name = $department->title;
            $checkDeptHead = $this->checkIfFaculty( Input::get('dept_head_user_id') );
            if($checkDeptHead){
                $department->dept_head_user_id = Input::get('dept_head_user_id');
            }else{
                $department->dept_head_user_id = null;
            }
            $department->description = Input::get('description');
            $department->save();
            Session::flash('message', "$name Department Updated");
            return Redirect::to('common/department/');
        } else {
            return Redirect::to('common/department/')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function show($id)
    {
        $department = Department::find($id);
        return View::make('common::department.show',compact('department'));
    }
}