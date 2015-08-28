
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<!-- General meta information -->
	<title>Login Bank Sampah</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/jquery.query-2.1.7.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/rainbows.js"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>css/style.css" media="screen" />
	<!-- // Load stylesheets -->
	
<script>


	$(document).ready(function(){
 
	$("#submit1").hover(
	function() {
	$(this).animate({"opacity": "0"}, "slow");
	},
	function() {
	$(this).animate({"opacity": "1"}, "slow");
	});
 	});


</script>
	
</head>
<body>

	<div id="wrapper">
	
		<div id="wrappertop"></div>
		

		<div id="wrappermiddle">

			<h2>Login Staf</h2>
			
			<?php echo form_open('c_main/login_validation') ?>
	<table>
		<tr>
			<td><div id="username_input">

				<div id="username_inputleft"></div>
	
		
				<div id="username_inputmiddle">
				
				
					<input type="text" name="id" id="url" placeholder="Nomor Registrasi"  value="<?php echo $this->input->post('id')?>">
					<img id="url_user" src="<?=base_url()?>images/mailicon.png" alt="">
					

				
				</div>
		
				<div id="username_inputright"></div>

			</div>
			</td>
			<td>
			
			</td>
		</tr>
		<tr>
			<td>
			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
				
					<input type="password" name="password" id="url" placeholder="Password"  onclick="this.value = ''">
					<img id="url_password" src="<?=base_url()?>images/passicon.png" alt="">
				
				</div>

				<div id="password_inputright"></div>

			</div>
			</td>
			<td>
			
			</td>
		</tr>
		<tr>
		<td>
			<div id="submit">
				
				<input type="image" src="<?=base_url()?>images/submit_hover.png" id="submit1" value="Sign In">
				<input type="image" src="<?=base_url()?>images/submit.png" id="submit2" value="Sign In">
				
			</div>
		</td>
		<td></td>
		</tr>
</table>
			<?php form_close(); ?>


			<div id="links_left">

			<a href="#">Forgot your Password?</a>

			</div>

			<div id="links_right"><a href="#">Not a Member Yet?</a></div>

		</div>

		<div id="wrapperbottom"> </div>
		
		<div id="powered">
		<!--<p>Powered by <a href="http://www.premiumfreebies.eu">Premiumfreebies Control Panel</a></p>-->
		<!--<span style="color:red"><?php echo validation_errors();?></span>-->
		</div>
		<span style="color:red"><?php echo validation_errors();?></span>
	</div>

</body>
</html>