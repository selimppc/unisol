<?php

class RnCAmwController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }


	public function indexCategory()
	{
        $model = RnCCategory::orderBy('id', 'DESC')->paginate(10);

        return View::make('rnc::amw.category.index', compact('model'));

	}



	public function indexConfig()
	{
		//
	}


	public function indexPublisher()
	{
		//
	}


	public function indexResearchPaper()
	{
		//
	}


}
