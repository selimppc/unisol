<?php
class ApplicantController extends \BaseController
{

    public function index()

    {
        //$applicant_list = Applicant::orderBy('id', 'DESC');
        $applicant_list = Applicant::all();

        return View::make('applicant::applicants.index', compact('applicant_list'));
    }

    public function create()
    {
        return View::make('applicant::applicants.create');
    }

    public function store()
    {
        $token = csrf_token();

        $rules = array(

            'email' => 'Required|email|unique:applicant',
            'username' => 'Required',
            'password' => 'regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})|required',
            'confirmpassword' => 'Required|same:password',


        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->Fails()) {
            Session::flash('message', 'Data not saved');
            return Redirect::to('applicant')->withErrors($validator)->withInput();

        } else {
            $verified_code = str_random(30);
            if ($token == Input::get('_token')) {
                $data = new Applicant();

                $data->email = Input::get('email_address');
                $data->username = Input::get('username');
                $data->password = Hash::make(Input::get('password'));//dd($data->password);
                $data->verified_code = $verified_code;

                if ($data->save()) {
                    $email=$data->email;

                    Mail::send('admission::signup.verify', array('link' => $verified_code),  function($message) use ($email)
                    {
                        $message->from('test@edutechsolutionsbd.com', 'Mail Notification');
                        $message->to($email);
                        $message->cc('tanintjt@gmail.com');
                        $message->subject('Notification');
                    });

                    return View::make('admission::signup.notification');

                } else {
                    Session::flash('message', 'not sending email. try again');

                    return Redirect::to('applicant/index')->with('message', 'Signup Here ');
                }
            }
        }
    }

    public function confirm($verified_code)
    {
        $user = Applicant::where('verified_code','=',$verified_code);
        if($user->count())
        {
            $user = $user->first();
            $user->verified_code = '';
        }
        Session::flash('message','Your account activated successfully. You can signin now.');

        return Redirect::to('usersign/login');

    }

    public function Login()
    {
        return View::make('admission::signup.login');
    }

    public function applicantLogin() {

        $credentials = array(
            'email'=> Input::get('email'),
            'password'=>Input::get('password'),

        );
//        echo  $credentials;
//        exit;

        if(Auth::check()){
            //$user_id = Auth::applicant()->username;
            $user_id = Auth::user()->username;
            $pageTitle = 'You are already logged in!';
            echo $pageTitle;
            //return View::make('usersign/dashboard', compact('user_id', 'pageTitle'));
        }else{
            if ( Auth::attempt($credentials) ) {
                return Redirect::to('usersign/dashboard')->with('message', 'Logged in!');
            } else {
                return Redirect::to('usersign/login') ->with('message', 'Your username/password combination was incorrect! Please try again....')
                    ->withInput();
            }
        }
    }

    public function applicantLogout() {

        //$model= User::find(Auth::user()->id);

//        date_default_timezone_set("Asia/Dacca");
//        $time=date('Y-m-d h:i:s', time());;
//        $model->last_visit = $time;
//        $model->save();
        Auth::logout();

        return Redirect::to('applicant/login')->with('message', 'Your are now logged out!');

    }

    public function show($id)
    {
        $applicant = Applicant::find($id);
        return View::make('applicant::applicants.show', compact('applicant'));
    }

