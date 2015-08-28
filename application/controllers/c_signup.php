<?php

class C_signup extends CI_Controller {

	public function C_signup(){
	parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('c_main/index','refresh');
		}
		$this->load->model('model_nasabah');
		
	
	}

	public function userdata(){
	$sess_data=$this->session->userdata('logged_in');
			$data1['id']=$sess_data['id'];
			$data1['name']=$sess_data['name'];
			$data1['role']=$sess_data['role'];
			return $data1;}
	public function index(){
			$data=$this->userdata();
			$this->load->view('view_signup',$data);
		
	}
	
	public function validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Nama','required|trim');
		$this->form_validation->set_rules('address','alamat','required|trim');
		$this->form_validation->set_rules('rt','RT','required|trim','callback_numeric_wcomma');
		$this->form_validation->set_rules('rw','RW','required|trim','callback_numeric_wcomma');
		$this->form_validation->set_rules('blok','BLOK','required|trim');
		$this->form_validation->set_rules('saldo','Saldo Awal','required|trim');
		//$this->form_validation->set_rules('password','Password','required|trim');
		//$this->form_validation->set_rules('confirm_password','Konfirmasi Pasword','required|trim|matches[password]');
		
		if($this->form_validation->run()){
		if($this->model_nasabah->insert_nasabah_baru())
			{
				$this->load->model('model_transaksi');
				if($this->model_transaksi->transaksi_setoran_awal())
				{
					$data=$this->userdata();
					$data['query']=$this->model_nasabah->nasabah_terbaru();
					$this->load->view('view_sukses_nasabah',$data);
				}else{
				echo "gagal";}
				
			}else{
			echo "gagal";
			}
		}else{
		$data=$this->userdata();
		$this->load->view('view_signup',$data);}
	}
	
	function validation_admin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Nama','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('confirm_password','Konfirmasi Pasword','required|trim|matches[password]');
		if($this->form_validation->run()){
		$this->load->model('model_users');
		if($this->model_users->insert_admin_baru())
			{
			$data=$this->userdata();
			$this->load->view('view_sukses_admin',$data);
			}else{
			echo "gagal";
			}
		}else{
		$data=$this->userdata();
		$this->load->view('view_admin',$data);}
	}
	function numeric_wcomma ($str)
		{
			return preg_match('/^[0-9,]+$/', $str);
		}

	function add_admin(){
		$data=$this->userdata();
		$this->load->view('view_admin',$data);
	}

}