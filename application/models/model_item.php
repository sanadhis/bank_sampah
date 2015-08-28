<?php

class Model_item extends CI_Model {

	public function list_item(){
		$this->db->order_by('id','desc');
		$query=$this->db->get('harga_barang');
		return $query;
	
	}
	
	public function detail_item($id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get('harga_barang');
		return $query->result();
	
	}

	public function add_item(){
		$forDB=array(
		'nama_barang'=>$_POST['name'],
		'harga_barang'=>$_POST['harga']
		);
		
		$query=$this->db->insert('harga_barang',$forDB);
		
		if($this->db->affected_rows('harga_barang')>0){
		return true;
		}else{
		return false;
		}
	}
	
	public function update(){
		$forDB=array(
		'nama_barang'=>$_POST['nama_barang'],
		'harga_barang'=>$_POST['harga']
		);
		$this->db->where('id',$_POST['id']);
		$this->db->update('harga_barang',$forDB);
		
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('harga_barang');
		if($this->db->affected_rows()>0){
		return true;
		}else{return false;}
	}
}

?>