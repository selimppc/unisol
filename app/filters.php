<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{

});


App::after(function($request, $response){
    $cookieName = Auth::getRecallerName();
    if (Session::has('cookie_expiration') && Auth::user()->check() && isset($_COOKIE[$cookieName])) {
        // get the (current/new) cookie values
        $cookieValue = Cookie::get($cookieName);
        $expiration = Session::get('cookie_expiration');

        // forget the session var
        Session::forget('cookie_expiration');

        // change the expiration time
        $cookie = Cookie::make($cookieName, $cookieValue, $expiration);
        return $response->withCookie($cookie);
    }
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
*/

Route::filter('auth', function(){
	//if (Auth::guest()){
    //if (Auth::admin()->guest()){
    if (Auth::user()->guest()){
		if (Request::ajax()){
			return Response::make('Unauthorized', 401);
		}else{
			return Redirect::guest('user/login');
		}
	}
});

/*
 * ===================================================================
 * Base Role for the system
 * ===================================================================
 */


Route::filter('amw', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'amw')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});


/*======================================================================
//For Academic Module
========================================================================*/
Route::filter('academicFaculty', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'faculty')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});

Route::filter('academicAmw', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'amw')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});


Route::filter('academicStudent', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'student')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});


/*======================================================================
//For admission Module
========================================================================*/
Route::filter('admFaculty', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'faculty')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});
Route::filter('admAmw', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'amw')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});

Route::filter('admStudent', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'student')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});

/*Route::filter('admPublic', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'public')
            return Redirect::guest('usersign/dashboard');
    }else{
        return Redirect::guest('user/login');
    }

});*/


/*======================================================================
//For Examination Module
========================================================================*/
Route::filter('exmFaculty', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'faculty')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});

Route::filter('exmAmw', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'amw')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});

Route::filter('exmStudent', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'student')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});




/*======================================================================
//For Library Module
========================================================================*/
Route::filter('librarian', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'librarian')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});

/*======================================================================
//Fees Module
========================================================================*/
Route::filter('feesAmw', function()
{
    if (Auth::user()->check()){
        $role_id = Auth::user()->get()->role_id;
        $role = User::hasRole($role_id);
        if($role != 'amw')
            return Redirect::guest('user-access');
    }else{
        return Redirect::guest('user/login');
    }

});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
*/

Route::filter('auth.basic', function() {
    return Auth::basic();
});

Route::filter('guest', function() {
    if (Auth::user()->check()) return Redirect::to('user/login');
});


/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

//Route::filter('localization', function() {
//    App::setLocale(Route::input('lang'));
//});

//Route::filter('localization', function() {
//    App::setLocale(Auth::user()->get()->locale);
//});

Route::filter('localization', function() {
    $locale = Route::input('lang');

//    if (!in_array($locale, array('en', 'fr')))
//        App::abort(404);

    App::setLocale($locale);
});

