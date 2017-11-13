<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Authenticate;
use App\UserDetails;

//session_start();

class AuthController extends Controller
{	
	//private $auth_obj = new App\Authenticate;

    public function login(){
        if(empty($_SESSION["id"]))
    	return view('pages.auth.login');
        else
        return redirect()->action('DashboardController@dashboard');
    }

    public function login_credentials(Request $request){
    	$auth_obj = new Authenticate;
    	$flag = 0;
    	$email = preg_replace('/\s+/', '' ,strtolower($request->get("email")));
    	$pass = md5($request->get("pass"));
    	$data = $auth_obj->check_login();

    	foreach ($data as $each) {
    		
    	if($each["email_id"] == $email){
    		$flag = 0;
    		if($each["password"] == $pass){
    			echo "successful";
                $_SESSION["id"] = $each["_id"];
    			break;
    		}
    		else{
    			echo "password";
    			break;
    		}
    	}
    	else{
    		$flag = 1;
    	}
    	}

    	if($flag == 1)
    		echo "email";
    	//return redirect()->action('AuthController@login_credentials');
    }

    public function register()
    {
        if(empty($_SESSION["id"]))
        return view('pages.auth.register');
        else
        return redirect()->action('DashboardController@dashboard');
    }

    public function register_user(Request $request)
    {	
    	$auth_obj = new Authenticate;
        $user_obj = new UserDetails;
    	$email_id = preg_replace('/\s+/', '' ,strtolower($request->get("email")));

    	$array = array('name' => $request->get("name"),
    					'email_id' => $email_id,
    					'password' => md5($request->get("pass"))
    					);
    	//return $array;
        $data = $auth_obj->register_new_user($array);
        $id = $auth_obj->get_id($email_id); 
        $data_array = array('login_id' => $id,
                            'name' => $request->get("name"),
                            'email_id' => $email_id,
                            'mobile' => '',
                            'gender' => '',
                            'image' => 'default.png',
                            'address' => array(
                                                'street' => '', 
                                                'city' => '', 
                                                'state' => ''
                                                )
                            
                            );

    	
        $data1 = $user_obj->store_user($data_array);
    	return $data;
    	//return redirect()->action('AuthController@login');
    	//return $request->get("name")." ".$request->get("email")." ".$request->get("pass");
    	//return $data;
    	// print_r($request->all());
    	
    	// print_r($request->get('name'));
  		//return view('pages.auth.login');
    }

    

    


    public function logout()
    {
        $_SESSION["id"] = "";
       return redirect()->action('AuthController@login');
    }


    
}
