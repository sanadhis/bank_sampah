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
	
	<div class="module">
                	<h2><span>Daftar Nasabah</span></h2>
                    
                    <div class="module-table-body">
                    	<?php echo form_open('');?>
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>

                                    <th style="width:20%">Nama</th>
                                    <th style="width:35%">Alamat</th>
									<th style="width:15%">Saldo</th>
                                    <th style="width:20%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php $no=1;foreach($query->result() as $row):?>
                                <tr>
									<!--<td class="align-center"><?php echo $no;?></td>
                                    <td class="align-center"><?php echo $row->id;?></td>-->
                                    <td><a href="<?php echo base_url().'c_anggota/detail/'.$row->id?>"><?php echo $row->nama;?></a></td>
                                    <td><?php echo $row->alamat." Rt:".$row->rt." Rw:".$row->rw;?></td>
                                    <td><?php echo "Rp.".$row->saldo?></td>
                                    <td>
                                        <a href="<?php echo base_url().'c_anggota/detail/'.$row->id?>"><img src="<?php echo base_url().'images/icon/detail.png'?>"  width="16" height="16" alt="published" />detail</a>
                                        <a href="<?php echo base_url().'c_anggota/edit/'.$row->id?>"><img src="<?php echo base_url().'images/anggota/pencil.gif'?>"  width="16" height="16" alt="published" />edit</a>
										<a href="<?php echo base_url().'c_anggota/delete/'.$row->id?>"><img src="<?php echo base_url().'images/anggota/cross-on-white.gif'?>"  width="16" height="16" alt="edit" />hapus</a>
                                    </td>
                                </tr>
                               <?php $no++;endforeach;?>
                                
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
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
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