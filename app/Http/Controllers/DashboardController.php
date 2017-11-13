<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Authenticate;
use App\UserDetails;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user_obj = new UserDetails;
        if(empty($_SESSION["id"]))
        return redirect()->action('AuthController@login');
        else{
            $id = $_SESSION["id"];
            $data = $user_obj->get_user($id);
            $data = $data[0];
            // echo "<pre>";
            //  print_r($data);
            //  die();
           // $data = $data[0];
        return view('pages.dashboard', compact('data'));
        }
    }

    public function update_dashboard(Request $request){
        $user_obj = new UserDetails;
        $id = $_SESSION["id"];
        $data_array = array('name' => ucwords(strtolower($request->name)),
                            
                            'mobile' => $request->mobile,
                            'gender' => $request->gender,
                            'address' => array(
                                                'street' => ucfirst($request->street), 
                                                'city' => ucfirst($request->city), 
                                                'state' => ucfirst($request->state)
                                            ),
                            'image' => 'default.png'
                            );

        // echo "<pre>";
        //     print_r($data_array);
        // die();
        //$a ="abc";
        $data = $user_obj->update_details($id,$data_array);
        return redirect()->action('DashboardController@dashboard');

    }

    public function upload_image(Request $request)
    {
    	// $user_obj = new UserDetails;
    	// $id = $_SESSION["id"];
    	//return $request->image;
    	//if($request->hasFile('image')){
    	return $request->file("abc");
 
    	// $data_array = array(
     //                        'image' => $request->image
     //                        );

     //    $data = $user_obj->update_details($id,$data_array);
    	// return $request->image->storeAs('public','first_image.png');

    	// } 
    	// else
    	// return $request->image; 	
    }

    public function delete_picture()
    {
    	$user_obj = new UserDetails;
    	$id = $_SESSION["id"];
    	$data_array = array(
                            'image' => 'default.png'
                            );

        // echo "<pre>";
        //     print_r($data_array);
        // die();
        //$a ="abc";
        $data = $user_obj->update_details($id,$data_array);
        return redirect()->action('DashboardController@dashboard');
    }
}
