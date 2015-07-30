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

//        if(Auth::user()->check()) {
            $user_id = Auth::user()->get()->id;
            $countryList = array('' => 'Please Select') + Country::lists('title', 'id');
            $profile = UserProfile::where('user_id', '=', $user_id)->first();
            return View::make('user::user_info.profile.index',compact('profile','countryList','user_id'));
//        }
        /*else {
            Session::flash('danger', "Please Login As Applicant!  Or if not registered applicant then go <a href='/applicant/signup'>signup from here</a>");
            return Redirect::route('user/login');
        }*/

    }
	public function storeProfile()
	{
       $data = Input::all();
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
        }
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

        /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
