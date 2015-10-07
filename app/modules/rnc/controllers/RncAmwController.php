<?php

class RncAmwController extends \BaseController
{
    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    protected $redirect_to = "rnc/amw/category/index";

    // Category
    public function indexCategory()
    {
        $model = RncCategory::orderBy('id', 'DESC')->paginate(10);
        return View::make('rnc::amw.category.index', compact('model'));
    }

    /**
     * @return mixed
     */
    public function storeCategory()
    {
        $data = Input::all();
        $model = new RncCategory();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data)){
                DB::beginTransaction();
                try {
                    $model->create($data);
                    DB::commit();
                    Session::flash('message', "$name Category  Added");
                }
                catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', "$name Category not added.Invalid Request!");
                }
//                return Redirect::to($providers);
                return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function showCategory($id)
    {
        $model = RncCategory::find($id);
        if($model)
        {
            return View::make('rnc::amw.category.show',compact('model'));
        }
        App::abort(404);
    }


    public function editCategory($id)
    {
        $model = RncCategory::find($id);
        return View::make('rnc::amw.category.edit',compact('model'));
    }


    public function updateCategory($id)
    {
        $data = Input::all();
        $model = RncCategory::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if ($model->validate($data, $id))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Category Updates");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "$name Category not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function deleteCategory($id)
    {
        try {
            $model= RncCategory::find($id);
            $name = $model->title;
            if($model->delete())
            {
                Session::flash('message', "$name Category Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('warning', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeleteCategory()
    {
        try{
            RncCategory::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Category has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

    // Config
    public function indexConfig()
    {
        $config = RncConfig::orderBy('id', 'DESC')->paginate(10);
        return View::make('rnc::amw.config.index', compact('config'));
    }

    public function storeConfig()
    {
        $data = Input::all();
        $config = new RncConfig();
        $config->title = Input::get('title');
        $name = $config->title;
        if($config->validate($data))
        {
            DB::beginTransaction();
            try {
                $config->create($data);
                DB::commit();
                Session::flash('message', "$name Config  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Config not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $config->errors();
            return Redirect::back()->with('errors', $errors);
        }
    }

    public function showConfig($id)
    {
        $config = RncConfig::find($id);
        if($config)
        {
            return View::make('rnc::amw.config.show',compact('config'));
        }
        App::abort(404);
    }


    public function editConfig($id)
    {
        $config = RncConfig::find($id);
        return View::make('rnc::amw.config.edit',compact('config'));
    }


    public function updateConfig($id)
    {
        $data = Input::all();
        $config = RncConfig::find($id);
        $config->title = Input::get('title');
        $name = $config->title;
        if($config->validate($data))
        {
            DB::beginTransaction();
            try {
                $config->update($data);
                DB::commit();
                Session::flash('message', "$name Config Updates");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "$name Config not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $config->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteConfig($id)
    {
        try {
            $config= RncConfig::find($id);
            $name = $config->title;
            if($config->delete())
            {
                Session::flash('message', "$name Config Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeletConfig()
    {
        try{
            RncConfig::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Config Batch Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Config has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

    //Publisher
    public function indexPublisher()
    {
        $publisher = RncPublisher::orderBy('id', 'DESC')->paginate(10);
        return View::make('rnc::amw.publisher.index', compact('publisher'));
    }

    public function storePublisher()
    {
        $data = Input::all();
        $publisher = new RncPublisher();
        $publisher->title = Input::get('title');
        $name = $publisher->title;
        if($publisher->validate($data))
        {
            DB::beginTransaction();
            try {
                $publisher->create($data);
                DB::commit();
                Session::flash('message', "$name Publisher  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Publisher not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $publisher->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

    public function showPublisher($id)
    {
        $publisher = RncPublisher::find($id);
        if($publisher)
        {
            return View::make('rnc::amw.publisher.show',compact('publisher'));
        }
        App::abort(404);
    }


    public function editPublisher($id)
    {
        $publisher = RncPublisher::find($id);
        return View::make('rnc::amw.publisher.edit',compact('publisher'));
    }


    public function updatePublisher($id)
    {
        $data = Input::all();
        $publisher = RncPublisher::find($id);
        $publisher->title = Input::get('title');
        $name = $publisher->title;
        if($publisher->validate($data))
        {
            DB::beginTransaction();
            try {
                $publisher->update($data);
                DB::commit();
                Session::flash('message', "$name Publisher Updates");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "$name Publisher not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $publisher->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deletePublisher($id)
    {
        try {
            $publisher= RncPublisher::find($id);
            $name = $publisher->title;
            if($publisher->delete())
            {
                Session::flash('message', "$name Publisher Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeletPublisher()
    {
        try{
            RncPublisher::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Publisher Batch Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Publisher has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }




    //Research Paper

    public function indexResearchPaper()
    {
        $research_paper = RncResearchPaper::orderBy('id', 'DESC')->paginate(10);
        $rnc_category = array('' => 'Select RnC Category ') + RncCategory::lists('title', 'id');
        $rnc_publisher = array('' => 'Select RnC Publisher') + RncPublisher::lists('title', 'id');
        $reviewed_by = array('' => 'Select Reviewer') + User::FacultyList();
        return View::Make('rnc::amw.research_paper.index',compact('research_paper','rnc_category','rnc_publisher','reviewed_by'));
    }

    public function storeResearchPaper()
    {
        $data = Input::all();
        $model = new RncResearchPaper();
        if ($model->validate($data)) {
            $model->title = Input::get('title');
            $flashmsg = $model->title;
            $model->abstract = Input::get('abstract');
            $model->rnc_category_id = Input::get('rnc_category_id');
            $model->where_published_id = Input::get('where_published_id');
            $model->publication_no = Input::get('publication_no');
            $model->details = Input::get('details');
            $model->searching = Input::get('searching');
            $model->benefit_share= Input::get('benefit_share');

            $model->free_type_student= Input::get('free_type_student');
            $model->free_type_faculty= Input::get('free_type_faculty');
            $model->free_type_non_user= Input::get('free_type_non_user');

            $model->price = Input::get('price');
            $model->note = Input::get('note');
            $model->status = Input::get('status');
            $model->reviewed_by = Input::get('reviewed_by');

            if (Input::hasFile('file'))
            {
                $files = Input::file('file');
                $destinationPath = public_path() . '/rnc_file';
                $filename =  $files->getClientOriginalName();
                $file = $filename;
                $files->move($destinationPath, $file);
                $model->file = $file;
            }
            $model->save();

            Session::flash('message', "Successfully Added $flashmsg !");
            return Redirect::back();
        } else {
            // failure, get errors
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function viewResearchPaper($id)
    {
        $view_r_c = RncResearchPaper::find($id);
        return View::make('rnc::amw.research_paper.view',compact('view_r_c'));
    }

    public function editResearchPaper($id)
    {
        $edit_r_c = RncResearchPaper::find($id);
        $edit_category = array('' => 'Select RnC Category ') + RncCategory::lists('title', 'id');
        $edit_publisher = array('' => 'Select RnC Publisher') + RncPublisher::lists('title', 'id');
        $edit_reviewed_by = array('' => 'Select Reviewer') + User::FacultyList();
        return View::make('rnc::amw.research_paper.edit',compact('edit_r_c','edit_category','edit_publisher','edit_reviewed_by'));
    }


    public function updateResearchPaper($id)
    {
        $data = Input::all();
        $model = RncResearchPaper::find($id);
        if ($model->validate($data)) {
            $model->title = Input::get('title');
            $flashmsg = $model->title;
            $model->abstract = Input::get('abstract');
            $model->rnc_category_id = Input::get('rnc_category_id');
            $model->where_published_id = Input::get('where_published_id');
            $model->publication_no = Input::get('publication_no');
            $model->details = Input::get('details');
            $model->searching = Input::get('searching');
            $model->benefit_share= Input::get('benefit_share');
            $model->price = Input::get('price');
            $model->note = Input::get('note');
            $model->status = Input::get('status');
            $model->reviewed_by = Input::get('reviewed_by');

            if (Input::hasFile('file'))
            {
                $files = Input::file('file');
                $destinationPath = public_path() . '/rnc_file';
                $filename =  $files->getClientOriginalName();
                $file = $filename;
                $files->move($destinationPath, $file);
                $model->file = $file;
            }
            $model->save();
            Session::flash('message', "Successfully Updated $flashmsg !");
            return Redirect::back();
        } else {
            // failure, get errors
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function deleteResearchPaper($id)
    {
        try {
            $data= RncResearchPaper::find($id);
            $flash_msg = $data->title;
            if($data->delete())
            {
                Session::flash('message', "Research Paper $flash_msg Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchdeleteResearchPaper($id)
    {
        try {
            RncResearchPaper::destroy(Request::get('id'));
            Session::flash('message', "Success: Selected items Deleted ");
            return Redirect::back();
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function researchPaperDownload($rnc_id)
    {
        $download = RncResearchPaper::find($rnc_id);
        $file = $download->file;
        $path = public_path("rnc_file/" . $file);
        $headers = array(
            'Content-Type: application/pdf',
        );
        $file_name = $download->title.".".'pdf';
        return Response::download($path, $file_name, $headers);
    }

    public function researchPaperRead($rnc_id)
    {
        $download = RncResearchPaper::find($rnc_id);
        $file = $download->file;
        $path = public_path("rnc_file/" . $file);
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; '.$file,
        ]);
    }

    public function researchPaperComment($rnc_r_p_id)
    {
        $rnc_r_p = RncResearchPaper::findOrFail($rnc_r_p_id);
        $rnc_r_p_cmnt = RncResearchPaperComment::where('rnc_research_paper_id', $rnc_r_p_id)->get();
        $commented_to = array('' => 'Commented To') + User::WriterNameList();
        return View::make('rnc::amw.research_paper.rnc_research_paper_comment',
            compact('rnc_r_p','rnc_r_p_cmnt','rnc_r_p_id','commented_to'));
    }

    public function saveComment()
    {
        $info = Input::all();

        $model = new RncResearchPaperComment();
        $model->rnc_research_paper_id = $info['rnc_research_paper_id'];
        $model->comments = $info['comments'];
        $model->commented_to = $info['commented_to'];
        $model->commented_by = Auth::user()->get()->id;

        $user_name = User::FullName($model->commented_to);
        if($model->save()){
            Session::flash('message', 'Comments added To: ' . $user_name );
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()->with('errors', 'invalid');
        }
    }

    //new
    public function listWriterBeneficial($rnc_r_p_id)
    {
        $writer_info = RncResearchPaperWriter::with('relRncResearchPaper','relRncWriterBeneficial' ,'relUser', 'relUser.relUserProfile')
            ->where('rnc_research_paper_id', $rnc_r_p_id)->get();

        $r_p = RncResearchPaper::where('id', $rnc_r_p_id)->first();

        $rp_benefit_share = RncResearchPaper::where('id' ,'=', $rnc_r_p_id)->first()->benefit_share;
        $total = DB::table('rnc_writer_beneficial')->where('rnc_research_paper_id' ,'=', $rnc_r_p_id)->sum('value');
        $cal_benefit_share = $rp_benefit_share + $total ;

        return View::make('rnc::amw.research_paper.r_p_w_f.add_writer_beneficial',
            compact('rnc_r_p_id','writer_info','r_p','rp_benefit_share','cal_benefit_share'));

    }

    // AJax : Writer Name Search and Get

    public function ajaxGetWriterNameAutoComplete ()
    {
        $term = Input::get('term');
        $results = array();
        $queries = DB::table('user_profile')
            ->where('first_name', 'LIKE', '%'.$term.'%')
            ->orWhere('middle_name', 'LIKE', '%'.$term.'%')
            ->orWhere('last_name', 'LIKE', '%'.$term.'%')
            ->take(12)->get();

        foreach ($queries as $query)
        {
            $results[] = [
                'label' => $query->first_name.' '.$query->middle_name.' '.$query->last_name ,
                'writer_user_id' => $query->user_id ,
                'name' => $query->first_name.' '.$query->middle_name.' '.$query->last_name ,
            ];
        }
        return Response::json($results);
    }

    public function store_writer_beneficial()
    {
        #$data = Input::all();
        for($i = 0; $i < count(Input::get('writer_user_id')) ; $i++){
            $dt[] = [
                'rnc_research_paper_id' => Input::get('rnc_research_paper_id'),
                'writer_user_id'=> Input::get('writer_user_id')[$i],
                'value'=> Input::get('value')[$i],
            ];
        }
        DB::beginTransaction();
        try{
            foreach($dt as $key => $values){
                $model = new RncResearchPaperWriter();
                $model->rnc_research_paper_id = $values['rnc_research_paper_id'];
                $model->writer_user_id = $values['writer_user_id'];
                if($model->save()){
                    $model2 = new RncWriterBeneficial();
                    $model2->rnc_research_paper_writer_id = $model->id;
                    $model2->rnc_research_paper_id = $values['rnc_research_paper_id'];
                    $model2->value = $values['value'];
                    $model2->save();
                }
            }
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }

    public function fac_ajax_delete_req_detail()
    {
        $id = Input::get('id');
        $ben_id = Input::get('ben_id');

        DB::beginTransaction();
        try {
            if(RncWriterBeneficial::destroy($ben_id)){
                RncResearchPaperWriter::destroy($id);
            }
            DB::commit();
            return Response::json("Successfully Deleted");
        }
        catch(exception $ex){
            DB::rollback();
            return Response::json("Can not be Deleted !");
        }

    }

    public function updateWriterBeneficial( )
    {
        $ben_id = Input::all();

        DB::beginTransaction();
        try{
            $model = RncResearchPaperWriter::find(Input::get('writer_id'));
            $model->rnc_research_paper_id = Input::get('rnc_research_paper_id');
            $model->writer_user_id = Input::get('writer_user_id');
            if($model->update()){
                $model2 = RncWriterBeneficial::find(Input::get('beneficial_id'));
                $model2->rnc_research_paper_writer_id = Input::get('writer_id');
                $model2->rnc_research_paper_id = Input::get('rnc_research_paper_id');
                $model2->value = Input::get('value');
                $model2->update();
            }

            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    // Transaction Head

    public function indexRNCTransactionHead( )
    {

        $model = RncTransaction::with('relRncResearchPaper','relUser','relUser.relUserProfile')
            ->orderBy('id', 'DESC')->get();

        $user_list = User::FullNameWithRoleNameList();

        $rnc_list = array('' => 'Select Research paper') + RncResearchPaper::lists('title','id');

        return View::make('rnc::amw.rnc_transaction_head.index',
            compact('user_list','rnc_list','model'));

    }

    public function rncStoreTransaction( )
    {
        if($this->isPostRequest()){
//            $salary_trn_no = HrTrnNoSetup::where('title', '=', "Salary Transaction Number")
//                ->select(DB::raw('CONCAT (code, LPAD(last_number + 1, 8, 0)) as number'))
//                ->first()->number;
            $input_data = Input::all();
            //print_r($input_data);exit;
            $inp_data = [
                'user_id' => $input_data['user_id'],
                'issue_date' => $input_data['issue_date'],
                'rnc_research_paper_id' => $input_data['rnc_research_paper_id'],
                'total_amount' => 0,
//                'status'=> "open",
            ];
            $model = new RncTransaction();
            if($model->validate($inp_data)) {
                DB::beginTransaction();
                try {
                    $model->create($inp_data);
//                    DB::table('hr_trn_no_setup')->where('title', '=', "Salary Transaction Number")
//                        ->update(array('last_number' => substr($salary_trn_no,4)));
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            return Redirect::back();
        }
    }

    public function rncShowTransaction($r_t_id)
    {
        $data = RncTransaction::findOrFail($r_t_id);
        return View::make('rnc::amw.rnc_transaction_head.view', compact('data'));
    }

    public function rncEditConfirmTransaction($r_t_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = RncTransaction::findOrFail($r_t_id);

            if($model->validate($input_data)){
                DB::beginTransaction();
                try{
                    $model->update($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            $model = RncTransaction::findOrFail($r_t_id);
            $user_list = User::FullNameWithRoleNameList();
            $rnc_list = array('' => 'Select Research paper') + RncResearchPaper::lists('title','id');

            return View::make('rnc::amw.rnc_transaction_head.edit', compact('user_list','model','rnc_list'));
        }
    }

    public function rncTransactionDetail($r_t_id)
    {
        $model = RncTransactionFinancial::with('relRncTransaction')
            ->where('rnc_transaction_id','=', $r_t_id)
            ->orderBy('id', 'DESC')
            ->get();

        $rnc_name = RncTransaction::with('relRncResearchPaper')->where('id',$r_t_id)->first();

        return View::make('rnc::amw.rnc_transaction_detail.index', compact('model','r_t_id','salary','rnc_name'));

    }

    public  function storeTransactionDetail()
    {
        for($i = 0; $i < count(Input::get('rnc_transaction_id')) ; $i++){
            $dt[] = [
                'rnc_transaction_id' => Input::get('rnc_transaction_id')[$i],
                'transaction_type'=> Input::get('transaction_type')[$i],
                'amount'=> Input::get('amount')[$i],
            ];
        }

        DB::beginTransaction();
        try{
            $model = new RncTransactionFinancial();
            foreach($dt as $values){

                $model->create($values);

                // Update rnc_transaction
                $trn_model = RncTransaction::find($values['rnc_transaction_id']);
                $trn_model->total_amount = $trn_model->total_amount + $values['amount'];
                $trn_model->save();
            }


            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function ajaxDeleteRNCTrnDtl()
    {
        $id = Input::get('id');
        $rnc_dt = RncTransactionFinancial::find($id);
        DB::beginTransaction();
        try {
            RncTransactionFinancial::destroy($id);

            // Update rnc_transaction
            $trn_model = RncTransaction::find($rnc_dt->rnc_transaction_id);
            $trn_model->total_amount = $trn_model->total_amount - $rnc_dt->amount;
            $trn_model->save();

            DB::commit();
            return Response::json("Successfully Deleted");
        }
        catch(exception $ex){
            DB::rollback();
            return Response::json("Can not be Deleted !");
        }
    }

    public function rncConfirmTransaction($r_t_id )
    {
        $input_data = Input::all();
        DB::beginTransaction();
        try{

            $model = RncTransaction::findOrFail($r_t_id);
            $model->status = "confirmed";
            $model->update($input_data);

            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }



    public function rncShowConfirmTransaction($r_t_id)
    {
        $data = RncTransaction::where('status', '!=','denied')->findOrFail($r_t_id);

        $model = RncTransactionFinancial::with('relRncTransaction')
            ->where('rnc_transaction_id', $data->id)
            ->orderBy('id', 'DESC')
            ->get();

        return View::make('rnc::amw.rnc_transaction_head.view_confirmation', compact('data','model'));

    }

    public function rncTransactionHeadBatchDelete( )
    {
        DB::beginTransaction();
        try{
            HrSalaryTransactionHead::destroy(Request::get('id'));
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }



    public function rncDestroyTransaction($r_t_id)
    {
        DB::beginTransaction();
        try{
            RncTransaction::destroy($r_t_id);
            DB::commit();
            Session::flash('message', 'Successfully Deleted !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }


}