<?php

class Model_transaksi extends CI_Model {

	public function insert_nasabah_baru(){
		$forDB=array(
		'nama'=>$_POST['name'],
		'alamat'=>$_POST['address'],
		'rt'=>$_POST['rt'],
		'rw'=>$_POST['rw'],
		
		'saldo'=>$_POST['saldo'],
		'role'=>'nasabah',
		'password'=>MD5($_POST['password'])
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
		$query=$this->db->get('nasabah');
		return $query;
	}
	
	public function nama($id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get('nasabah');
		foreach($query->result() as $row){
		$nama_nasabah=$row->nama;}
		return $nama_nasabah;
	}
	
	public function item($id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get('harga_barang');
		foreach($query->result() as $row){
		$nama=$row->nama_barang;
		$harga=$row->harga_barang;
		}
		return $nama."   (  Rp. ".$harga." /kg )";
	}
	
	
	public function uang_sampah($id,$berat){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get('harga_barang');
		foreach($query->result() as $row){
		$nama=$row->nama_barang;
		$harga=$row->harga_barang;
		$uang=$berat*$harga;
		return $uang;
		}
	}
	
	public function saldo_awal($id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get('nasabah');
		foreach($query->result() as $row){
		return $row->saldo;
		
		}
	}
	public function saldo_awal2($id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get('nasabah');
		foreach($query->result() as $row){
		return $row->saldo_awal;
		}
	}

	public function saldo_sebelum($no_user,$kodemin){
		$query = $this->db->query("select saldo from transaksi where id=(select max(id) from transaksi where no_user=".$no_user." and id<".$kodemin.")");
		if($query->num_rows == 1)
		{
			$result = $query->row();
		}
		return $result->saldo;
	}
	
	public function insert_transaksi(){
		$this->load->model('model_nasabah');
		$forDB=array(
		'no_user'=>$_POST['no_user'],
		'tanggal'=>$_POST['tanggal'],
		'id_harga_barang'=>$_POST['id_harga_barang'],
		'item'=>$_POST['item'],
		'berat'=>$_POST['berat'],
		'jumlah'=>$_POST['jumlah'],
		'saldo'=>$_POST['saldo']
		);
		$this->db->insert('transaksi',$forDB);
		$this->model_nasabah->update_saldo_nasabah($_POST['no_user'],$_POST['saldo']);
		if($this->db->affected_rows()>0){
		return true;
		}else{
		return false;
		}
	}
	
	public function insert_penarikan(){
		$this->load->model('model_nasabah');
		$saldo_akhir=$_POST['saldo']-$_POST['tarik'];
		$forDB=array(
		'no_user'=>$_POST['id_nasabah'],
		'tanggal'=>$_POST['tanggal'],
		'id_harga_barang'=>"-",
		'item'=>"penarikan",
		'berat'=>"-",
		'jumlah'=>$_POST['tarik'],
		'saldo'=>$saldo_akhir
		);
		$this->db->insert('transaksi',$forDB);
		$this->model_nasabah->update_saldo_nasabah($_POST['id_nasabah'],$saldo_akhir);
		if($this->db->affected_rows()>0){
		return true;
		}else{
		return false;
		}
		
	}
	
	public function daftar_transaksi(){
		$this->db->order_by('tanggal','desc');
		$query=$this->db->get('transaksi');
		return $query;
	}
	
	public function daftar_transaksi_print(){
		$this->db->order_by('tanggal','asc');
		$query=$this->db->get('transaksi');
		return $query;
	}
	
	public function transaksi_setoran_awal(){
		$this->db->select_max('id');
		$max=$this->db->get('nasabah');
		$tanggal = date('Y-m-d');
		foreach($max->result() as $row){
		$max2=$row->id;
		}
		$forDB=array(
		'no_user'=>$max2,
		'tanggal'=>$tanggal,
		'id_harga_barang'=>'-',
		'item'=>'setoran awal',
		'berat'=>'-',
		'jumlah'=>$_POST['saldo'],
		'saldo'=>$_POST['saldo']
		);
		$this->db->insert('transaksi',$forDB);
		if($this->db->affected_rows()>0){
			return true;
		}else{return false;}
		
	}
	public function nasabah(){
		$this->db->where('id',$_POST['id_nasabah']);
		$this->db->limit(1);
		return $this->db->get('nasabah');
	}
	
	public function detail_transaksi(){
		$this->db->where('no_user',$_POST['no_user']);
		$this->db->order_by('id','DESC');
		return $this->db->get('transaksi');
	}
	
	public function detail_transaksi2($id){
		$this->db->where('id',$id);
		$query = $this->db->get('transaksi');
		return $query;
	}

	public function edit_transaksi($item,$saldo,$total,$uang_sampah){
		$forDB=array(
		'berat'=>$_POST['berat'],
		'tanggal'=>$_POST['tanggal'],
		'id_harga_barang'=>$_POST['item'],
		'item'=>$item,
		'jumlah'=>$uang_sampah,
		'saldo'=>$total
		);
		$this->db->where('id',$_POST['id']);
		$this->db->update('transaksi',$forDB);
		$this->update_keseluruhan($total,$_POST['id'],$_POST['no_user']);
		if($this->db->affected_rows()>0){
		return true;
		}else
		{
		return false;}

	}

	public function update_saldoawal($saldo,$tanggal){
		$forDB=array(
			'jumlah'=>$saldo,
			'saldo'=>$saldo,
			'tanggal'=>$tanggal
			);
		$this->db->where('id_harga_barang','-');
		$this->db->where('no_user',$_POST['no_user']);
		$this->db->update('transaksi',$forDB);
		$this->load->model('model_nasabah');
		$forDB2=array(
			'saldo_awal'=>$saldo,
			'tanggal_terdaftar'=>$tanggal
			);
		$this->db->where('id',$_POST['no_user']);
		$this->db->update('nasabah',$forDB2);
		$this->update_keseluruhan($saldo,$_POST['id'],$_POST['no_user']);
	}

	public function update_keseluruhan($sawal,$kode,$nouser){
		$query1 = $this->db->query("select count(id) as count from transaksi where no_user=".$nouser." and id>".$kode);
		if($query1->num_rows == 1)
		{
			$counter = $query1->row();
			$counter = $counter->count;
			for($i=0;$i<$counter;$i++){
				$data = $this->getdata($kode,$nouser);
				$id = $data->idnext;
				$jumlah = $data->jumlah;
				$saldo = $sawal + $jumlah;
				$datasaldo=array(
				'saldo'=>$saldo
				);
				$this->db->where('id',$id);
				$this->db->update('transaksi',$datasaldo);
				$sawal = $saldo;
				$kode = $id;
			}
		}
		$saldo = $sawal;
		$datasaldo=array(
			'saldo'=>$saldo
			);
		$this->db->where('id',$nouser);
		$this->db->update('nasabah',$datasaldo);
	}

	public function getdata($kodemin,$no_user){
		$query2 = $this->db->query("select min(id) as idnext,jumlah from transaksi where no_user=".$no_user." and id>".$kodemin);
		if($query2->num_rows == 1)
		{
			$result = $query2->row();
		}
		return $result;
	}

	public function delete_transaksi($id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get('transaksi');
		foreach($query->result() as $row){
		$nasabah=$row->no_user;
		$saldo=$row->jumlah;
		$item=$row->item;
		}
		
		$this->db->where('id',$id);
		$this->db->delete('transaksi');
		
		$this->db->where('id',$nasabah);
		$this->db->limit(1);
		$query=$this->db->get('nasabah');
		
		foreach($query->result() as $row){
		$id_nasabah=$row->id;
		$saldo_nasabah=$row->saldo;
		$saldo_awal=$row->saldo_awal;
		}
		
		if($item=="penarikan"){
		$saldo_nasabah=$saldo_nasabah+$saldo;
		}else{
		$saldo_nasabah=$saldo_nasabah-$saldo;}
		
		$forDB=array('saldo'=>$saldo_nasabah);
		
		$this->db->where('id',$id_nasabah);
		$this->db->update('nasabah',$forDB);
		
		
	}

	public function cari(){
		$katakunci = $_POST['sort'];
		$kata = $_POST['kata'];
		if($this->db->like($katakunci,$kata)){
		$this->db->order_by('id','DESC');
		return $this->db->get('transaksi');
		}
		else
		{
			return false;
		}
	}
}

?>