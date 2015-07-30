<?php

class UserInformationController extends \BaseController {

//    function __construct() {
//        $this->beforeFilter('userAuth', array('except' => array('')));
//    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

	public function profileIndex(){

            $user_id = Auth::user()->get()->id;
            $countryList = array('' => 'Please Select') + Country::lists('title', 'id');
            $profile = UserProfile::where('user_id', '=', $user_id)->first();
            return View::make('user::user_info.profile.index',compact('profile','countryList','user_id'));
    }
	public function storeProfile()
	{
       /*$data = Input::all();
        $model = new UserProfile();
        if ($model->validate($data)) {
            $model->user_id = Auth::user()->get()->id;
            $model->first_name = Input::get('first_name');
            $model->middle_name = Input::get('middle_name');
            $model->last_name = Input::get('last_name');
            $model->date_of_birth = Input::get('date_of_birth');
            $model->gender = Input::get('gender');

            $imagefile= Input::file('image');
            $extension = $imagefile->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file=strtolower($filename);
            $path = public_path("/user_images/profile/" . $file);
            Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
            $model->image =$file;

            $model->city = Input::get('city');
            $model->state = Input::get('state');
            $model->country = Input::get('country');
            $model->zip_code = Input::get('zip_code');

            $model->save();

            Session::flash('message', "Successfully Added Information!");
            return Redirect::back();
        }else{
            Session::flash('danger', 'Invalid Request');
            return Redirect::back();
        }*/

        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new User();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    if($model->create($input_data)){
                        $model1 = new UserProfile();
                        if($model1->validate($input_data)) {

                        }
                        $model1->user_id = $model->id;
                        if($model1->create($input_data)){
                            DB::commit();
                            Session::flash('message', 'Success !');
                        }
                    }
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }

            }
        }
        return Redirect::back();
	}
    public function editUserProfile($id){

        $model = UserProfile::find($id);
        $user_id = Auth::user()->get()->id;
        $countryList = [''=>'Select One'] + Country::lists('title','id');
        return View::make('user::user_info.profile.edit', compact('model','countryList','user_id'));
    }

    public function updateProfile($id){

        $data = Input::all();
        $file = $data['image'];
//        print_r($data);exit;
        $model = UserProfile::find($id);
        if ($model->validate($data)) {
            $model->user_id = Auth::user()->get()->id;
            $model->first_name = Input::get('first_name');
            $model->middle_name = Input::get('middle_name');
            $model->last_name = Input::get('last_name');
            $model->date_of_birth = Input::get('date_of_birth');
            $model->gender = Input::get('gender');

            if($file){
                $imagefile = Input::file('image');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file = strtolower($filename);
                $path = public_path("/user_images/profile/" . $file);
                Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
                $model->image  = $file;
            }

            $model->city = Input::get('city');
            $model->state = Input::get('state');
            $model->country = Input::get('country');
            $model->zip_code = Input::get('zip_code');

            $model->save();

            Session::flash('message', "Successfully Added Information!");
            return Redirect::back();
        }else{
            Session::flash('danger', 'Invalid Request');
            return Redirect::back();
        }
    }

    public function editProfileImage($id)
    {
        $profile_img = UserProfile::find($id);
        return View::make('user::user_info.profile.edit_image', compact('profile_img'));
    }

    public function updateProfileImage($id)
    {
        $rules = array(
            'profile_image' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $profile = ApplicantProfile::find($id);
                $FlashMsg = Auth::applicant()->get()->username;
                $imagefile = Input::file('profile_image');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file = strtolower($filename);
                $path = public_path("/applicant_images/profile/" . $file);
                Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
                $profile->profile_image = $file;
                $profile->save();
                DB::commit();
                return Redirect::back()->with('message', "Successfully Updated $FlashMsg Profile Picture !");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " Information is not added.Invalid Request !");
            }
            return Redirect::back();

        } else {
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

 /*User Meta Data*/

    public function metaDataIndex(){

        $user_id = Auth::user()->get()->id;
        $meta_data = UserMeta::where('user_id', '=', $user_id)->first();
        return View::make('user::user_info.meta_data.index',compact('meta_data','user_id'));
    }

}
