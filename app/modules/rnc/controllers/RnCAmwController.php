<?php

class RnCAmwController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    // Category
	public function indexCategory()
	{
        $model = RnCCategory::orderBy('id', 'DESC')->paginate(5);
        return View::make('rnc::amw.category.index', compact('model'));
	}

    public function storeCategory()
    {
        $data = Input::all();
        $model = new RnCCategory();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
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
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

    public function showCategory($id)
    {
        $model = RnCCategory::find($id);
        if($model)
        {
            return View::make('rnc::amw.category.show',compact('model'));
        }
        App::abort(404);
    }


    public function editCategory($id)
    {
        $model = RnCCategory::find($id);
        return View::make('rnc::amw.category.edit',compact('model'));
    }


    public function updateCategory($id)
    {
        $data = Input::all();
        $model = RnCCategory::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
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
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteCategory($id)
    {
        try {
            $model= RnCCategory::find($id);
            $name = $model->title;
            if($model->delete())
            {
                Session::flash('message', "$name Category Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeleteCategory()
    {
        try{
            RnCCategory::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Category Batch Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Category has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

    // Config
    public function indexConfig()
    {
        $config = RnCConfig::orderBy('id', 'DESC')->paginate(5);
        return View::make('rnc::amw.config.index', compact('config'));
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
            return View::make('rnc::amw.config.show',compact('config'));
        }
        App::abort(404);
    }


    public function editConfig($id)
    {
        $config = RnCConfig::find($id);
        return View::make('rnc::amw.config.edit',compact('config'));
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

    //Publisher
    public function indexPublisher()
    {
        $publisher = RnCPublisher::orderBy('id', 'DESC')->paginate(5);
        return View::make('rnc::amw.publisher.index', compact('publisher'));
    }

    public function storePublisher()
    {
        $data = Input::all();
        $publisher = new RnCPublisher();
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
        $publisher = RnCPublisher::find($id);
        if($publisher)
        {
            return View::make('rnc::amw.publisher.show',compact('publisher'));
        }
        App::abort(404);
    }


    public function editPublisher($id)
    {
        $publisher = RnCPublisher::find($id);
        return View::make('rnc::amw.publisher.edit',compact('publisher'));
    }


    public function updatePublisher($id)
    {
        $data = Input::all();
        $publisher = RnCPublisher::find($id);
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
            $publisher= RnCPublisher::find($id);
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
            RnCPublisher::destroy(Request::get('id'));
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
        $research_paper = RnCResearchPaper::orderBy('id', 'DESC')->paginate(5);
        $rnc_category = array('' => 'Select RnC Category ') + RnCCategory::lists('title', 'id');
        $rnc_publisher = array('' => 'Select RnC Publisher') + RnCPublisher::lists('title', 'id');
        $reviewed_by = array('' => 'Select Reviewer') + User::FacultyList();
        return View::Make('rnc::amw.research_paper.index',compact('research_paper','rnc_category','rnc_publisher','reviewed_by'));
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
        return View::make('rnc::amw.research_paper.view',compact('view_r_c'));
    }

    public function editResearchPaper($id)
    {
        $edit_r_c = RnCResearchPaper::find($id);
        $edit_category = array('' => 'Select RnC Category ') + RnCCategory::lists('title', 'id');
        $edit_publisher = array('' => 'Select RnC Publisher') + RnCPublisher::lists('title', 'id');
        $edit_reviewed_by = array('' => 'Select Reviewer') + User::FacultyList();
        return View::make('rnc::amw.research_paper.edit',compact('edit_r_c','edit_category','edit_publisher','edit_reviewed_by'));
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

    public function researchPaperDownload($rnc_id)
    {
        $download = RnCResearchPaper::find($rnc_id);
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
        $download = RnCResearchPaper::find($rnc_id);
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

    public function researchPaperComment($rnc_id)
    {
        $rnc_r_p = RnCResearchPaper::findOrFail($rnc_id);
        $rnc_r_p_cmnt = RnCResearchPaperComment::where('rnc_research_paper_id', $rnc_id)->get();
        $commented_to = array('' => 'Commented To') + User::WriterNameList();
        return View::make('rnc::amw.research_paper.rnc_research_paper_comment',
            compact('rnc_r_p','rnc_r_p_cmnt','rnc_id','commented_to'));

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




    //Writer

    public function indexRnCWriter($rnc_r_p_id)
    {
        $rnc_r_p_writer = RnCResearchPaperWriter::with('relRnCResearchPaper','relUser', 'relUser.relUserProfile')->latest('id')->where('rnc_research_paper_id' ,'=', $rnc_r_p_id)->get();
        //$rnc_r_p_writer_user = Auth::user()->get()->id;
        return View::make('rnc::amw.research_paper_writer.index', compact('rnc_r_p_writer','rnc_r_p_id','rnc_r_p_writer_user'));
    }


    // AJax Writer Name Search
    // first one

    public function ajaxGetWriterNameAutoComplete ()
    {
        $term = Input::get('term');
        $results = array();
        $queries = DB::table('user_profile')
            ->where('first_name', 'LIKE', '%'.$term.'%')
            ->orWhere('middle_name', 'LIKE', '%'.$term.'%')
            ->orWhere('last_name', 'LIKE', '%'.$term.'%')
            ->take(6)->get();
        foreach ($queries as $query)
        {
            $results[] = [
                'label' => $query->first_name.' '.$query->middle_name.' '.$query->last_name ,
                'user_id' => $query->user_id ,
            ];
        }
        return Response::json($results);
    }



    public function storeRnCWriter()
    {
        $data = Input::all();
        $rnc_r_p_writer_store = new RnCResearchPaperWriter();
        if($rnc_r_p_writer_store->validate($data))
        {
            DB::beginTransaction();
            try {
                $rnc_r_p_writer_store->create($data);
                DB::commit();
                Session::flash('message', "Writers Name Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Writer not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $rnc_r_p_writer_store->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }



    public function showRnCWriter($id)
    {
        $rnc_r_p_writer_show = RnCResearchPaperWriter::find($id);
        if($rnc_r_p_writer_show)
        {
            return View::make('rnc::amw.research_paper_writer.view',compact('rnc_r_p_writer_show'));
        }
        App::abort(404);
    }


    public function editRnCWriter($id)
    {
        $rnc_r_p_writer_edit = RnCResearchPaperWriter::find($id);
        $list_writer_name = User::WriterNameList();
        return View::make('rnc::amw.research_paper_writer.edit',compact('rnc_r_p_writer_edit','list_writer_name'));
    }


    public function updateRnCWriter($id)
    {
        $data = Input::all();
        //print_r($data);exit;
        $rnc_r_p_writer_update = RnCResearchPaperWriter::find($id);
        if($rnc_r_p_writer_update->validate($data))
        {
            DB::beginTransaction();
            try {
                $rnc_r_p_writer_update->update($data);
                DB::commit();
                Session::flash('message', "Writers Name Updates");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "Writers Name not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $rnc_r_p_writer_update->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteRnCWriter($id)
    {
        try {
            $rnc_r_p_writer_delete = RnCResearchPaperWriter::find($id);
            if($rnc_r_p_writer_delete->delete())
            {
                Session::flash('message', "Writers Name Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeleteRnCWriter()
    {
        try{
            RnCResearchPaperWriter::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Writers Name Batch Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Writers Name has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

    // Writer's Beneficial

    public function indexRnCBeneficial($rnc_r_p_id, $w_id)
    {
        $rnc_r_p_beneficial = RnCWriterBeneficial::with('relRnCResearchPaper','relRnCResearchPaperWriter')
            ->latest('id')
            ->where('rnc_research_paper_id' ,'=', $rnc_r_p_id)
            ->where('rnc_research_paper_writer_id' ,'=', $w_id)
            ->get();

        //print_r($rnc_r_p_beneficial);exit;

        $rp_benefit_share = RnCWriterBeneficial::with('relRnCResearchPaper')
            ->where('rnc_research_paper_id' ,'=', $rnc_r_p_id)
            ->first()->relRnCResearchPaper->benefit_share;

        $total = DB::table('rnc_writer_beneficial')->where('rnc_research_paper_id' ,'=', $rnc_r_p_id)->sum('value');

        $cal_benefit_share = $rp_benefit_share + $total ;

        return View::make('rnc::amw.research_paper_beneficial.index',
            compact('rnc_r_p_beneficial','rnc_r_p_id','w_id','rp_benefit_share','cal_benefit_share'));
    }

    public function storeRnCBeneficial()
    {
        $data = Input::all();
        //print_r($data);exit;

        $rnc_r_p_beneficial_store = new RnCWriterBeneficial();
        if($rnc_r_p_beneficial_store->validate($data))
        {
            DB::beginTransaction();
            try {
                $rnc_r_p_beneficial_store->create($data);
                DB::commit();
                Session::flash('message', "Writers Name Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Writer not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $rnc_r_p_beneficial_store->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

    public function showRnCBeneficial($id)
    {
        $rnc_r_p_beneficial_show = RnCWriterBeneficial::find($id);
        if($rnc_r_p_beneficial_show)
        {
            return View::make('rnc::amw.research_paper_beneficial.view',compact('rnc_r_p_beneficial_show'));
        }
        App::abort(404);
    }

    public function editRnCBeneficial($id )
    {
        $rnc_r_p_beneficial_edit = RnCWriterBeneficial::find($id);
        $list_writer_name = User::WriterNameList();
        return View::make('rnc::amw.research_paper_beneficial.edit',compact('rnc_r_p_beneficial_edit','list_writer_name','rnc_r_p_id'));
    }

    public function updateRnCBeneficial($id)
    {
        $data = Input::all();

        //print_r($data);exit;
        $rnc_r_p_beneficial_update = RnCWriterBeneficial::find($id);
        if($rnc_r_p_beneficial_update->validate($data))
        {
            DB::beginTransaction();
            try {
                $rnc_r_p_beneficial_update->update($data);
                DB::commit();
                Session::flash('message', "Writers Name Updated");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "Writers Name not updated. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $rnc_r_p_beneficial_update->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteRnCBeneficial($id)
    {
        try {
            $rnc_r_p_beneficial_delete = RnCWriterBeneficial::find($id);
            if($rnc_r_p_beneficial_delete->delete())
            {
                Session::flash('message', "Beneficial Name Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeleteRnCBeneficial()
    {
        try{
            RnCWriterBeneficial::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Beneficial Name Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Beneficial Name has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }


}
