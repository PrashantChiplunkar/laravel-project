<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UserDetails extends Eloquent
{
    protected $collection = 'users';
    protected $fillable = ['login_id','name','email_id','mobile','address','street','city','gender','state','password','image'];

    public function store_user($array){
        $data = $this->create($array);
        //return $data;
    }
    public function get_user($id){
    	$data = $this->where('login_id',$id)->get()->toArray();
        return $data;
    	//console.log($data);
    }
    
    public function update_details($id,$array){
        $data = $this->where('login_id',$id)->update($array);
    }

    public function get_users(){
        $data = $this->get()->toArray();
        return $data;
    }
    
}
