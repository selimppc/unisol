<?php

class BaseController extends Controller {

    /*public function __construct(){
        //styles
        Asset::add('main_style', 'css/main.css');
        Asset::add('jquery', 'js/jquery.js');
        Asset::add('foundation_style', 'libs/foundation/stylesheets/foundation.min.css');
        Asset::add('foundation_icons', 'assets/foundation_icons_general/stylesheets/general_foundicons.css');
        Asset::add('jqueryui_style', 'libs/jquery-ui/css/smoothness/jquery-ui-1.9.1.custom.min.css');
        Asset::add('datatables_style', 'libs/datatables/media/css/jquery.dataTables.css');

        //scripts
        Asset::add('foundation_script', 'libs/foundation/javascripts/foundation.min.js');
        Asset::add('jqueryui_script', 'libs/jquery-ui/js/jquery-ui-1.9.1.custom.min.js');
        Asset::add('datatables_script', 'libs/datatables/media/js/jquery.dataTables.js');
        Asset::add('mustache_script', 'js/mustache.js');
        Asset::add('main_script', 'js/main.js');

        parent::__construct();
    }*/


	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout)->with('title','Welcome to ETSB!');
		}
	}

}
