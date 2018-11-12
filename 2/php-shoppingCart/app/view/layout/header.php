<!DOCTYPE html>
<html>
	<head>
		<title>PHP-ShoppingCart</title>

		<?php

		$paths = include dirname(dirname(dirname(__FILE__))) . "/paths.php";

		$baseURL = $paths['baseURL'];

		$publicBaseURL = $paths['publicBaseURL'];

		?>
		
		<link rel="stylesheet" href="<?php echo $publicBaseURL . '/css/style-a.css';?>">		

	</head>
	<body>
	<div class="navbar">

		<?php include $paths['menu']; ?>	

	</div>

	<div class="navbar">

		<?php include $paths['userWidget']; ?>

	</div>

	<?php 

	if(isset($_SESSION['user_id'])){ 

	?>

		<div class="navbar">

			<?php include $paths['cartWidget']; ?>

		</div>

		<div class="navbar">

			<?php include $paths['checkoutAndPayWidget']; ?>

		</div>

	<?php 

	}

	?>

	<div class="container">

		<!--content-->