<html>
<head>
<title>Menu Grafik </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/img/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/mos-style3.css'?>"/> <!--pemanggilan file css-->
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
        
        <!---Jquery 1.11.1-->
         <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>


        <!-- Initiate WYIWYG text area -->
        <script type="text/javascript">         
            $(document).ready(function()
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

        <style type="text/css">
         #grafik_menu{padding-left: 20px;}
        </style>
<!-- #########################################################################################-->
</head>

<body>
<div id="header">
    <?php include 'view_top_right_menu.php'?>
</div>

<div id="wrapper">
   
   
    

    <!-- ###################################################################### -->
    <div class="grid_12">
            <div id="grafik_menu">
                <!-- Notification boxes -->
                <h2 style="text-align:center">Input Keterangan Grafik</h2>
                <h4>*Tentukan tahun, rentang bulan, dan jenis grafik</h4>
                
                <div class="bottom-spacing">
              
                    
                    
                    <?php echo form_open('c_grafik/');?> 
                    <br><strong style="font-size:15px">Tahun</strong><br>
                    <select name="tahun" class="input-short">
                        <option value="" selected="selected">Pilih Tahun</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
   
                    </select>
                    <br><br>
                    <strong style="font-size:15px">Dari</strong><br> 
                    <select name="bulan1" class="input-short">
                        <option value="" selected="selected">Pilih Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <strong>sampai</strong>
                    <select name="bulan2" class="input-short">
                        <option value="" selected="selected">Pilih Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <br><br> <strong style="font-size:15px">Grafik</strong><br>
                    <select name="graph" class="input-short">
                        <option value="" selected="selected">Pilih Jenis Grafik</option>
                        <option value="batang">Transaksi - Versi Batang</option>
                        <option value="pie">Transaksi - Versi Lingkaran</option>
                        <option value="grafiknasabah">Nasabah</option>
                        <option value="grafiknasabahrt">Nasabah - by RT</option>
                    </select>
                    <button class="button">Lihat Grafik</button>
                    <?php echo form_close();?>
                </div>
                

            </div>    
    </div> <!-- ################################################################## -->
    
<div class="clear"></div>
<?php include 'footer.php'?>
</div>
</body>
</html>