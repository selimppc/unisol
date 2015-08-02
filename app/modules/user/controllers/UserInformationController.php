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
            $profile = UserProfile::with('relCountry')->where('user_id', '=', $user_id)->first();
//            print_r($profile);exit;
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
            $model->country_id = Input::get('country_id');
            $model->zip_code = Input::get('zip_code');

            $model->save();

            Session::flash('message', "Successfully Added Information!");
            return Redirect::back();
        }else{
            Session::flash('danger', 'Invalid Request');
            return Redirect::back();
        }
    }

    public function profileImage($id)
    {
        $model = UserProfile::find($id);
        return View::make('user::user_info.profile.add_image',compact('model'));
    }

    public function addProfileImage($id)
    {
        $model = UserProfile::find($id);
        $model->image = Input::file('image');
        $extension = $model->image->getClientOriginalExtension();
        $filename = str_random(12) . '.' . $extension;
        $file = strtolower($filename);
        $path = public_path("/user_images/profile/" . $file);
        Image::make($model->image->getRealPath())->resize(100, 100)->save($path);
        $model->image  = $file;
        $model->save();

        Session::flash('message', "Successfully Added Profile Picture!");
        return Redirect::back();

    }
 /*User Meta Data*/

    public function metaDataIndex(){

        $user_id = Auth::user()->get()->id;
        $meta_data = UserMeta::where('user_id', '=', $user_id)->first();
        return View::make('user::user_info.meta_data.index',compact('meta_data','user_id'));
    }
    public function storeMetaData(){

        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new UserMeta();
            $model->user_id = Input::get('user_id');
//            print_r($input_data);exit;
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
        }
        return Redirect::back();
    }

    public function editMetaData($id){

        $model = UserMeta::find($id);
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.meta_data.edit', compact('model','user_id'));
    }

    public function updateMetaData($id){

        $data = Input::all();
        $model = UserMeta::find($id);

        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }


}
