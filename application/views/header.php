<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>YourTakeOn</title>	
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
	<meta name="keywords" content=""></meta>
	<meta name="description" content=""></meta>
	<meta http-equiv="imagetoolbar" content="no" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/easy.css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/easyprint.css" media="print" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/easy.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/cufon.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/defton-stylus_400.font.js"></script>
	<script type="text/javascript">
		Cufon.replace('#header h1');
	</script>
</head>
<body>
	
<div id="container">

	<div id="header">
		<div class="right" style="margin-top: 53px; font-size:1.1em;">
			<?php
				if($this->sessauth->checkLoggedIn()==false){ 
					$this->load->view('gen_nav.php');
				} else {
					$this->load->view('usernav.php');
				}
			?>
		</div>
		<h1><a href="<?php echo base_url(); ?>">YourTakeOn</a></h1>
		<ul id="nav">
			<li><?php echo anchor('/home', 'Home'); ?></li>
			<li><?php echo anchor('/idea/top','Top Ideas'); ?></li>
			<?php
				if($this->sessauth->checkLoggedIn()!=false){
					echo '<li>'.anchor('/idea/add', 'Post New Idea').'</li>';
				}
			?>
		</ul>
		
		
	</div>
	<div class="content">