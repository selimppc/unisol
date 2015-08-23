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
            $model = UserProfile::with('relCountry')->where('user_id', '=', $user_id)->first();
//            print_r($model);exit;
            return View::make('user::user_info.profile.index',compact('model','countryList','user_id'));
    }
	public function storeProfile()
	{
       $data = Input::all();
        $file = $data['image'];
        $model = new UserProfile();
        if ($model->validate($data)) {
            $model->user_id = Auth::user()->get()->id;
            $model->first_name = Input::get('first_name');
            $model->middle_name = Input::get('middle_name');
            $model->last_name = Input::get('last_name');
            $model->date_of_birth = Input::get('date_of_birth');
            $model->gender = Input::get('gender');

            if($file){
                $imagefile= Input::file('image');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file=strtolower($filename);
                $path = public_path("/user_images/profile/" . $file);
                Image::make($imagefile->getRealPath())->resize(100, 100)->save($path);
                $model->image =$file;
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
                Image::make($imagefile->getRealPath())->resize(180, 180)->save($path);
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
        Image::make($model->image->getRealPath())->resize(180, 180)->save($path);
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

    public function viewSignature($id)
    {
        $model = UserMeta::find($id);
        return View::make('user::user_info.meta_data.add_signature',compact('model'));
    }

    public function addSignature($id)
    {
        $model = UserMeta::find($id);
        $model->signature = Input::file('signature');
        $extension = $model->signature->getClientOriginalExtension();
        $filename = str_random(12) . '.' . $extension;
        $file = strtolower($filename);
        $path = public_path("/user_images/docs/" . $file);
        Image::make($model->signature->getRealPath())->resize(150,100)->save($path);
        $model->signature  = $file;
        $model->save();

        Session::flash('message', "Successfully Added Signature!");
        return Redirect::back();
    }

    public function miscIndex(){
        $user_id = Auth::user()->get()->id;
        $data = UserMiscellaneousInfo::where('user_id', '=', $user_id)->first();
        return View::make('user::user_info.miscellaneous_info.index',compact('data','user_id'));
    }

    public function storeMisc(){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new UserMiscellaneousInfo();
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

    public function editMiscInfo($id){

        $model = UserMiscellaneousInfo::find($id);
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.miscellaneous_info._modal.edit', compact('model','user_id'));
    }

    public function updateMiscInfo($id){
        $data = Input::all();
        $model = UserMiscellaneousInfo::find($id);

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

    public function extraCurricularIndex(){
        $user_id = Auth::user()->get()->id;
        $data = UserExtraCurricularActivity::where('user_id', '=', $user_id)->get();
//        print_r($data);exit;
        return View::make('user::user_info.extra_curricular.index',compact('data','user_id'));
    }

    public function extraCurricularStore(){

         $data = Input::all();
         $file = $data['certificate_medal'];
         $model = new UserExtraCurricularActivity();
         if ($model->validate($data)) {
             $model->user_id = Auth::user()->get()->id;
             $model->title = Input::get('title');
             $model->description = Input::get('description');
             $model->achievement = Input::get('achievement');
             if($file){
                   $imagefile= Input::file('certificate_medal');
                   $extension = $imagefile->getClientOriginalExtension();
                   $filename = str_random(12) . '.' . $extension;
                   $file=strtolower($filename);
                   $path = public_path("/user_images/certificates/" . $file);
                   Image::make($imagefile->getRealPath())->resize(800, 800)->save($path);
                   $model->certificate_medal =$file;
             }
             $model->save();

             Session::flash('message', "Successfully Added Information!");
             return Redirect::back();
         }else{
             Session::flash('danger', 'Invalid Request');
             return Redirect::back();
         }
    }

    public function viewCertificateMedal($id){

        $model = UserExtraCurricularActivity::find($id);
        return View::make('user::user_info.extra_curricular._view_certificate_medal',compact('model'));
    }

    public function editExtraCurricular($id){

        $model = UserExtraCurricularActivity::find($id);
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.extra_curricular..edit', compact('model','user_id'));
    }

    public function updateExtraCurricular($id){

        $data = Input::all();
        $file = $data['certificate_medal'];
//        print_r($data);exit;
        $model = UserExtraCurricularActivity::find($id);
        if ($model->validate($data)) {
            $model->user_id = Auth::user()->get()->id;
            $model->title = Input::get('title');
            $model->description = Input::get('description');
            $model->achievement = Input::get('achievement');

            if($file){
                $imagefile = Input::file('certificate_medal');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file = strtolower($filename);
                $path = public_path("/user_images/certificates/" . $file);
                Image::make($imagefile->getRealPath())->resize(800, 800)->save($path);
                $model->certificate_medal  = $file;
            }

            $model->save();

            Session::flash('message', "Successfully Updated Information!");
            return Redirect::back();
        }else{
            Session::flash('danger', 'Invalid Request');
            return Redirect::back();
        }
    }

//    Supporting Docs..
     public function indexSDocs(){

         $user_id = Auth::user()->get()->id;
         $supporting_docs = UserSupportingDoc::where('user_id', '=', $user_id)->first();
         if(!$supporting_docs){
             $supporting_docs = new UserSupportingDoc();
             $supporting_docs->user_id = Auth::user()->get()->id;
             $supporting_docs->save();
         }
         return View::make('user::user_info.supporting_docs.index', compact('supporting_docs', 'doc_type'));
     }

     public function supportingDocs($doc_type, $sdoc_id){

         $supporting_docs = UserSupportingDoc::where('id', '=', $sdoc_id)->first();
         if(!$supporting_docs)
             $supporting_docs = null;

         return View::make('user::user_info.supporting_docs._form', compact('supporting_docs', 'doc_type'));
     }

    public function sDocsStore()
    {
        $data = Input::all();
        $sdoc = $data['id'] ? UserSupportingDoc::find($data['id']) : new UserSupportingDoc;
        if ($data['doc_type']=='other') {
            $sdoc->other = Input::get('other');
        } else {
            $file = Input::file('doc_file');
            $extension = $file->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $sdoc_file=strtolower($filename);
            $path = public_path("/user_images/s_doc/" . $sdoc_file);
            Image::make($file->getRealPath())->resize(100, 100)->save($path);
            $sdoc->$data['doc_type'] =$sdoc_file;
        }
        if ($sdoc->save())
            return Redirect::to('user/supporting-docs')->with('message', 'successfully added');
        else
            return Redirect::to('user/supporting-docs')->with('message', 'Not Added');
    }



}
