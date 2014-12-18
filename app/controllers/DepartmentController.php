<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/15/2014
 * Time: 11:06 AM
 */

class DepartmentController extends BaseController{

     public function index(){
         $departmentList = Department::all();
         //return View::make('department/index');
         return View::make('department.index', compact('departmentList'));
      }

      public function create(){
          return View::make('department/create');
      }
    public function store(){
        $rules = array(
            'dept_name' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $department = new Department;
            $department->title = Input::get('dept_name');
            $department->description = Input::get('description');

            $department->save();
            // return Redirect::to('crud')->with('message', 'Successfully added Country!');
            return Redirect::back()->with('message', 'Successfully Added Country Information!');
        } else {
            return Redirect::to('department/index')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }


    public function delete($id){
            Department::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Country Information!');
    }

    public function batchDelete()
    {
        // pass the array to the destroy method

        Department::destroy(Request::get('ids'));

        return Redirect::back();
    }

    public function edit($id)
    {
//        $datas = DB::table('department')->where('id', '=', $id)->limit(1)->get();
//        return View::make('department.edit')->with('department', $datas);

        $department = Department::find($id);
        // Show the edit employee form.
        return View::make('department.edit', compact('department'));

    }

    public function update($id)
    {
        $rules = array(
            'dept_name' => 'required',


        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

            $department = Department::find($id);
            $department->title = Input::get('dept_name');
            $department->description = Input::get('description');

            $department->save();
            return Redirect::back()->with('message', 'Successfully Added Country Information!');
        } else {
            return Redirect::to('department/index')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }
}