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
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/reset.css'?>" tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/styles.css'?>"  media="screen" />       
        <!-- Fluid 960 Grid System - CSS framework 
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/anggota/grid.css'?>"  media="screen" />-->
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
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
	<i style="color: #5b5b5b;">"SUKSES. Klik <a href="<?php echo base_url().'c_transaksi'.'?no_user='.$no_user?>"><b>di sini</b></a> untuk melakukan transaksi baru."</i>
	</div>
	<div class="module">
                	<h2><span>Daftar Transaksi</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:7%">Kode Trans</th>
                                    <th style="width:7%">id Nsbh</th>
                                    <th style="width:15%">Tanggal</th>
									<th style="width:26%">Item</th>
                                    <th style="width:8%">Berat</th>
									<th style="width:15%">Nilai</th>
									<th style="width:15%">Saldo</th>
									<!--<th style="width:7%"></th>-->
                                </tr>
                            </thead>
                            <tbody>
							<?php foreach($query->result() as $row):?>
                                <tr>
                                    <td class="align-center"><?php echo $row->id;?></td>
                                    <td><a href="<?php echo base_url().'c_anggota/detail/'.$row->no_user;?>"><?php echo $row->no_user;?></a></td>
                                    <td><?php echo $row->tanggal;?></td>
                                    <td><?php echo $row->item;?></td>
									<td><?php echo $row->berat." kg";?></td>
									<td><?php echo "Rp.".$row->jumlah;?></td>
									<td><?php echo "Rp. ".$row->saldo;?></td>
									<?php $id=$row->no_user;?>
                                    <!--<td>
                                        <a href="<?php echo base_url().'c_item/edit/'.$row->id?>"><img src="<?php echo base_url().'images/anggota/pencil.gif'?>"  width="16" height="16" alt="published" />edit</a>
                                    </td>-->
                                </tr>
                               <?php endforeach;?>
                                
                            </tbody>
                        </table>
                        </form>
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
						<a target="_blank" href="<?php echo base_url().'c_anggota/topdf/'.$id;?>" class="button">
                        	<span>Cetak <img src="<?php echo base_url().'images/anggota/plus-small.gif'?>" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                     </div> <!-- End .module-table-body -->
					 
					 
                </div> <!-- End .module -->	
		
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