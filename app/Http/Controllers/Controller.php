<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\UserDetails;
session_start();

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    
    public function __construct()
    {
        // Load your objects
        $user_obj = new UserDetails;
        if(!empty($_SESSION["id"])){
    	$id = $_SESSION["id"];
    	$data = $user_obj->get_user($id);
    	//$data = $data[0];
        // Make it available to all views by sharing it
        view()->share('name', $data[0]["name"]);
        view()->share('email', $data[0]["email_id"]);
    	}else
    	view()->share('name', "");
        view()->share('email', "");	
    }

}
