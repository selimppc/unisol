<?php

class RnCStudentController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    // Config
    public function indexConfig()
    {
        $config = RnCConfig::orderBy('id', 'DESC')->paginate(5);
        return View::make('rnc::student.config.index', compact('config'));
    }

    public function storeConfig()
    {
        $data = Input::all();
        $config = new RnCConfig();
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
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function showConfig($id)
    {
        $config = RnCConfig::find($id);
        if($config)
        {
            return View::make('rnc::student.config.show',compact('config'));
        }
        App::abort(404);
    }

    public function editConfig($id)
    {
        $config = RnCConfig::find($id);
        return View::make('rnc::student.config.edit',compact('config'));
    }

    public function updateConfig($id)
    {
        $data = Input::all();
        $config = RnCConfig::find($id);
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
            $config= RnCConfig::find($id);
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
            RnCConfig::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Config Batch Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Config has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

    //Research Paper

    public function indexResearchPaper()
    {
        $research_paper = RnCResearchPaper::orderBy('id', 'DESC')->paginate(5);
        $rnc_category = array('' => 'Select RnC Category ') + RnCCategory::lists('title', 'id');
        $rnc_publisher = array('' => 'Select RnC Publisher') + RnCPublisher::lists('title', 'id');
        $reviewed_by = array('' => 'Select Reviewer') + User::FacultyList();

        // new code for transaction
        $user_id = Auth::user()->get()->id;
        $model = new RnCResearchPaper();

        $model = $model->leftJoin('rnc_transaction as rnc_t', function($query)  use($user_id){
            $query->on('rnc_t.rnc_research_paper_id', '=', 'rnc_research_paper.id');
            $query->where('rnc_t.user_id',  '=', $user_id);
        });
        $model = $model->leftJoin('rnc_financial_transaction as rnc_ft', function($query)  use($user_id){
            $query->on('rnc_ft.rnc_transaction_id', '=', 'rnc_t.id');
        });

        $model = $model->get(array('rnc_research_paper.id as id', 'rnc_research_paper.title as title',
            'rnc_research_paper.abstract as abstract', 'rnc_research_paper.rnc_category_id',
            'rnc_research_paper.where_published_id', 'rnc_research_paper.publication_no',
            'rnc_research_paper.free_type_student', 'rnc_research_paper.free_type_faculty', 'rnc_research_paper.free_type_non_user',
            'rnc_research_paper.details','rnc_research_paper.file', 'rnc_research_paper.searching',
            'rnc_research_paper.benefit_share', 'rnc_research_paper.price', 'rnc_research_paper.note',
            'rnc_research_paper.status', 'rnc_research_paper.reviewed_by',

            'rnc_t.user_id', 'rnc_t.rnc_research_paper_id','rnc_t.count as rnc_tCount',
            'rnc_t.issue_date', 'rnc_t.status as rnc_tStatus',

            'rnc_ft.rnc_transaction_id', 'rnc_ft.amount', 'rnc_ft.transaction_type',
            'rnc_ft.status as rnc_ft_status'
        ));

        if (Session::get('cartResearchPaper')) {
            $all_rnc_research_paper_ids = Session::get('cartResearchPaper');
            $rnc_research_papers = RnCResearchPaper::with('relRnCCategory', 'relRnCPublisher')->whereIn('id', $all_rnc_research_paper_ids)->get();
        } else {
            $rnc_research_papers = array();
        }
        return View::Make('rnc::student.research_paper.index',
            compact('research_paper','rnc_category','rnc_publisher','reviewed_by','rnc_research_papers','model'));
    }

    public function addRPToStudentCart($rnc_rp_id)
    {
        if ($rnc_rp_id) {
            $prev_added_r_p_id = Session::get('cartResearchPaper');
            $all_cart_r_p_ids = array_merge(array($rnc_rp_id), (array)$prev_added_r_p_id);
            array_unique($all_cart_r_p_ids);
            Session::put('cartResearchPaper', $all_cart_r_p_ids);
        }
        return Redirect::back();
    }

    public function viewRPCart()
    {
        $all_cart_r_p_ids = Session::get('cartResearchPaper');
        $all_cart_r_ps = RnCResearchPaper::with('relRnCCategory', 'relRnCPublisher')
            ->whereIn('id', $all_cart_r_p_ids)->get();
        $number = count($all_cart_r_ps);
        $sum = $all_cart_r_ps->sum('price');
        return View::make('rnc::student.research_paper.view_research_paper', compact('all_cart_r_p_ids', 'all_cart_r_ps', 'number', 'sum'));
    }

    public function removeRPFromCart($id)
    {
        $all_cart_r_p_ids = Session::get('cartResearchPaper');
        // Remove array item by array_search
        if (($key = array_search($id, $all_cart_r_p_ids)) !== false) {
            unset($all_cart_r_p_ids[$key]);
        }
        Session::set('cartResearchPaper', $all_cart_r_p_ids);
        return Redirect::back();
    }

    public function researchPaperDownload($rnc_rp_id)
    {
        $model = RnCResearchPaper::find($rnc_rp_id);
        $sample = DB::table('rnc_transaction')->where('rnc_research_paper_id', $model->id)->first()->count;

        DB::table('rnc_transaction')->where('rnc_research_paper_id', $rnc_rp_id)
            ->update(array('count' => $sample + 1));


        $download = RnCResearchPaper::find($rnc_rp_id);
        $file = $download->file;
        $path = public_path("rnc_file/" . $file);
        $headers = array(
            'Content-Type: application/pdf',
        );
        $file_name = $download->title.".".'pdf';
        return Response::download($path, $file_name, $headers);
    }

    public function purchasedResearchPaperDownload($rnc_rp_id)
    {
        $model = RnCResearchPaper::find($rnc_rp_id);
        $sample = DB::table('rnc_transaction')->where('rnc_research_paper_id', $model->id)->first()->count;

        DB::table('rnc_transaction')->where('rnc_research_paper_id', $rnc_rp_id)
            ->update(array('count' => $sample + 1));

        $download = RnCResearchPaper::find($rnc_rp_id);
        $file = $download->file;
        $path = public_path("rnc_file/" . $file);
        $headers = array(
            'Content-Type: application/pdf',
        );
        $file_name = $download->title.".".'pdf';
        return Response::download($path, $file_name, $headers);
    }

    public function saveInfoToTransactionTable()
    {
        $all_cart_r_p_ids = Session::get('cartResearchPaper');

        $all_cart_r_ps = RnCResearchPaper::with('relRnCCategory', 'relRnCPublisher')
            ->whereIn('id',$all_cart_r_p_ids)
            ->get();

        $tr_error = '';
        $tr_info = '';
        if($all_cart_r_p_ids){
            foreach($all_cart_r_ps as $key => $cb){
                $transaction = new RnCTransaction();
                $transaction->user_id = Auth::user()->get()->id;
                $transaction->rnc_research_paper_id = $cb->id;
                $transaction->issue_date = date('d-m-y H:i:s');
                $transaction->count = 0;
                $transaction->status = 'received';

                if ($transaction->save())
                {
                    // save to lib_book_financial_transaction table
                    $f_transaction = new RnCFinancialTransaction();
                    $f_transaction->rnc_transaction_id = $transaction->id;
                    $ultimate_price = $cb->price - ($cb->price * $cb->free_type_student)/100;
                    $f_transaction->amount = $ultimate_price;
                    $f_transaction->transaction_type = 'full';
                    $f_transaction->status = 'paid';
                    $f_transaction->save();

                    if($f_transaction->save())
                    {
                        $tr_info[] = 'Research Paper "'.$cb->title.'" is paid. You can download it.';
                        if (($key = array_search($cb->id, $all_cart_r_p_ids)) !== false) {
                            unset($all_cart_r_p_ids[$key]);
                        }
                    }else{
                        $tr_error[] = 'At transaction of Research Paper "'.$cb->title.'" is done but payment is not done. So please try once again.';
                    }
                }else{
                    $tr_error[] = 'Error at transaction of Research Paper "'.$cb->title.'". So please try once again.';
                }
            }
            // set if any item is not successfully added.
            Session::set('cartResearchPaper', $all_cart_r_p_ids);
            if($tr_error){
                Session::flash('errors', implode("<br />", $tr_error));
                return Redirect::back();
            }elseif($tr_info){
                Session::flash('info', implode("<br />", $tr_info));
                return Redirect::route('student.research-paper.my-item');
            }else{
                return Redirect::back();
            }
        }
    }

    public function myRP()
    {
        $my_cart_books = RnCTransaction::with('relRnCResearchPaper','relRnCFinancialTransaction')
            ->where('user_id', Auth::user()->get()->id)
            ->get();

        return View::make('rnc::student.research_paper.my_item',compact('all_cart_book_ids','my_cart_books','sum'));
    }

    public function paymentMethodRP()
    {
        $all_cart_r_p_ids = Session::get('cartResearchPaper');
        return View::make('rnc::student.research_paper.payment', compact('all_cart_r_p_ids'));
    }

    public function researchPaperRead($rnc_rp_id)
    {
        $download = RnCResearchPaper::find($rnc_rp_id);
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

    public function storeResearchPaper()
    {
        $data = Input::all();
        $model = new RnCResearchPaper();
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
        $view_r_c = RnCResearchPaper::find($id);
        return View::make('rnc::student.research_paper.view',compact('view_r_c'));
    }

    public function editResearchPaper($id)
    {
        $edit_r_c = RnCResearchPaper::find($id);
        $edit_category = array('' => 'Select RnC Category ') + RnCCategory::lists('title', 'id');
        $edit_publisher = array('' => 'Select RnC Publisher') + RnCPublisher::lists('title', 'id');
        $edit_reviewed_by = array('' => 'Select Reviewer') + User::FacultyList();
        return View::make('rnc::student.research_paper.edit',compact('edit_r_c','edit_category','edit_publisher','edit_reviewed_by'));
    }


    public function updateResearchPaper($id)
    {
        $data = Input::all();
        $model = RnCResearchPaper::find($id);
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
            $data= RnCResearchPaper::find($id);
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
            RnCResearchPaper::destroy(Request::get('id'));
            Session::flash('message', "Success: Selected items Deleted ");
            return Redirect::back();
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function researchPaperComment($rnc_r_p_id)
    {
        $rnc_r_p = RnCResearchPaper::findOrFail($rnc_r_p_id);
        $rnc_r_p_cmnt = RnCResearchPaperComment::where('rnc_research_paper_id', $rnc_r_p_id)->get();
        $commented_to = array('' => 'Commented To') + User::WriterNameList();
        return View::make('rnc::student.research_paper.rnc_research_paper_comment',
            compact('rnc_r_p','rnc_r_p_cmnt','rnc_r_p_id','commented_to'));
    }

    public function saveComment()
    {
        $info = Input::all();

        $model = new RnCResearchPaperComment();
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
        $writer_info = RnCResearchPaperWriter::with('relRnCResearchPaper','relRnCWriterBeneficial' ,'relUser', 'relUser.relUserProfile')
            ->where('rnc_research_paper_id', $rnc_r_p_id)->get();

        $r_p = RnCResearchPaper::where('id', $rnc_r_p_id)->first();

        $rp_benefit_share = RnCResearchPaper::where('id' ,'=', $rnc_r_p_id)->first()->benefit_share;
        $total = DB::table('rnc_writer_beneficial')->where('rnc_research_paper_id' ,'=', $rnc_r_p_id)->sum('value');
        $cal_benefit_share = $rp_benefit_share + $total ;

        return View::make('rnc::student.research_paper.r_p_w_f.add_writer_beneficial',
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
                $model = new RnCResearchPaperWriter();
                $model->rnc_research_paper_id = $values['rnc_research_paper_id'];
                $model->writer_user_id = $values['writer_user_id'];
                if($model->save()){
                    $model2 = new RnCWriterBeneficial();
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

    public function std_ajax_delete_req_detail()
    {
        $id = Input::get('id');
        $ben_id = Input::get('ben_id');

        DB::beginTransaction();
        try {
            if(RnCWriterBeneficial::destroy($ben_id)){
                RnCResearchPaperWriter::destroy($id);
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
            $model = RnCResearchPaperWriter::find(Input::get('writer_id'));
            $model->rnc_research_paper_id = Input::get('rnc_research_paper_id');
            $model->writer_user_id = Input::get('writer_user_id');
            if($model->update()){
                $model2 = RnCWriterBeneficial::find(Input::get('beneficial_id'));
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



}