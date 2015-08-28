<html>
<head>
<title>Daftar Transaksi </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/mos-style2.css'?>"/> <!--pemanggilan file css-->
<!--<link rel="stylesheet" href="<?php echo base_url().'css/sky-form.css'?>" media="screen"/>-->
<!-- ##############################################################
	#######################################################################
	BUAT TABLE ANGGOTA-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/reset.css'?>" tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework 
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/grid.css'?>"  media="screen" />-->
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/styles.css'?>"  media="screen" />
        
        <!-- WYSIWYG editor stylesheet
        <link rel="stylesheet" type="text/css" href="jquery.wysiwyg.css"  media="screen" /> -->
        
        <!-- Table sorter stylesheet 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/tablesorter.css'?>"  media="screen" />-->
        
        <!-- Thickbox stylesheet -->
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/thickbox.css'?>"  media="screen" /> -->
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/theme-blue.css'?>"  media="screen" /> -->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-graphite.css" media="screen" />-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="<?php echo base_url().'js/anggota/jquery-1.3.2.min.js'?>" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery-1.3.2.min.js"></script>
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="jquery.wysiwyg.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="<?php echo base_url().'js/anggota/jquery.tablesorter.min.js'?>" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="<?php echo base_url().'js/anggota/jquery.tablesorter.pager.js'?>" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="jquery.pstrength-min.1.2.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="<?php echo base_url().'js/anggota/thickbox.js'?>" tppabs="http://www.xooom.pl/work/magicadmin/js/thickbox.js"></script>
        
        <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
<!-- #########################################################################################-->
</head>

<body>
<div id="header">
	<?php include 'view_top_right_menu.php'?>
</div>

<div id="wrapper">
	<?php include 'view_left_menu.php'?>
	<div id="rightContent">
	

	<!-- ###################################################################### -->
	<div class="grid_12">
                
                <!-- Notification boxes -->
				<?php foreach($nasabah->result() as $row):?>
                <h1>Detail Transaksi <?php echo " ".$row->nama;?></h1>
				<?php endforeach;?>
                
                
                
                
                <div class="bottom-spacing">
                <!-- Button -->
                    <div class="float-right input-short">
                        <a href="<?php echo base_url().'c_transaksi?id_nasabah='; echo $id;?>" class="button">
                        	<span>Buat Transaksi Baru <img src="<?php echo base_url().'images/anggota/plus-small.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
						<br></br>
                    </div>
                    
                    
                    <!-- Table records filtering 
                    Filter: 
                    <select class="input-short">
                    	<option value="1" selected="selected">Select filter</option>
                        <option value="2">Created last week</option>
                        <option value="3">Created last month</option>
                        <option value="4">Edited last week</option>
                        <option value="5">Edited last month</option>
                    </select>-->
                    
                </div>
                
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Daftar Transaksi</span></h2>
                    
                    <div class="module-table-body">
                    	<?php echo form_open('c_anggota/topdf/');?>
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:7%">No</th>
                                    <!--<th style="width:7%">id Nsbh</th>-->
                                    <th style="width:15%">Tanggal</th>
									<th style="width:26%">Item</th>
                                    <th style="width:8%">Berat</th>
									<th style="width:15%">Nilai</th>
									<th style="width:15%">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php $no=1;foreach($transaksi->result() as $row):?>
                                <tr>
                                    <td class="align-center"><?php echo $no;?></td>
                                    <input type="hidden" name="no_user" value="<?php echo $row->no_user;?>">
                                    <td><?php echo $row->tanggal;?></td>
                                    <td><?php echo $row->item;?></td>
									<td><?php echo $row->berat." kg";?></td>
									<td><?php if($row->item=="penarikan"){
									echo "Rp. -".$row->jumlah;
									}else{echo "Rp.".$row->jumlah;}?></td>
									<td><?php echo "Rp. ".$row->saldo;?></td>
									
                                    
                                </tr>
								<?php $no++;?>
                               <?php endforeach;?>
                                
                            </tbody>
                        </table>
                       </form>
						<div class="pager" id="pager">
							
							<a target="_blank" href="<?php echo base_url().'c_anggota/topdf/'.$id;?>">Cetak</a>
						<!--<br>Saldo = hasil total transaksi + saldo awal</br>
						<p>Saldo awal<?php echo " Rp ".$saldo_awal;?></p>-->
						</div>
						 
                        <!--<div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="<?php echo base_url().'images/anggota/arrow-stop-180.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180.gif" alt="first"/>
                                <img class="prev" src="<?php echo base_url().'images/anggota/arrow-180.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="<?php echo base_url().'images/anggota/arrow.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow.gif" alt="next"/>
                                <img class="last" src="<?php echo base_url().'images/anggota/arrow-stop.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop.gif" alt="last"/> 
                                <select class="pagesize input-short align-center">
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                </div>
                            </form>
                        </div>-->
                       <!-- <div class="table-apply">
                            <form action="">
                            <div>
                            <span>Apply action to selected:</span> 
                            <select class="input-medium">
                                <option value="1" selected="selected">Select action</option>
                                <option value="2">Publish</option>
                                <option value="3">Unpublish</option>
                                <option value="4">Delete</option>
                            </select>
                            </div>
                            </form>
                        </div>-->
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
                
                   <!--  <div class="pagination">           
                		<a href="" class="button"><span><img src="<?php echo base_url().'images/anggota/arrow-stop-180-small.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180-small.gif" height="9" width="12" alt="First" /> First</span></a> 
                        <a href="" class="button"><span><img src="<?php echo base_url().'images/anggota/arrow-180-small.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180-small.gif" height="9" width="12" alt="Previous" /> Prev</span></a>
                        <div class="numbers">
                            <span>Page:</span> 
                            <a href="">1</a> 
                            <span>|</span> 
                            <a href="">2</a> 
                            <span>|</span> 
                            <span class="current">3</span> 
                            <span>|</span> 
                            <a href="">4</a> 
                            <span>|</span> 
                            <a href="">5</a> 
                            <span>|</span> 
                            <a href="">6</a> 
                            <span>|</span> 
                            <a href="">7</a> 
                            <span>|</span> 
                            <span>...</span> 
                            <span>|</span> 
                            <a href="">99</a>
                        </div> 
                        <a href="" class="button"><span>Next <img src="<?php echo base_url().'images/anggota/arrow-000-small.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a> 
                        <a href="" class="button last"><span>Last <img src="<?php echo base_url().'images/anggota/arrow-stop-000-small.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
                        <div style="clear: both;"></div> 
                     </div>-->
                
                

                
			</div> <!-- ################################################################## -->
	</div>
<div class="clear"></div>
<?php include 'footer.php'?>
</div>
</body>
</html>