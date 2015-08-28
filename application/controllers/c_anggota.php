<?php

class C_anggota extends CI_Controller {
	function C_anggota(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect ('c_main','refresh');
		}else{
			$this->load->model('model_nasabah');
		}
	}

	public function index(){
		$data=$this->userdata();
		$data['query']=$this->model_nasabah->list_nasabah();
		$this->load->view('view_anggota',$data);
	}
	
	public function userdata(){
		$sess_data=$this->session->userdata('logged_in');
		$data['id']=$sess_data['id'];
		$data['name']=$sess_data['name'];
		$data['role']=$sess_data['role'];
		return $data;
	}
	
	public function detail($id){
	$this->load->model('model_transaksi');
		$data=$this->userdata();
		$data['id']=$id;
		$data['transaksi']=$this->model_nasabah->detail_transaksi($id);
		$data['nasabah']=$this->model_nasabah->detail_nasabah($id);
		$data['saldo_awal']=$this->model_transaksi->saldo_awal2($id);
		$this->load->view('view_detail_transaksi',$data);
		
	}
	
	public function topdf($id){
		$this->load->library('cezpdf');
		$this->load->helper('pdf');
		prep_pdf();
		$data=$this->userdata();
		$trans=$this->model_nasabah->detail_transaksi($id)->result_array();
		//$data['transaksi']=$query->result();
		$titlecolumn=array(
		'id'=>'No Transaksi',
		'tanggal'=>'Tanggal',
		'item'=>'Item',
		'berat'=>'Berat(kg)',
		'jumlah'=>'Jumlah',
		'saldo'=>'Saldo');
		
		$result=$this->model_nasabah->ambilnamanasabah($id)->result_array();
		$nama=$result[0]['nama'];
		$blok=$result[0]['blok'];
		$judul='Transaksi: '.$nama.'  Blok: '.$blok;

		$this->cezpdf->ezTable($trans,$titlecolumn,$judul,array('width'=>550));
		$this->cezpdf->ezStream();
		
	}
	
	

	public function edit($id){
		$data=$this->userdata();
		$data['query']=$this->model_nasabah->detail_nasabah2($id);
		$this->load->view('view_edit_nasabah',$data);
		}
		
	public function edit_fix(){
		if($this->model_nasabah->edit_fix()){
		$data=$this->userdata();
		$this->load->view('view_sukses_edit_nasabah',$data);}else{echo "gagal";}
	}
	
	public function delete($id){
		$data=$this->userdata();
		$data['nasabah']=$this->model_nasabah->detail_nasabah2($id);
		$this->load->view('view_konfirmasi_hapus_nasabah',$data);
		}
	
	public function delete_fix(){
		if($_POST['action']=="batal"){
		redirect ('c_anggota','refresh');}else{
		if($this->model_nasabah->delete($_POST['id']))
			{
				$data=$this->userdata();
				$this->load->view('view_sukses_hapus_nasabah',$data);
			}else{
			echo "gagal melakukan penghapusan nasabah silakan ulangi kembali";
			}
		
		}
	}
	
	
	


}