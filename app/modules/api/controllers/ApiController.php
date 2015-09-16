<?php

class ApiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('api::google_login');
    }


    public function google_login($auth=NULL){

        if($auth == 'auth'){
            try{
                Hybrid_Endpoint::process();
            }catch (Exception $e){
                return $e->getMessage();
            }
            return;
        }


        $oauth = new Hybrid_Auth(app_path().'/config/google_auth.php');
        $provider = $oauth->authenticate('Google');
        $profile = $provider->getUserProfile();

        return print_r($profile);

    }

    public function google_logout(){
        $auth = new Hybrid_Auth(app_path().'/config/google_auth.php');
        $auth->logoutAllProviders();
        return View::make('app::goolge_login');
    }




}
