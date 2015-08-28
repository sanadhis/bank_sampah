<?php

class C_grafik extends CI_Controller {

	public function C_grafik(){
	parent::__construct();
	if(!$this->session->userdata('logged_in')){
	redirect ('c_main/index','refresh');
	}else{
	$this->load->model('model_item');
	}
	
	}

	public function viewmenu(){
		$data=$this->userdata();
		$this->load->view('view_grafikmenu',$data);
	}

	public function userdata(){
		$sess_data=$this->session->userdata('logged_in');
		$data1['id']=$sess_data['id'];
		$data1['name']=$sess_data['name'];
		$data1['role']=$sess_data['role'];
		return $data1;
	}

	public function back(){
		$data = $this->userdata();
		$this->load->view('view_grafikmenu',$data);
	}


	public function index(){
	
			$this->load->model('graph_model');
			
			
			//default select
			if(!empty($_POST['tahun']))
				$year = $_POST['tahun'];
			else
				$year=2014;
			if(!empty($_POST['bulan1']))
				$bulan1 = $_POST['bulan1'];
			else
				$bulan1=1;
			if(!empty($_POST['bulan2']))
				$bulan2 = $_POST['bulan2'];
			else
			{
				if(!empty($_POST['bulan1']))
					$bulan2=$bulan1;
				else
					$bulan2=12;
			}
			if(!empty($_POST['graph']))
				$graph = $_POST['graph'];
			else
				$graph="pie";
			
			//kesalahan input terbalik
			if($bulan1>$bulan2)
			{
				//penampung
				$slot = $bulan1;
				$bulan1 = $bulan2;
				$bulan2 = $slot;
			}

			//ambil list bulan sesuai input
			$bulan = $this->getbulan($bulan1,$bulan2);

			if($graph=="batang"){
				//load item
				$item = $this->graph_model->getitem();
	
				//loop sebanyak jumlah item
				for($i=0;$i<$item[0];$i++)
				{
					//mengambil banyaknya transaksi per item pada setahunnya
					$series = $this->graph_model->getdata($item[$i+1],$year,$bulan1,$bulan2);
				
					//untuk array data pada grafik
					$jenis=$item[$i+1];
					$nama = array('name'=>$jenis);
					$data = array('data'=>$series);
					$series_data[] = array_merge($nama,$data);
				}

				// //mengambil banyaknya nasabah baru per bulan
				// $series = $this->graph_model->getnasabah($year,$bulan1,$bulan2);
				// $nama=array('name'=>'Nasabah Baru');
				// $data = array('data'=>$series);
				// $series_data[] = array_merge($nama,$data);

				//judul graph
				$this->view_data['title'] = "'Transaksi PoinMas Tahun ".$year."'";
				$this->view_data['yaxis'] = "'Berat (Kg)'";

				//default highchart js
				$this->view_data['sess_data']=$this->session->userdata('logged_in');
				$this->view_data['series_data'] = json_encode($series_data);
				$this->view_data['bulan'] = json_encode($bulan);
				$data=$this->userdata();
				$this->load->view('view_grafik',$this->view_data);
			}

			else if($graph=="pie"){
				//load item
				$item = $this->graph_model->getitem();
				
				//loop sebanyak jumlah item
				for($i=0;$i<$item[0];$i++)
				{
					//mengambil banyaknya transaksi per item pada setahunnya
					$series = $this->graph_model->getpiedata($item[$i+1],$year,$bulan1,$bulan2);
				
					//untuk array data pada grafik
					if($series!=0)
					{
						$jenis=$item[$i+1];
						$series_data[] = array($jenis,$series);
					}
				}				
				
				// // mengambil banyaknya nasabah baru per bulan
				// $series = $this->graph_model->getnasabahpie($year,$bulan1,$bulan2);
				// if($series!=0) //jika data tidak kosong
				// {
				// 	$nama="Nasabah Baru";
				// 	$series_data[] = array($nama,$series);
				// }

				//default highchart js
				$this->view_data['sess_data']=$this->session->userdata('logged_in');
				$this->view_data['series_data'] = json_encode($series_data);
				$month = $this->getmonth($bulan1,$bulan2);
				if($bulan1!=$bulan2)
					{
						$this->view_data['title']= "'Data Transaksi Bulan ".$month[0]." - ".$month[1]." Tahun ".$year."'";
					}
				else
					{
						$this->view_data['title']="'Data Transaksi Bulan ".$month[0]." Tahun".$year."'";
					}

				$this->view_data['title'] = (string)$this->view_data['title'];
				$data=$this->userdata();
				$this->load->view('view_grafikpie',$this->view_data);
			}

			else if($graph=="grafiknasabah"){
				
				//data tahun sebelum
				$tahunsebelum = $this->graph_model->gettahunsebelum($year);

				//mengambil data sebelum
				if($bulan1>1)
				{
					$sebelum = $this->graph_model->getdatasebelum1($year,$bulan1) + $tahunsebelum;
				}
				else
				{
					$sebelum = 0 + $tahunsebelum;
				}

				//mengambil data banyaknya nasabah 
				$series = $this->graph_model->getnasabahdata($year,$bulan1,$bulan2,$sebelum);
				
				//untuk array data pada grafik
				$nama = array('name'=>'Nasabah');
				$data = array('data'=>$series);
				$series_data[] = array_merge($nama,$data);
				
				// //mengambil banyaknya nasabah baru per bulan
				// $series = $this->graph_model->getnasabah($year,$bulan1,$bulan2);
				// $nama=array('name'=>'Nasabah Baru');
				// $data = array('data'=>$series);
				// $series_data[] = array_merge($nama,$data);

				//judul graph
				$this->view_data['title'] = "'Nasabah PoinMas Tahun ".$year."'";
				$this->view_data['yaxis'] = "'Jumlah Nasabah (Orang)'";

				//default highchart js
				$this->view_data['sess_data']=$this->session->userdata('logged_in');
				$this->view_data['series_data'] = json_encode($series_data);
				$this->view_data['bulan'] = json_encode($bulan);
				$data=$this->userdata();
				$this->load->view('view_grafik',$this->view_data);
			}

			else if($graph=="grafiknasabahrt"){
				//mengambil data rt
				$rt = $this->graph_model->getrt();

				for($i=0;$i<$rt[0];$i++)
				{

					//mengambil data tahun sebelum
					$tahunsebelum = $this->graph_model->gettahunsebelum1($rt[$i+1],$year);


					//mengambil data sebelum
					if($bulan>1){
						$sebelum = $this->graph_model->getdatasebelum($rt[$i+1],$year,$bulan1) + $tahunsebelum;
					}
					else{
						$sebelum = 0 + $tahunsebelum;
					}
					//mengambil banyaknya nasabah per tahun dan rt
					$series = $this->graph_model->getnasabahdata_rt($rt[$i+1],$year,$bulan1,$bulan2,$sebelum);
					
					//untuk array data pada grafik
					$nama = array('name'=>'RT '.$rt[$i+1]);
					$data = array('data'=>$series);
					$series_data[] = array_merge($nama,$data);
				}

				// //mengambil banyaknya nasabah baru per bulan
				// $series = $this->graph_model->getnasabah($year,$bulan1,$bulan2);
				// $nama=array('name'=>'Nasabah Baru');
				// $data = array('data'=>$series);
				// $series_data[] = array_merge($nama,$data);

				//judul graph
				$this->view_data['title'] = "'Nasabah PoinMas Tahun ".$year."'";
				$this->view_data['yaxis'] = "'Jumlah Nasabah (Orang)'";

				//default highchart js
				$this->view_data['sess_data']=$this->session->userdata('logged_in');
				$this->view_data['series_data'] = json_encode($series_data);
				$this->view_data['bulan'] = json_encode($bulan);
				$data=$this->userdata();
				$this->load->view('view_grafik',$this->view_data);
			}

	}
		
	public function getbulan($bul1,$bul2)
	{
		$month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		for(;$bul1<=$bul2;$bul1++)
		{
			$get[] = $month[$bul1-1];
		}
		return $get;
	}

	public function getmonth($bul1,$bul2)
	{
		$month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$return[0] = $month[$bul1-1];
		$return[1] = $month[$bul2-1];
		return $return;
	}

}