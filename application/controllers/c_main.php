<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_main extends CI_Controller {

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
		$this->load->view('view_login');
	}
	
	public function login_validation(){
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id','Nomor Registration','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|md5|trim|callback_validate_credentials');
		if($this->form_validation->run()==false){
			$this->load->view('view_login');
		}else{
			redirect ('c_main/dashboard');
		}

	}
	
	public function validate_credentials(){
		$this->load->model('model_users');
		//$check = $this->model_users->can_log_in();
		$result=$this->model_users->can_log_in();
		if($result){
			//$result=$this->model_users->detail_user()
			$sess_array=array();
			foreach($result as $row){
				$sess_array=array(
				'id'=>$row->id,
				'name'=>$row->name,
				'role'=>$row->role,
				'email'=>$row->email,
				'password'=>$row->password
				);
			$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}else{
		$this->form_validation->set_message('validate_credentials','Incorrect No or Password');
		return false;
		}
	}
	
	public function dashboard(){
		if($this->session->userdata('logged_in')){
			$sess_data=$this->session->userdata('logged_in');
			$data['id']=$sess_data['id'];
			$data['name']=$sess_data['name'];
			$data['role']=$sess_data['role'];
			$this->load->view('view_dashboard',$data);
		}else{
		redirect ('c_main/index','refresh');
		}
	}
	public function dashboard2(){
		if($this->session->userdata('logged_in')){
			$this->load->model('model_nasabah');
			$sess_data=$this->session->userdata('logged_in');
			$data['id']=$sess_data['id'];
			$data['name']=$sess_data['name'];
			$data['role']=$sess_data['role'];
			$data['query']=$this->model_nasabah->detail_nasabah($_POST['nama']);
			
			$this->load->view('view_dashboard2',$data);
		}else{
		redirect ('c_main/index','refresh');
		}
	}
	
	public function restricted(){
		$this->load->view('view_restricted');
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('view_login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */