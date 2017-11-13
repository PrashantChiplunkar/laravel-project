<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserDetails;

class PagesController extends Controller
{
	
    public function about()
    {
    	//$name = 'Prashant';
    	//$email = 'prashant@pretr.com';
    	//$todos = [
    			//	'Install nginx','Install composer','Install laravel', 'Start studing laravel'
    			//];
		
    	//$todos =[];
    	/*$data =; [];
    	$data['name'] = 'Prashant';
    	$data['email'] = 'prashant@pretr.com';*/
    	/*$data = {
    		'name': 'Prashant',
    		'email': 'prashant@pretr.com'
    	}*/

        //return view('pages.contact')->with('name', $name);
        //return view('pages.contact',$data);

    	$db_obj = new \App\DBconnection;
		$data = $db_obj->save_data();
		
        if(!empty($_SESSION["id"]))
        return view('pages.about', compact('data'));
        else
        return redirect()->action('AuthController@login');
    	
        //return view('pages.contact', compact('data'));
        
    }

    public function user_data($id){
    	$db_obj = new \App\DBconnection;
    	$data = $db_obj->get_specific_user($id);
        //$ids= get_specific_user_id($id);
        $data = $data[0];
    	return view('pages.user', compact('data'));
    }

    public function contact()
    {
        if(empty($_SESSION["id"]))
        return view('pages.contact');
        else
        return redirect()->action('DashboardController@dashboard');
    }

    public function store(Request $request)
    {
    	//echo "<pre>";
    	//print_r($Request->gender);
    	//print_r(Request::all());
        //die();
        $db_obj = new \App\DBconnection;
        //if($request->name && $request->email && $request->mobile && $request->street && $request->city)

        $email_id = preg_replace('/\s+/', '' ,strtolower($request->get("email")));
        if(!$db_obj->is_present($email_id)){
    	$data_array = array('name' => ucwords(strtolower($request->get("name"))),
                            'email_id' => $email_id,
                            'mobile' => $request->get("mobile"),
                            'gender' => ucfirst($request->get("gender")),
                            'address' => array(
                                                'street' => $request->get("street"), 
                                                'city' => ucfirst($request->get("city")), 
                                                'state' => ucfirst($request->get("state"))
                                                 
                            ));
        // echo "<pre>";
        // print_r($data_array);
        // die();
        
        $data = $db_obj->store_new_user($data_array);
        
            //echo "<script>alert('Your response successfully recorded.')</script>";
        
    }
        //print_r($data);
        //return view('pages.about', compact('data'));
        return redirect()->action('PagesController@contact');

    }	


    public function update_user_data(Request $request,$id){
        $db_obj = new \App\DBconnection;
        $data_array = array('name' => ucwords($request->name),
                            
                            'mobile' => $request->mobile,
                            'gender' => ucfirst($request->gender),
                            'address' => array(
                                                'street' => $request->street, 
                                                'city' => ucfirst($request->city), 
                                                'state' => ucfirst($request->state)
                            ));
        $data = $db_obj->update_user($id,$data_array);
        echo "<script>alert('Your response successfully recorded.')</script>";
        return redirect()->action('PagesController@user_data',$id);
    }



    public function delete(Request $request,$id){
        //return $id;
        $db_obj = new \App\DBconnection;
        $data = $db_obj->delete_user($id);
        
    }

    public function get_employees()
    {
        $user_obj = new UserDetails;
        $data = $user_obj->get_users();
        

        return view('pages.employees', compact('data'));
    }

}
