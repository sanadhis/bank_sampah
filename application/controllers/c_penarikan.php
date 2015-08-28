<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_penarikan extends CI_Controller {

	function C_penarikan(){
	parent::__construct();
	if(!$this->session->userdata('logged_in')){
			redirect('c_main/index','refresh');
		}
		$this->load->model('model_transaksi');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data=$this->userdata();
		$this->load->view('view_penarikan',$data);
	}
	
	public function userdata(){
		$sess_data=$this->session->userdata('logged_in');
		$data1['id']=$sess_data['id'];
		$data1['name']=$sess_data['name'];
		$data1['role']=$sess_data['role'];
		return $data1;
		}
	public function validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_nasabah','No Registrasi','required|trim');
		$this->form_validation->set_rules('tanggal','Tanggal','required|trim');
		$this->form_validation->set_rules('tarik','Jumlah Penarikan','required|trim');
		if($this->form_validation->run()){
		$data=$this->userdata();
		$data['query']=$this->model_transaksi->nasabah();
		$query2=$this->model_transaksi->nasabah();
			foreach($query2->result() as $row){
			$saldo=$row->saldo;
			}
		$data['tanggal']=$_POST['tanggal'];
		$data['tarik']=$_POST['tarik'];
		$tarik=$_POST['tarik'];
		
		if($saldo<$tarik){
		$data['status']="notvalid";
		}else{$data['status']="valid";}
		$this->load->view('view_konfirmasi_penarikan',$data);
		}else {
		$data=$this->userdata();
		$this->load->view('view_penarikan',$data);}
	}
	
	public function penarikan(){}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */