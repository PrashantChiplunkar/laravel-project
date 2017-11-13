<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;



class DBconnection extends Eloquent
{
    protected $collection = 'contacts';
    protected $fillable = ['name','email_id','mobile','address','street','city','gender','state','password'];


    public function save_data(){
    	$name =  $this->get()->toArray();
    	//$name1 =  $this->get()->where('address.city', 'Mumbai')->toArray();

    	//console.log(1);
    	//echo "<pre>";

    	/*foreach ($name as $one) {
    		echo $one['name'];
    	}*/
    	//print_r($name['name']);
    	//return json_encode($name1);
    	//print_r($email);
    	return $name;
    	die();
    }

    public function get_specific_user($id){
    	$data = $this->where('_id',$id)->get()->toArray();
        return $data;
    	//console.log($data);
    }
    public function get_specific_user_id($id){
        $data = $this->where('_id',$id)->get()->toArray();
        return $data['_id'];
        //console.log($data);
    }

    public function store_new_user($array){
        $data = $this->create($array);
        //return $data;
    }

    public function is_present($email){
        $data = $this->where('email_id',$email)->get()->toArray();
        return $data;
        //console.log($data);
    }

    public function update_user($id,$array){
        $data = $this->where('_id',$id)->update($array);
    }

    public function delete_user($id){
        $data = $this->where('_id',$id)->delete();
        return $id;
    }
}
