<!DOCTYPE html>
<html>
	<head>
		<title>MVC</title>

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

		<?php include $paths['userWidget']; ?>

	</div>
	<div class="container">

		<!--content-->