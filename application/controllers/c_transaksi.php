<?php

class C_transaksi extends CI_Controller {

	public function C_transaksi(){
	parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('c_main/index','refresh');
		}
		$this->load->model('model_transaksi');
		
	 
	}

	public function userdata(){
	$sess_data=$this->session->userdata('logged_in');
			$data1['id']=$sess_data['id'];
			$data1['name']=$sess_data['name'];
			$data1['role']=$sess_data['role'];
			return $data1;}
			
	public function index(){
		//if($this->session->userdata('logged_in')){
			/*$sess_data=$this->session->userdata('logged_in');
			$data['id']=$sess_data['id'];
			$data['name']=$sess_data['name'];
			$data['role']=$sess_data['role'];*/
			$data=$this->userdata();
			$data['item']=$this->db->get('harga_barang');
			$this->load->view('view_transaksi',$data);
		//}else{
			//redirect('c_main/index','refresh');
		//}
		
	}
	
	public function validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_nasabah','Nomor Registrasi','required|trim');
		$this->form_validation->set_rules('tanggal','Tanggal','required|trim');
		$this->form_validation->set_rules('item','Item','required|trim');
		$this->form_validation->set_rules('berat','Berat','required|trim');

		
		if($this->form_validation->run()){
		
		$data=$this->userdata();
		$data['no_user']=$_POST['id_nasabah'];
		$data['id_harga_barang']=$_POST['item'];
		$data['nama']=$this->model_transaksi->nama($_POST['id_nasabah']);
		$data['tanggal']=$_POST['tanggal'];
		$data['item']=$this->model_transaksi->item($_POST['item']);
		$data['berat']=$_POST['berat'];
		$data['uang_sampah']=$this->model_transaksi->uang_sampah($_POST['item'],$_POST['berat']);
		$data['saldo']=$this->model_transaksi->saldo_awal($_POST['id_nasabah']);
		$data['total_saldo']=$data['uang_sampah']+$data['saldo'];
		//$data['item']=$_POST['item'];
		//$data['uang_sampah']="65";//$this->model_transaksi->uang_sampah($_POST['berat'],$_POST['item']);
		/*foreach($data['item']->result() as row):
		$harga_item=$row->harga_barang;
		endforeach;
		$data['uang_sampah']=$harga_item;*/
		$this->load->view('view_konfirmasi_transaksi',$data);
		}else{
		$data=$this->userdata();
		$data['item']=$this->db->get('harga_barang');
		$this->load->view('view_transaksi',$data);}
	}
	
	function insert_transaksi(){
		if($_POST['action']=='kembali'){
		$data=$this->userdata();
		$data['item']=$this->db->get('harga_barang');
		$data['tanggal']=$_POST['tanggal'];
		$data['no_user']=$_POST['no_user'];
		$data['berat']=$_POST['berat'];
		$this->load->view('view_transaksi',$data);
		}else{
		if($this->model_transaksi->insert_transaksi()){
		$data=$this->userdata();
		$data['no_user'] = $_POST['no_user'];
		$data['query']=$this->model_transaksi->detail_transaksi();
		$this->load->view('view_sukses',$data);
		}else{echo "gagal";}
		
		}
	}
	function insert_penarikan(){
		if($_POST['action']=='kembali'){
		$data=$this->userdata();
		$data['tanggal']=$_POST['tanggal'];
		$data['id_nasabah']=$_POST['id_nasabah'];
		$data['tarik']=$_POST['tarik'];
		$this->load->view('view_penarikan',$data);
		}else{
		if($this->model_transaksi->insert_penarikan()){
		$data=$this->userdata();
		$data['query']=$this->model_transaksi->detail_transaksi();
		$this->load->view('view_sukses_penarikan',$data);
		}else{echo "gagal";}
		
		}
	}
	
	function daftar_transaksi(){
		$data=$this->userdata();
		$data['query']=$this->model_transaksi->daftar_transaksi();
		$this->load->view('view_daftar_transaksi',$data);
	}
	
	public function topdf(){
		$this->load->library('cezpdf');
		$this->load->helper('pdf');
		prep_pdf();
		$data=$this->userdata();
		$trans=$this->model_transaksi->daftar_transaksi_print()->result_array();
		//$data['transaksi']=$query->result();
		$titlecolumn=array(
		'no_user'=>'User ID',	
		'id'=>'No Transaksi',
		'tanggal'=>'tanggal',
		'item'=>'Item',
		'berat'=>'Berat(kg)',
		'jumlah'=>'Jumlah',
		'saldo'=>'Saldo');
		
		$this->cezpdf->ezTable($trans,$titlecolumn,'Daftar transaksi',array('width'=>550));
		$this->cezpdf->ezStream();
		
	}
	
	public function delete_transaksi($id){
		$data= $this->userdata();
		$query=$this->model_transaksi->detail_transaksi2($id);
		foreach($query->result() as $row){
			$data['id']=$row->id;
			$data['no_user']=$row->no_user;
			$data['tanggal']=$row->tanggal;
			$data['id_harga_barang']=$row->id_harga_barang;
			$data['item'] = $row->item;
			$data['berat']=$row->berat;
			$data['jumlah']=$row->jumlah;
		}
		$this->load->view('view_delete_transaksi',$data);		
	}

	public function delete_fix(){
		if($_POST['action']=="batal")
		{
			redirect('c_transaksi/daftar_transaksi');
		}
		else
		{
			$this->model_transaksi->delete_transaksi($this->input->post('id'));
			$data=$this->userdata();
			$this->load->view('view_sukses_hapus_transaksi',$data);
		}
		
	}
	
	public function edit_transaksi($id){
		$data=$this->userdata();
		$data['query']=$this->model_transaksi->detail_transaksi2($id);
		$data['item']=$this->db->get('harga_barang');
		foreach ($data['query']->result() as $row) {
			$item = $row->item;
		}
		if($item=="setoran awal")
		{
			$this->load->view('view_edit_saldoawal',$data);
		}
		// $data['item']=$this->model_item->list_item();
		else
		{
			$this->load->view('view_edit_transaksi',$data);
		}
	}

	public function edit_fix(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tanggal','Tanggal','required|trim');
		$this->form_validation->set_rules('item','Item','required|trim');
		$this->form_validation->set_rules('berat','Berat','required|trim');

		
		if($this->form_validation->run()){
		$data=$this->userdata();
		$uang_sampah=$this->model_transaksi->uang_sampah($_POST['item'],$_POST['berat']);
		$saldo=$this->model_transaksi->saldo_sebelum($_POST['no_user'],$_POST['id']);
		$total_saldo=$uang_sampah+$saldo;
		$item=$this->model_transaksi->item($_POST['item']);
		$this->model_transaksi->edit_transaksi($item,$saldo,$total_saldo,$uang_sampah);
		}
		echo $saldo;
		redirect('c_transaksi/daftar_transaksi');
	}

	public function edit_saldo(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('saldo_awal','Saldo_awal','required|trim');
		$this->form_validation->set_rules('tanggal','Tanggal','required|trim');
		
		if($this->form_validation->run()){
		$data=$this->userdata();
		$this->model_transaksi->update_saldoawal($_POST['saldo_awal'],$_POST['tanggal']);
		}
		redirect('c_transaksi/daftar_transaksi');
	}

	public function pencarian(){
	$data=$this->userdata();
	$this->load->model('model_transaksi');
	if($data['query']=$this->model_transaksi->cari()){
	$this->load->view('view_daftar_transaksi',$data);
	}
	else
	{
		redirect('c_transaksi/daftar_transaksi');
	}

	}
	
	


}