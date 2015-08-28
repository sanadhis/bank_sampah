<?php

class C_item extends CI_Controller {
	function C_item(){
	parent::__construct();
	if(!$this->session->userdata('logged_in')){
	redirect ('c_main/index','refresh');
	}else{
	$this->load->model('model_item');
	}
	
	}
	
	public function userdata(){
		$sess_data=$this->session->userdata('logged_in');
		$data1['id']=$sess_data['id'];
		$data1['name']=$sess_data['name'];
		$data1['role']=$sess_data['role'];
		return $data1;
	}
	public function index(){
	
			$data=$this->userdata();
			$data['query']=$this->model_item->list_item();
			$this->load->view('view_item',$data);
			
		
	}
	
	public function add_item(){
		$data=$this->userdata();
		$this->load->view('view_add_item',$data);
	}
	
	public function validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Nama Item','required|trim');
		$this->form_validation->set_rules('harga','Harga Barang','required|trim');
		if($this->form_validation->run()){
			if($this->model_item->add_item()){
			$this->index();
			}else{
			echo "please try again";
			}
			
		}else{
		$data=$this->userdata();
		$this->load->view('view_add_item',$data);
		}
	}
	
	public function edit($id){
		$data=$this->userdata();
		$query=$this->model_item->detail_item($id);
		foreach($query as $row){
			$data['id']=$row->id;
			$data['nama_barang']=$row->nama_barang;
			$data['harga_barang']=$row->harga_barang;
		}
		
		$this->load->view('view_editing_item',$data);
		
		}
	
	public function delete($id){
		$data=$this->userdata();
		$query=$this->model_item->detail_item($id);
		foreach($query as $row){
			$data['id']=$row->id;
			$data['nama_barang']=$row->nama_barang;
			$data['harga_barang']=$row->harga_barang;
		}
		
		$this->load->view('view_delete_item',$data);
		
		}

	public function delete_fix(){
		if($_POST['action']=="batal"){
		redirect ('c_item','refresh');}else{
		if($this->model_item->delete($_POST['id']))
			{
				$data=$this->userdata();
				$this->load->view('view_sukses_hapus_item',$data);
			}else{
			echo "gagal melakukan penghapusan item silakan ulangi kembali";
			}
		
		}
	}

	function update(){
		$this->model_item->update();
		redirect ('c_item');
	}


}