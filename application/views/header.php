<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>YourTakeOn</title>	
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
	<meta name="keywords" content=""></meta>
	<meta name="description" content=""></meta>
	<meta http-equiv="imagetoolbar" content="no" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo base_url()."/public/css/easy.css"; ?>" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/easyprint.css" media="print" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/easy.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/main.js"></script>
</head>
<body>
	
<div id="container">

	<div id="header">
		<div class="right" style="margin-top: 35px;">
			<?php
				if($this->sessauth->checkLoggedIn()==false){ 
					$this->load->view('gen_nav.php');
				} else {
					$this->load->view('usernav.php');
				}
			?>
		</div>
		<div id="logo">
		<h1>YourTakeOn</h1>
		</div>
		
		<ul id="nav">
			<li><?php echo anchor('/home', 'Home'); ?></li>
			<li><?php echo anchor('/ideas/top','Top Ideas'); ?></li>
		</ul>
		
		
	</div>