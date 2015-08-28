<html>
<head>
<title>Sukses </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Angga Hendriana">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/mos-style-sukses.css" media="screen" /> <!--pemanggilan file css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/styles.css'?>"  media="screen" />

</head>

<body>
<div id="header">
	<?php include 'view_top_right_menu.php'?>
</div>

<div id="wrapper">
	<!-- letakkan dibawah ini -->
	<?php include 'view_left_menu.php'?>
	<div id="rightContent">
	
	<div class="quoteOfDay">
	<b>Status :</b><br>
	<i style="color: #5b5b5b;">"SUKSES. Klik <a href="<?php echo base_url().'c_signup'?>"><b>di sini</b></a> untuk melakukan penambahan nasabah baru."</i>
	</div>
	
	<!-- #########################################-->
		<div id=""><h3>Data nasabah baru</h3>

		<?php foreach($query->result() as $row):?>
		
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">No Registrasi Nasabah</td><td style="border: none;padding: 4px;"><b><?php echo $row->id;?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Nama</td><td style="border: none;padding: 4px;"><b><?php echo $row->nama;?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Alamat</td><td style="border: none;padding: 4px;"><b><?php echo $row->alamat." Blok ".$row->blok." Rt :".$row->rt." / Rw :".$row->rw;?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Saldo awal</td><td style="border: none;padding: 4px;"><b><?php echo "Rp. ".$row->saldo;?></b></td></tr>
			
			<tr><td><br></br></td></tr>
		</table>
		
		
		<?php endforeach;?>

		</div>
	
		<!-- #########################################-->
		
		
		<div class="clear"></div>
		
		
		
	</div>
<div class="clear"></div>
<div id="footer">
	&copy; 2014 | <a href="#">Bank Sampah</a> | design <a href="" rel="nofollow" target="_blank">Angga H. & Sanadhi S.</a><br>
	redesign <a href="#">Administrator</a> 
</div>
</div>
</body>
</html>