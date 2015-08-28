<html>
<head>
<title>Grafik Transaksi </title>
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

        <!--Highcharts JS-->
        <script type="text/javascript" src="<?php echo base_url().'highcharts/js/highcharts.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'highcharts/js/highcharts-3d.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'highcharts/js/modules/exporting.js'?>"></script>

        <!--data Grafik-->
        <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4', '#7FFF00','#FF0000','#0000FF', '#FF00FF','#FFD700','#808080','#000000','#8A2BE2','#B8860B','#CD5C5C','#B0C4DE','#00FF00','#800000','#9370DB','#00FA9A','#191970','#FFA500','#9ACD32','#DC143C','#556B2F','#008000','#00FF00'],
                title: {
                    text: <?php echo $title;?>
                },
               tooltip: {
            formatter: function() {
                return '<b>'+ this.point.name +': '+ this.percentage.toFixed(2) +"%</b>";
            }
        },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name} '+ '({point.y:.1f}' + ' Kg)</b>'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Transaksi',
                    data: <?php echo $series_data;?>
                }]
            });
        });
        </script>

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
         #container{width: 953px;height: 400px;}
        </style>
<!-- #########################################################################################-->
</head>

<body>
<div id="header">
    <?php $name=$sess_data['name'];include 'view_top_right_menu.php'?>
</div>

<div id="wrapper">
   
   
    

    <!-- ###################################################################### -->
    <div class="grid_12">
                
                <!-- Notification boxes -->
                <h1 id="judul">Grafik</h1>
                
                
                
                
                <div class="bottom-spacing">
                <!-- Button -->
                    <div class="float-right input-short">
                    
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
                    
                    
                    <div class="module-table-body">
                        <div id="container">
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                    

                     
                
                </div> <!-- End .module -->
                <?php echo form_open('c_grafik/back');?> 
                    <br>
                    <p>&nbsp;&nbsp;&nbsp;<button class="button">Kembali</button></p>
                    <?php echo form_close();?>
                
                
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
    
<div class="clear"></div>
<?php include 'footer.php'?>
</div>
</body>
</html>