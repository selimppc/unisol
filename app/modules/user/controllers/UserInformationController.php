<?php

class UserInformationController extends \BaseController {

    function __construct() {
        $this->beforeFilter('auth', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function profile(){

        if(Auth::user()->check()){
            $user_role = User::hasRole(Auth::user()->get()->role_id);
            $user_id = Auth::user()->get()->id;
            $userProfile = UserProfile::where('user_id', '=', $user_id)->first();
            $countryList = [''=>'Select One'] + Country::lists('title','id');
        }
        if($userProfile == Null) {
            Session::flash('info', "User Profile information is missing !");
        }
        return View::make('user::user_info.personal_info.index', compact('userProfile','user_id','countryList','user_role'));
    }

    public function storeProfile()
    {
        $data = Input::all();
        $file = $data['image'];
        $model = new UserProfile();

        if ($model->validate($data))
        {
            $model->user_id = Auth::user()->get()->id;
            $model->first_name = Input::get('first_name');
            $model->middle_name = Input::get('middle_name');
            $model->last_name = Input::get('last_name');
            $model->date_of_birth = Input::get('date_of_birth');
            $model->gender = Input::get('gender');
            $model->city = Input::get('city');
            $model->state = Input::get('state');
            $model->country = Input::get('country');
            $model->zip_code = Input::get('zip_code');

            if($file)
            {
                // Images destination
                $img_dir = "uploads/user_images/profile/" . date("h-m-y");
                // Create folders if they don't exist
                if (!file_exists($img_dir)) {
                    mkdir($img_dir, 0777, true);
                }
                $imagefile= Input::file('image');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file=strtolower($filename);
                $path = public_path("/uploads/user_images/profile/" . $file);
                Image::make($imagefile->getRealPath())->resize(180, 180)->save($path);
                $model->image =$file;
            }
            $model->save();

            Session::flash('message', "Successfully Added Information!");
            return Redirect::back();
        }
        else
        {
            Session::flash('danger', 'Invalid Request');
            return Redirect::back();
        }
        return Redirect::back();
    }
    public function editUserProfile($id){

        $model = UserProfile::find($id);
        $user_id = Auth::user()->get()->id;
        $countryList = [''=>'Select One'] + Country::lists('title','id');
        return View::make('user::user_info.personal_info.edit', compact('model','countryList','user_id'));
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
                // Images destination
                $img_dir = "uploads/user_images/profile/" . date("h-m-y");
                // Create folders if they don't exist
                if (!file_exists($img_dir)) {
                    mkdir($img_dir, 0777, true);
                }
                $imagefile = Input::file('image');
                $extension = $imagefile->getClientOriginalExtension();
                $filename = str_random(12) . '.' . $extension;
                $file = strtolower($filename);
                $path = public_path("/uploads/user_images/profile/" . $file);
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
        }else
        {
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function profileImage($id)
    {
        $model = UserProfile::find($id);
        return View::make('user::user_info.personal_info.add_image',compact('model'));
    }

    public function addProfileImage($id)
    {
        $data = Input::all();
        $file = $data['image'];
        $model = UserProfile::find($id);
        if($file) {
            // Images destination
            $img_dir = "uploads/user_images/profile/" . date("h-m-y");
            // Create folders if they don't exist
            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
            }
            $model->image = Input::file('image');
            $extension = $model->image->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file = strtolower($filename);
            $path = public_path("/uploads/user_images/profile/" . $file);
            Image::make($model->image->getRealPath())->resize(180, 180)->save($path);
            $model->image = $file;
        }
        $model->save();

        Session::flash('message', "Successfully Added Profile Picture!");
        return Redirect::back();
    }
    /*User Meta Data*/

    public function meta_data(){

        if(Auth::user()->check()){
            $user_role = User::hasRole(Auth::user()->get()->role_id);
            $user_id = Auth::user()->get()->id;
            $userMeta = UserMeta::where('user_id', '=', $user_id)->first();
            $countryList = [''=>'Select One'] + Country::lists('title','id');
        }
        if($userMeta == Null) {
            Session::flash('info', "User meta information is missing !");
        }
        return View::make('user::user_info.meta_data.index', compact('userMeta','user_id','countryList','user_role'));
    }

    public function createMetaData(){
        $user_id = Auth::user()->get()->id;
        $countryList = array('' => 'Please Select') + Country::lists('title', 'id');
        $model = UserProfile::with('relCountry')->where('user_id', '=', $user_id)->first();
        return View::make('user::user_info.meta_data._create',compact('model','countryList','user_id'));
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
        $data = Input::all();
        $file = $data['signature'];

        $model = UserMeta::find($id);
        if($file) {
            // Images destination
            $img_dir = "uploads/user_images/docs/" . date("h-m-y");
            // Create folders if they don't exist
            if (!file_exists($img_dir)) {
//                print_r('ok');exit;
                mkdir($img_dir, 0777, true);
            }
            $model->signature = Input::file('signature');
            $extension =  date("h-m-y") . '.' . $model->signature->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file = strtolower($filename);
            $path = public_path('uploads/user_images/docs/' . $file);
            Image::make($model->signature->getRealPath())->resize(180,120)->save($path);
            $model->signature  =  $file;
        }
        $model->save();

        Session::flash('message', "Successfully Added Signature!");
        return Redirect::back();
    }
// Academic Records.....

    public function acm_records(){

        if(Auth::user()->check()){
            $user_role = User::hasRole(Auth::user()->get()->role_id);
            $user_id = Auth::user()->get()->id;
            $academicRecords = UserAcademicRecord::where('user_id', '=', $user_id)->get();
        }
        if($academicRecords == Null) {
            Session::flash('info', "User Academic Records are missing !");
        }
        return View::make('user::user_info.academic.index', compact('academicRecords','user_id','countryList','user_role'));
    }
    public function create_acm_records(){
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.academic._create',compact('user_id'));
    }

    public function store_acm_records(){
        if(Auth::user()->check())
        {
//            $rules = array(
//                'level_of_education' => 'required|unique:user_academic_record',
////                'certificate' => 'required',
////                'transcript' => 'required',
//                'board_type' => 'required',
//                'result_type' => 'required',
//            );
            $data = Input::all();
            $model = new UserAcademicRecord();

            if ($model->validate($data))
            {

                $file = $data['certificate'];
                $file2 =$data['transcript'];

                $model->user_id = Auth::user()->get()->id;
                $model->level_of_education = Input::get('level_of_education');
                $model->degree_name = Input::get('degree_name');
                $model->institute_name = Input::get('institute_name');
                $model->academic_group = Input::get('academic_group');

                //save board or university according to board_type
                $model->board_type = Input::get('board_type');

                if ($model->board_type == 'board')
                    $model->board_university = Input::get('board_university_board');
                if ($model->board_type == 'university')
                    $model->board_university = Input::get('board_university_university');
                if ($model->board_type == 'other')
                    $model->board_university = Input::get('board_university_other');

                //$model->board_university = $board_university;
                $model->major_subject = Input::get('major_subject');
                $model->result_type = Input::get('result_type');

                $model->result = Input::get('result');
                $model->gpa = Input::get('gpa');
                $model->gpa_scale = Input::get('gpa_scale');
                $model->roll_number = Input::get('roll_number');
                $model->registration_number = Input::get('registration_number');
                $model->year_of_passing = Input::get('year_of_passing');
                $model->duration = Input::get('duration');
                $model->study_at = Input::get('study_at');

                if($file)
                {
                    $file_certificate = Input::file('certificate');
                    $extension = $file_certificate->getClientOriginalExtension();
                    $filename = str_random(12) . '.' . $extension;
                    $file=strtolower($filename);
                    $path = public_path("/uploads/user_images/docs/" . $file);
                    Image::make($file_certificate->getRealPath())->resize(180, 120)->save($path);
                    $model->certificate =$file;
                }
                if($file2)
                {
                    $file_transcript = Input::file('transcript');
                    $extension = $file_transcript->getClientOriginalExtension();
                    $filename = str_random(12) . '.' . $extension;
                    $file=strtolower($filename);
                    $path = public_path("/uploads/user_images/docs/" . $file);
                    Image::make($file_transcript->getRealPath())->resize(180, 120)->save($path);
                    $model->transcript =$file;
                }
                $model->save();

                Session::flash('message', "Successfully Added Information!");
                return Redirect::back();
            }
            else
            {
                $errors = $model->errors();
               Session::flash('errors', $errors);
                return Redirect::back();
            }
        }
        else
        {
            return Redirect::route('user/login')->with('message', 'Please Login !');
        }
    }

    public function edit_acm_records($id)
    {
        $model= UserAcademicRecord::find($id);
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.academic.edit', compact('model','user_id'));
    }

    public function update_acm_records($id)
    {
        $data = Input::all();

        $model = UserAcademicRecord::find($id);

        if ($model->validate($data, $id))
        {
            $file = $data['certificate'];
            $file2 =$data['transcript'];

            if($data)
            {
                $model->user_id = Auth::user()->get()->id;
//                print_r('ok');exit;
                $model->level_of_education = Input::get('level_of_education');
                $model->degree_name = Input::get('degree_name');
                $model->institute_name = Input::get('institute_name');
                $model->academic_group = Input::get('academic_group');
                //save board or university according to board_type
                $model->board_type = Input::get('board_type');
                if ($model->board_type == 'board')
                    $model->board_university = Input::get('board_university_board');
                if ($model->board_type == 'university')
                    $model->board_university = Input::get('board_university_university');
                if ($model->board_type == 'other')
                    $model->board_university = Input::get('board_university_other');

                //$model->board_university = $board_university;
                $model->major_subject = Input::get('major_subject');
                $model->result_type = Input::get('result_type');

                $model->result = Input::get('result');
                $model->gpa = Input::get('gpa');
                $model->gpa_scale = Input::get('gpa_scale');
                $model->roll_number = Input::get('roll_number');
                $model->registration_number = Input::get('registration_number');
                $model->year_of_passing = Input::get('year_of_passing');
                $model->duration = Input::get('duration');
                $model->study_at = Input::get('study_at');

                if($file)
                {
                    $file_certificate = Input::file('certificate');
                    $extension = $file_certificate->getClientOriginalExtension();
                    $filename = str_random(12) . '.' . $extension;
                    $file=strtolower($filename);
                    $path = public_path("/uploads/user_images/docs/" . $file);
                    Image::make($file_certificate->getRealPath())->save($path);
                    $model->certificate =$file;
                }
                if($file2)
                {
                    $file_transcript = Input::file('transcript');
                    $extension = $file_transcript->getClientOriginalExtension();
                    $filename = str_random(12) . '.' . $extension;
                    $file=strtolower($filename);
                    $path = public_path("/uploads/user_images/docs/" . $file);
                    Image::make($file_transcript->getRealPath())->save($path);
                    $model->transcript =$file;
                }
            }
            $model->save();
            Session::flash('message', "Successfully updated Information!");
            return Redirect::back();
        }
        else
        {
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }
    public function view_certificate($id){
        $user_id = $id;
        $model = UserAcademicRecord::where('id', '=',$user_id )->first();
        return View::make('user::user_info.academic.certificate',compact('model'));

    }

    public function view_transcript($id){

        $user_id = $id;
        $model = UserAcademicRecord::where('id', '=',$user_id )->first();
        return View::make('user::user_info.academic.transcript',compact('model'));
    }

    public function delete_acm_records($id){

        UserAcademicRecord::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Information!');
    }

    public function others_info(){

        if(Auth::user()->check()){
            $user_role = User::hasRole(Auth::user()->get()->role_id);
            $user_id = Auth::user()->get()->id;
            $misc_info = UserMiscellaneousInfo::where('user_id', '=', $user_id)->first();
            $extra_cur = UserExtraCurricularActivity::where('user_id','=',$user_id)->get();
            $supporting_docs = UserSupportingDoc::where('user_id', '=', $user_id)->first();
            if(!$supporting_docs){
                $supporting_docs = new UserSupportingDoc();
                $supporting_docs->user_id = Auth::user()->get()->id;
                $supporting_docs->save();
            }
            return View::make('user::user_info.others_info._others',compact('user_role','user_id', 'supporting_docs','misc_info','extra_cur'));
        }else{
            Session::flash('danger', "Please Login As User!  Or if not registered user then go <a href='user/login'>signup from here</a>");
            return Redirect::route('user/login');
        }
    }


    //Miscellaneous..

    public function misc_info(){

        if(Auth::user()->check()){
            $user_role = User::hasRole(Auth::user()->get()->role_id);
            $user_id = Auth::user()->get()->id;
            $misc_info = UserMiscellaneousInfo::where('user_id','=',$user_id)->first();
        }
        if($misc_info == Null) {
            Session::flash('info', "User MiscellaneousInfo missing !");
        }
        return View::make('user::user_info.miscellaneous_info.index', compact('misc_info','user_id','user_role'));
    }

    public function create_misc_info(){
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.miscellaneous_info._create',compact('user_id'));
    }

    public function store_misc(){

        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new UserMiscellaneousInfo();
            $model->user_id = Input::get('user_id');

            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Successfully added !');
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }else{
                $errors = $model->errors();
                Session::flash('warning', $errors);
                return Redirect::back();
            }
        }
        return Redirect::back();
    }

    public function edit_misc_info($id){

        $model = UserMiscellaneousInfo::find($id);
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.miscellaneous_info.edit', compact('model','user_id'));
    }

    public function update_misc_info($id){
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
//Extra-Curricular Activities..

    public function extra_curricular(){

        if(Auth::user()->check()){
            $user_role = User::hasRole(Auth::user()->get()->role_id);
            $user_id = Auth::user()->get()->id;
            $extra_cur = UserExtraCurricularActivity::where('user_id','=',$user_id)->get();
        }
        if($extra_cur == Null) {
            Session::flash('info', "User User Extra-Curricular Activities are missing !");
        }
        return View::make('user::user_info.extra_curricular.index', compact('extra_cur','user_id','user_role'));
    }
    public function create_extra_curricular(){
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.extra_curricular._create',compact('user_id'));
    }

    public function store_extra_curricular(){

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
                $path = public_path("/uploads/user_images/docs/" . $file);
                Image::make($imagefile->getRealPath())->save($path);
                $model->certificate_medal = $file;
            }
            $model->save();

            Session::flash('message', "Successfully Added Information!");
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function view_certificate_medal($id){

        $model = UserExtraCurricularActivity::find($id);
        return View::make('user::user_info.extra_curricular._view_certificate_medal',compact('model'));
    }

    public function create_certificate_medal($id){

        $model = UserExtraCurricularActivity::find($id);
        return View::make('user::user_info.extra_curricular.add_certificate_medal',compact('model'));
    }

    public function store_certificate_medal($id){

        $data = Input::all();
        $file = $data['certificate_medal'];

        $model = UserExtraCurricularActivity::find($id);
        if($file) {
            // Images destination
            $img_dir = "uploads/user_images/docs/" . date("h-m-y");
            // Create folders if they don't exist
            if (!file_exists($img_dir)) {
//                print_r('ok');exit;
                mkdir($img_dir, 0777, true);
            }
            $model->certificate_medal = Input::file('certificate_medal');
            $extension =  date("h-m-y") . '.' . $model->certificate_medal->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $file = strtolower($filename);
            $path = public_path('uploads/user_images/docs/' . $file);
            Image::make($model->certificate_medal->getRealPath())->save($path);
            $model->certificate_medal  =  $file;
        }
        $model->save();

        Session::flash('message', "Successfully Added.");
        return Redirect::back();
    }

    public function edit_extra_curricular($id){

        $model = UserExtraCurricularActivity::find($id);
        $user_id = Auth::user()->get()->id;
        return View::make('user::user_info.extra_curricular..edit', compact('model','user_id'));
    }

    public function update_extra_curricular($id){

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
                $path = public_path("/uploads/user_images/docs/" . $file);
                Image::make($imagefile->getRealPath())->save($path);
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

    public function supporting_docs(){

        if(Auth::user()->check()){
            $user_role = User::hasRole(Auth::user()->get()->role_id);
            $user_id = Auth::user()->get()->id;
            $supporting_docs = UserSupportingDoc::where('user_id', '=', $user_id)->first();
            if(!$supporting_docs){
                $supporting_docs = new UserSupportingDoc();
                $supporting_docs->user_id = Auth::user()->get()->id;
                $supporting_docs->save();
            }
        }
        if($supporting_docs == Null) {
            Session::flash('info', "User Supporting Docs are missing !");
        }
        return View::make('user::user_info.supporting_docs.index', compact('supporting_docs','user_id','user_role'));
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
        if ($data['doc_type'] == 'other') {
            $sdoc->other = Input::get('other');
        } else {
            $img_dir = "uploads/user_images/docs/" . date("h-m-y");
            // Create folders if they don't exist
            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
            }
            $file = Input::file('doc_file');
            $extension = $file->getClientOriginalExtension();
            $filename = str_random(12) . '.' . $extension;
            $sdoc_file=strtolower($filename);
            $pathL = public_path("/uploads/user_images/docs/" . $sdoc_file);
            $pathS = public_path("/uploads/user_images/docs/" . $sdoc_file);
            Image::make($file->getRealPath())->save($pathL);
            Image::make($file->getRealPath())->resize(800, 800)->save($pathS);
            $sdoc->$data['doc_type'] =$sdoc_file;
        }
            if ($sdoc->save()) {
                Session::flash('message', "Successfully added Information!");
                return Redirect::back();
            } else
                Session::flash('danger', "Not Added Information!");
                return Redirect::back();

    }

    public function view_sdocs($doc_type, $sdoc_id){

        $supporting_docs = UserSupportingDoc::where('id', '=', $sdoc_id)->first();
        return View::make('user::user_info.supporting_docs.view', compact('supporting_docs', 'doc_type'));
    }

    public function password_change_view($id){

        $model = User::find($id);
        return View::make('user::change_password._form',compact('model'));
    }
    // user password_change method
    /*public function change_password123()
    {
        $model= User::findOrFail(Auth::user()->get()->id);
        $old_password = Input::get('old_password');
        $user_password = Auth::user()->get()->password;

        if(Hash::check($old_password, $user_password)){
            //validation
            $rules = array(
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->Fails()) {
                Session::flash('info', 'Your new password does not match with confirm password. Please try again!');

                return Redirect::back();
            } else{
                $model->password = Input::get('new_password');
                if($model->save()){
                    Session::flash('message','You have changed your password successfully.');
                    return Redirect::back();
                }
                else{
                    echo "data do not saved!!!";
                }
            }
        }else{
            Session::flash('warning','Your old password was incorrect. Please try again!');
            return Redirect::back();
        }
    }*/


    public function change_password()
    {
        $model= User::findOrFail(Auth::user()->get()->id);
        $old_password = Input::get('old_password');
        $user_password = Auth::user()->get()->password;

        if(Hash::check($old_password, $user_password))
        {
            $data = Input::all();


            if ($model->validate_pass($data))
            {
                $model->password = Input::get('new_password');
                if($model->save())
                {
                    Session::flash('message','You have changed your password successfully.');
                    return Redirect::back();
                }
                else
                {
                    echo "data do not saved!!!";
                }
            }
            else
            {
                $errors = $model->errors();
                Session::flash('errors', $errors);
                return Redirect::back();
            }
        }
        else
        {
            Session::flash('warning','Your old password was incorrect. Please try again!');
            return Redirect::back();
        }
    }

    public function user_settings(){
        $user_role = User::hasRole(Auth::user()->get()->role_id);
        $user_id = Auth::user()->get()->id;
        $userAccounts = User::where('id', '=', $user_id)->first();
        $userProfile = UserProfile::where('user_id', '=', $user_id)->first();
        $userMeta = UserMeta::where('user_id', '=', $user_id)->first();
        $academicRecords = UserAcademicRecord::where('user_id', '=', $user_id)->get();
        return View::make('user::settings._settings',compact('user_role','user_id','userProfile','userAccounts','academicRecords','userMeta'));
    }


}