<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Authenticate extends Eloquent
{
   	protected $collection = 'authenticate';
   	protected $fillable = ['name','email_id','password'];

   	public function register_new_user($array){
        $data = $this->create($array);
    }

    public function check_login(){
    	$data = $this->get()->toArray();
        return $data;
    	//console.log($data);
    }
    public function get_id($email){
      $data = $this->where('email_id',$email)->get()->toArray();
        return $data[0]["_id"];
      //console.log($data);
    }

}
