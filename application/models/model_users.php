<?php

class Model_users extends CI_Model {

	public function can_log_in(){

		$this->db->where('name',$this->input->post('id'));
		$this->db->where('password',md5($this->input->post('password')));
		$this->db->limit(1);
		$query=$this->db->get('users');
		
		if($query->num_rows() == 1){
			return $query->result();
		}else{
		return false;
		}


	}
	
	public function detail_user($id){
	
		$this->db->where($id);
		$query=$this->db->get('users');
		return $query->result();
	
	}
	
	function insert_admin_baru(){
		$forDB=array(
			'name'=>$_POST['name'],
			'password'=>md5($_POST['password'])
		);
		$this->db->insert('users',$forDB);
		if($this->db->affected_rows()>0){
			return true;
		}else{return false;}
	}
}

?>