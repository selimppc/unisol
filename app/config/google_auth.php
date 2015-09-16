<?php
/**
 * Created by PhpStorm.
 * User: selimets
 * Date: 9/15/15
 * Time: 5:29 PM
 */

return array(
    "base_url" => "http://dev.etsb.com/api/gauth/auth",
    "providers" => array (
        "Google" => array (
            "enabled" => true,
            "keys"    => array ( "id" => "590108288857-1dfhaa8lneulbvb5tvjboao9lerqavcv.apps.googleusercontent.com", "secret" => "sj6zr2IwPa7SyjCXgQ8tw4Hk" ),
            "scope"           => "https://www.googleapis.com/auth/userinfo.profile ". // optional
                "https://www.googleapis.com/auth/userinfo.email"   , // optional
            "access_type"     => "offline",   // optional
            #"approval_prompt" => "force",     // optional
            #"hd"              => "domain.com" // optional
        )));
