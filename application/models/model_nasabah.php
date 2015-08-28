<?php

class Model_nasabah extends CI_Model {

	public function insert_nasabah_baru(){
		$tanggal = date('Y-m-d');
		$forDB=array(
		'nama'=>$_POST['name'],
		'alamat'=>$_POST['address'],
		'rt'=>(int)$_POST['rt'],
		'rw'=>(int)$_POST['rw'],
		'blok'=>$_POST['blok'],
		'tanggal_terdaftar'=>$tanggal,
		'saldo'=>$_POST['saldo'],
		'saldo_awal'=>$_POST['saldo'],
		'role'=>'nasabah'
		//'password'=>MD5($_POST['password'])
		);
		
		$this->db->insert('nasabah',$forDB);
		if($this->db->affected_rows('nasabah')>0){
		return true;
		}else{
		return false;
		}
	}
	
	public function detail_user($id){
		$this->db->where($id);
		$query=$this->db->get('users');
		return $query->result();
	}
	
	public function list_nasabah(){
		$this->db->order_by('blok asc, id desc');
		$query=$this->db->get('nasabah');
		return $query;
	}

	public function update_saldo_nasabah($id,$saldo){
		$forDB=array(
		'saldo'=>$saldo);
		$this->db->where('id',$id);
		$this->db->update('nasabah',$forDB);
		/*if($this->db->affected_rows()>0){
		return true;
		}else{
		return false;
		}*/
	}
	
	public function detail_transaksi($id){
		$this->db->where('no_user',$id);
		$this->db->order_by('id','asc');
		$query=$this->db->get('transaksi');
		return $query;
	}

	public function ambilnamanasabah($id){
		$this->db->where('id',$id);
		$query=$this->db->get('nasabah');
		return $query;
	}
	
	public function detail_nasabah($nama){
		$this->db->like('nama',$nama);
		$query=$this->db->get('nasabah');
		return $query;
	}

	public function detail_nasabah2($id){
		$this->db->like('id',$id);
		$query=$this->db->get('nasabah');
		return $query;
	}
	
	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('nasabah');
		if($this->db->affected_rows()>0){
		return true;
		}else{return false;}
	}
	
	public function edit_fix(){
		$forDB=array(
		'nama'=>$_POST['name'],
		'alamat'=>$_POST['address'],
		'rt'=>$_POST['rt'],
		'rw'=>$_POST['rw'],
		'blok'=>$_POST['blok']
		);
		$this->db->where('id',$_POST['id']);
		$this->db->update('nasabah',$forDB);
		if($this->db->affected_rows()>0){
		return true;}else{return false;}
	}
	
	public function nasabah_terbaru(){
		$this->db->where('id',$this->max_id());
		$this->db->limit(1);
		return $this->db->get('nasabah');
	}
	
	public function max_id(){
		$this->db->select_max('id');
		$this->db->limit(1);
		$query=$this->db->get('nasabah');
		foreach($query->result() as $row):
		return $row->id;
		endforeach;
	}
	
	
}

?>