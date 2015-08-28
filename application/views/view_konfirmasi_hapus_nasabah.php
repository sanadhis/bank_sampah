<html>
<head>
<title>Hapus Nasabah </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Angga Hendriana">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/mos-style-konfirm.css" media="screen" /> <!--pemanggilan file css-->
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
	<b>Konfirmasi Penghapusan Nasabah</b><br>
	<!--<i style="color: #5b5b5b;">"If you think you can, you really can"</i>-->
	</div>
		
		
		<div class="clear"></div>
		
		<div id=""><h3>Apakah Anda yakin nasabah dengan data berikut akan dihapus?</h3>
		<?php echo form_open('c_anggota/delete_fix');?>
		<?php foreach($nasabah->result() as $row):?>
		<input type="hidden" name="id" value="<?php echo $row->id?>">
		
		
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">Id </td><td style="border: none;padding: 4px;"><b><?php echo $row->id?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Nama</td><td style="border: none;padding: 4px;"><b><?php echo $row->nama?></b></td></tr>
			<tr><td style="border: none;padding: 4px;">Alamat</td><td style="border: none;padding: 4px;"><b><?php echo $row->alamat.",  Rt:".$row->rt."  Rw:".$row->rw?></b></td></tr>
			
			<tr><td><br></br></td></tr>
			<tr><td><button name="action" type="submit" class="button" value="batal">Batal</button></td><td><button name="action" type="submit" value="hapus" class="button">Hapus</button></td></tr>
		</table>
		<?php endforeach;?>
		<?php echo form_close();?>
		</div>
		
	</div>
<div class="clear"></div>
<div id="footer">
	&copy; 2014 | <a href="#">Bank Sampah</a> | design <a href="" rel="nofollow" target="_blank">Angga H. & Sanadhi S.</a><br>
	redesign <a href="#">Administrator</a> 
</div>
</div>
</body>
</html>