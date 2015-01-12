<?php

class ExmPrepareQuestionPaperController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $prepare_question_paper = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
        return View::make('examination::prepare_question_paper.index')->with('prepareQuestionPaper', $prepare_question_paper);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createQuestionPaper()
	{
        return View::make('examination::prepare_question_paper.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeQuestionPaper()
	{
        $data = Input::all();

        $prepare_question_paper = new ExmQuestion();

        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper->exm_exam_list_id = Input::get('exm_exam_list_id');
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->created_by = Input::get('created_by');
            $prepare_question_paper->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('prepare_question_paper/index');
        }
        else
        {
            // failure, get errors
            $errors = $prepare_question_paper->errors();
            Session::flash('errors', $errors);

            return Redirect::to('prepare_question_paper/create');
        }

	}


    public function show($id)
    {
        $prepare_question_paper = ExmQuestion::find($id);

        if($prepare_question_paper)
        {
            return View::make('examination::prepare_question_paper.show')->with('prepareQuestionPaper',$prepare_question_paper);
        }
        App::abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $prepare_question_paper = ExmQuestion::find($id);

        // Show the edit employee form.
        return View::make('examination::prepare_question_paper.edit')->with('prepareQuestionPaper',$prepare_question_paper);
    }

    public function update($id)
    {
        // get the POST data
        $data = Input::all($id);
        // create a new model instance
        $prepare_question_paper = new ExmQuestion();
        // attempt validation
        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper = ExmQuestion::find($id);

            $prepare_question_paper->exm_exam_list_id = Input::get('exm_exam_list_id');
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->created_by = Input::get('created_by');

            $prepare_question_paper->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('prepare_question_paper/index');
        }
        else
        {
            // failure, get errors
            $errors = $prepare_question_paper->errors();
            Session::flash('errors', $errors);

            return Redirect::to('prepare_question_paper/edit');
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
            ExmQuestion::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }


    public function batchDelete()
    {
        ExmQuestion::destroy(Request::get('id'));
        return Redirect::back();
    }

}
