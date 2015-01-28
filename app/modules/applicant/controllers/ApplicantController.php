<?php
class ApplicantController extends \BaseController {

    public function index()

    {
         //$applicant_list = Applicant::orderBy('id', 'DESC');
        $applicant_list = Applicant::all();

        return View::make('applicant::applicants.index',compact('applicant_list'));
    }
    public function create()
    {
        return View::make('applicant::applicants.create');
    }
    public function store()
    {
        $rules = array(
            'fathers_name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $model = new Applicant;
            $model->user_id = Input::get('user_id');
            $model->fathers_name = Input::get('fathers_name');
            $model->mothers_name = Input::get('mothers_name');
            $model->fathers_occupation = Input::get('fathers_occupation');
            $model->fathers_phone = Input::get('fathers_phone');
            $model->freedom_fighter = Input::get('freedom_fighter');
            $model->mothers_occupation = Input::get('mothers_occupation');
            $model->mothers_phone = Input::get('mothers_phone');
            $model->national_id = Input::get('national_id');
            $model->driving_license = Input::get('driving_license');
            $model->passport = Input::get('passport');
            $model->place_of_birth = Input::get('place_of_birth');
            $model->national_id = Input::get('national_id');
            $model->marital_status = Input::get('marital_status');
            $model->nationality = Input::get('nationality');
            $model->religion = Input::get('religion');
            $model->signature = Input::get('signature');
            $model->present_address = Input::get('present_address');
            $model->parmanent_address = Input::get('parmanent_address');
            $model->save();
// return Redirect::to('crud')->with('message', 'Successfully added Country!');
            return Redirect::back()->with('message', 'Successfully Added Information!');
        } else {
            return Redirect::to('applicant')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }
    public function show($id)
    {
        $applicant = Applicant::find($id);
        return View::make('applicant::applicants.show',compact('applicant'));
    }
    public function edit($id)
    {
        $applicant = Applicant::find($id);

        return View::make('applicant::applicants.edit', compact('applicant'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $rules = array(
            'fathers_name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $applicant = Applicant::find($id);
            $applicant->user_id = Input::get('user_id');
            $applicant->fathers_name = Input::get('fathers_name');
            $applicant->mothers_name = Input::get('mothers_name');
            $applicant->fathers_occupation = Input::get('fathers_occupation');
            $applicant->fathers_phone = Input::get('fathers_phone');
            $applicant->freedom_fighter = Input::get('freedom_fighter');
            $applicant->mothers_occupation = Input::get('mothers_occupation');
            $applicant->mothers_phone = Input::get('mothers_phone');
            $applicant->national_id = Input::get('national_id');
            $applicant->driving_license = Input::get('driving_license');
            $applicant->passport = Input::get('passport');
            $applicant->place_of_birth = Input::get('place_of_birth');
            $applicant->national_id = Input::get('national_id');
            $applicant->marital_status = Input::get('marital_status');
            $applicant->nationality = Input::get('nationality');
            $applicant->religion = Input::get('religion');
            $applicant->signature = Input::get('signature');
            $applicant->present_address = Input::get('present_address');
            $applicant->parmanent_address = Input::get('parmanent_address');
            $applicant->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::to('applicant')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            Applicant::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('message', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }
}