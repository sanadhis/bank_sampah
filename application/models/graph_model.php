<?php
 
class graph_model extends CI_Model {

	public function getitem()
	{
		$nomor=1;
		$query = $this->db->get('harga_barang');
		foreach ($query->result() as $row){
			$item[$nomor] = $row->nama_barang;
			$nomor++;
		}
		$item[0]=$nomor-1;
		return $item;
	}

	public function getrt()
	{
		$nomor=1;
		$this->db->select('rt');
		$this->db->group_by('rt');
		$query = $this->db->get('nasabah');
		foreach ($query->result() as $row){
			$rt[$nomor] = $row->rt;
			$nomor++;
		}
		$rt[0]=$nomor-1;
		return $rt;
	}


	public function getdata($barang,$tahun,$bulan1,$bulan2){
		//seharusnya di transaksi
		for($bulan1;$bulan1<=$bulan2;$bulan1++){
			$query = $this->db->query("select sum(berat) as count from transaksi where item like '%".$barang."%' and month(tanggal)=".$bulan1." and year(tanggal)=".$tahun);
			foreach($query->result_array() as $row){
				$return[]=(float)$row['count'];
			}	
		}
		return $return;
	}

	public function getpiedata($barang,$tahun,$bulan1,$bulan2){
		//seharusnya di transaksi
		$query = $this->db->query("select sum(berat) as count from transaksi where item like '%".$barang."%' and month(tanggal)>=".$bulan1." and month(tanggal)<=".$bulan2." and year(tanggal)=".$tahun);
		if($query->num_rows == 1)
		{
			$return = $query->row();
			$return = (float)$return->count;
			return $return;
		}
	}

	public function getnasabahdata($tahun,$bulan1,$bulan2,$rekapitulasi){
		//seharusnya di model nasabah
		for($bulan1;$bulan1<=$bulan2;$bulan1++){
			$query = $this->db->query("select count(id) as count from nasabah where month(tanggal_terdaftar)=".$bulan1." and year(tanggal_terdaftar)=".$tahun);
			if($query->num_rows == 1)
			{
				$hasil = (int)$query->row()->count;
				$rekapitulasi = $hasil + $rekapitulasi;
				$data[]= $rekapitulasi;
			}
		}
		return $data;
	}

	public function getnasabahdata_rt($rt,$tahun,$bulan1,$bulan2,$rekapitulasi){
		//seharusnya di nasabah
		for($bulan1;$bulan1<=$bulan2;$bulan1++){
			$query = $this->db->query("select count(id) as count from nasabah where rt=".$rt." and month(tanggal_terdaftar)=".$bulan1." and year(tanggal_terdaftar)=".$tahun);
			foreach($query->result_array() as $row){
				$hasil=(int)$row['count'];
				$rekapitulasi = $hasil + $rekapitulasi;
				$return[]=$rekapitulasi;
			}	
		}
		return $return;
	}

	public function getdatasebelum($rt,$tahun,$bulan1){
		//seharusnya di nasabah
		$query = $this->db->query("select count(id) as count from nasabah where rt=".$rt." and month(tanggal_terdaftar)<".$bulan1." and year(tanggal_terdaftar)=".$tahun);
		if($query->num_rows == 1){		
			$return= (int)$query->row()->count;	
			return $return;
		}
	}

	public function gettahunsebelum1($rt,$tahun){
		//seharusnya di nasabah
		$query = $this->db->query("select count(id) as count from nasabah where year(tanggal_terdaftar)<".$tahun." and rt=".$rt);
		if($query->num_rows == 1){
			$return = (int)$query->row()->count;
			return $return;
		}
	}

	public function getdatasebelum1($tahun,$bulan1){
		//seharusnya di nasabah
		$query = $this->db->query("select count(id) as count from nasabah where month(tanggal_terdaftar)<".$bulan1." and year(tanggal_terdaftar)=".$tahun);
		if($query->num_rows == 1){		
			$return= (int)$query->row()->count;	
			return $return;
		}
	}

	public function gettahunsebelum($tahun){
		//seharusnya di nasabah
		$query = $this->db->query("select count(id) as count from nasabah where year(tanggal_terdaftar)<".$tahun);
		if($query->num_rows == 1){
			$return = (int)$query->row()->count;
			return $return;
		}
	}

	// public function getnasabahpie($tahun,$bulan1,$bulan2)
	// {
	// 	//seharusnya di model nasabah
	// 	$query = $this->db->query("select count(id) as count from nasabah where month(tanggal_terdaftar)>=".$bulan1." and month(tanggal_terdaftar)<=".$bulan2." and year(tanggal_terdaftar)=".$tahun);
	// 	if($query->num_rows == 1){
	// 		$return = $query->row();
	// 		$return = (int)$return->count;
	// 		return $return;
	// 	}
	// }

}