<html>
<head>
<title>Dashboard </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Angga Hendriana">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/mos-style.css" media="screen" /> <!--pemanggilan file css-->
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
	<h3 align="center">Selamat Datang <?php echo $name?></h3>
	<div class="quoteOfDay">
	<b>Bank Sampah</b><br>
	<i style="color: #5b5b5b;">"Jadikan uang, sampah Anda !"</i>
	</div>
	<?php echo form_open('c_main/dashboard2')?>
	<input type="text" name="nama" placeholder="Nama Nasabah">
	<button >Cari</button>
	<?php echo form_close()?>
	
	
		<!--<div class="shortcutHome">
		<a href=""><img src="<?=base_url()?>images/icon/posting.png"><br>Tambah Posting</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="<?=base_url()?>images/icon/photo.png"><br>Upload Foto</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="<?=base_url()?>images/icon/halaman.png"><br>Tambah Halaman</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="<?=base_url()?>images/icon/template.png"><br>Pengaturan Template</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="<?=base_url()?>images/icon/quote.png"><br>Tambah QOD</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="<?=base_url()?>images/icon/bukutamu.png"><br>Data Buku Tamu</a>
		</div> -->
		
		
		
	</div>
<div class="clear"></div>
<div id="footer">
	&copy; 2014 | <a href="#">Bank Sampah</a> | design <a href="" rel="nofollow" target="_blank">Angga H. & Sanadhi S.</a><br>
	redesign <a href="#">Administrator</a> 
</div>
</div>
</body>
</html>