    public function edit($id)
    {
        $applicant = Applicant::find($id);

        return View::make('applicant::applicants.edit', compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            Applicant::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('message', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function applicantPersonalInfoCreate(){

        return View::make('applicant::applicant_personal_info._form');

    }

    public function applicantPersonalInfoStore(){

        $rules = array(
            'national_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $applicant_personal_info =new ApplicantPersonalInfo();
            $applicant_personal_info->applicant_id = Input::get('applicant_id');
            $applicant_personal_info->fathers_name = Input::get('fathers_name');
            $applicant_personal_info->mothers_name = Input::get('mothers_name');
            $applicant_personal_info->fathers_occupation = Input::get('fathers_occupation');
            $applicant_personal_info->fathers_phone = Input::get('fathers_phone');
            $applicant_personal_info->freedom_fighter = Input::get('freedom_fighter');
            $applicant_personal_info->mothers_occupation = Input::get('mothers_occupation');
            $applicant_personal_info->mothers_phone = Input::get('mothers_phone');
            $applicant_personal_info->national_id = Input::get('national_id');
            $applicant_personal_info->driving_licence = Input::get('driving_licence');
            $applicant_personal_info->passport = Input::get('passport');
            $applicant_personal_info->place_of_birth = Input::get('place_of_birth');
            $applicant_personal_info->national_id = Input::get('national_id');
            $applicant_personal_info->marital_status = Input::get('marital_status');
            $applicant_personal_info->nationality = Input::get('nationality');
            $applicant_personal_info->religion = Input::get('religion');
            $applicant_personal_info->signature = Input::file('signature');
            $applicant_personal_info->present_address = Input::get('present_address');
            $applicant_personal_info->permanent_address = Input::get('permanent_address');
            $applicant_personal_info->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function applicantPersonalInfoIndex()
    {
        $applicant_id = Applicant::find(3)->id;

        $applicant_personal_info = ApplicantPersonalInfo::where('applicant_id', '=',$applicant_id )->first();
        return View::make('applicant::applicant_personal_info.index',compact('applicant_personal_info'));
    }

    public function applicantPersonalInfoEdit($id){

        $applicant_personal_info = ApplicantPersonalInfo::find($id);

        return View::make('applicant::applicant_personal_info.edit', compact('applicant_personal_info'));
    }

    public function applicantPersonalInfoUpdate($id){

        $rules = array(
            'national_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $applicant_personal_info = ApplicantPersonalInfo::find($id);
            $applicant_personal_info->national_id = Input::get('national_id');
            $applicant_personal_info->fathers_name = Input::get('fathers_name');
            $applicant_personal_info->mothers_name = Input::get('mothers_name');
            $applicant_personal_info->fathers_occupation = Input::get('fathers_occupation');
            $applicant_personal_info->passport = Input::get('passport');
            $applicant_personal_info->mothers_occupation = Input::get('mothers_occupation');

            $applicant_personal_info->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function applicantExtraCurricular()
    {
        return View::make('applicant::extra_curricular._form');
    }

    public function applicantExtraCurricularStore(){

        $rules = array(
            'title' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $extra_curricular =new ExtraCurricularActivities();
            $extra_curricular->applicant_id = Input::get('applicant_id');
            $extra_curricular->title = Input::get('title');
            $extra_curricular->description = Input::get('description');
            $extra_curricular->achivement = Input::get('achivement');
            $extra_curricular->certificate_medal = Input::file('certificate_medal');
            $extra_curricular->save();

            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::to('applicant/extra_curricular/create')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function applicantExtraCurricularActivities()
    {
        $user_id = Auth::user()->id;

        $data = ExtraCurricularActivities::where('user_id', '=', $user_id)->first();

        return View::make('applicant::extra_curricular.index', compact('data'));

    }

    public function editExtraCurricular($id)
    {
        $extra_curricular = ExtraCurricularActivities::find($id);

        return View::make('applicant::extra_curricular.edit', compact('extra_curricular'));
    }

    public function updateExtraCurricular($id){

        $rules = array(
            'title' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $extra_curricular = ExtraCurricularActivities::find($id);
            $extra_curricular->title = Input::get('title');
            $extra_curricular->description = Input::get('description');
            $extra_curricular->achivement = Input::get('achivement');
            $extra_curricular->certificate_medal = Input::file('certificate_medal');


            $extra_curricular->save();
            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function applicantIndex(){

        return View::make('applicant::applicants.index');
    }

    public function applicantProfileIndex(){
        //$applicant_id = Applicant::find(3)->id;

        $profile = ApplicantProfile::where('id', '=', '19')->first();

        return View::make('applicant::applicant_profile.index')->with('profile',$profile);
    }

    public function applicantProfileCreate()
    {
        return View::make('applicant::applicant_profile._form');
    }

    public function applicantProfileStore(){

        $rules = array(
            'profile_image' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $profile =new ApplicantProfile();
            $profile->applicant_id = Input::get('applicant_id');
            $profile->date_of_birth = Input::get('date_of_birth');
            $profile->gender = Input::get('gender');

            $file = Input::file('profile_image');
//            echo $file;
//            exit;

            $destinationPath = public_path().'/applicant_images';
            $extension = $file->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            Input::file('profile_image')->move($destinationPath, $filename);
            $profile->profile_image = $filename;

            $profile->city = Input::get('city');
            $profile->state = Input::get('state');
            $profile->country = Input::get('country');
            $profile->zip_code = Input::get('zip_code');
            $profile->save();

            return Redirect::back()->with('message', 'Successfully added Information!');
        } else {
            return Redirect::to('applicant/profile/create')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function editApplicantProfile($id){

        $profile = ApplicantProfile::find($id);

        return View::make('applicant::applicant_profile.edit', compact('profile'));

    }

    public function updateApplicantProfile($id){

        $rules = array(
            'date_of_birth' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $profile = ApplicantProfile::find($id);
            $profile->date_of_birth = Input::get('date_of_birth');
//            $profile->birth_place = Input::get('birth_place');
            $profile->gender = Input::get('gender');
            $profile->city = Input::get('city');
            $profile->state = Input::get('state');
            $profile->country = Input::get('country');
            $profile->zip_code = Input::get('zip_code');

            $file = Input::file('profile_image');

            if($file){
                $extension = $file->getClientOriginalName();
                $filename = str_random(12) . '.' . $extension;
                $path = public_path("images/applicant_profile/" . $filename);
                Image::make($file->getRealPath())->resize(80, 80)->save($path);

                $profile->profile_image = $filename;
            }

            $profile->save();

            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function Dashboard(){

        return View::make('applicant::applicants.dashboard');
    }

    public function editProfileImage($id){

        $profile = ApplicantProfile::find($id);

        return View::make('applicant::applicant_profile.edit_image', compact('profile'));
    }

    public function updateProfileImage($id){

        $rules = array(
            'profile_image' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $profile = ApplicantProfile::find($id);

            $file = Input::file('profile_image');
            //echo $file;
            //exit;
            $extension = $file->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $path = public_path("images/applicant_profile/" . $filename);
            Image::make($file->getRealPath())->resize(60, 60)->save($path);

            $profile->profile_image = $filename;

            $profile->save();

            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }
}

