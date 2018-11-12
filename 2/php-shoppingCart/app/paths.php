<?php

$configActive 		= 		require_once dirname(__FILE__) . '/config/configActive.php';

// Dir --------------------------------------------------------

$baseDir 			= 		dirname(dirname(__FILE__));

$baseDir 			= 		str_replace('\\','/',$baseDir);

$config  			=  		$baseDir . '/app/config';

$layoutPath 		= 		$baseDir . '/app/view/layout';

// Url --------------------------------------------------------

$configParams 		=       parse_ini_file("$config/config$configActive.ini", true);

$baseURL 			= 		'http://localhost/_projetos/ARQSI/php-shoppingCart';//$configParams['url']['base'];

$publicBaseURL 		= 		$baseURL . '/public';

// Ret --------------------------------------------------------

return [

	'baseURL'				=> 		$baseURL,
	'publicBaseURL'			=> 		$publicBaseURL,

	// Files
	'header'				=> 		$layoutPath.	'/header.php',
	'footer'				=> 		$layoutPath.	'/footer.php',
	'userWidget'			=> 		$layoutPath.	'/_partials/userWidget.php',
	'cartWidget'			=> 		$layoutPath.	'/_partials/cartWidget.php',
	'checkoutAndPayWidget'	=>		$layoutPath.	'/_partials/checkoutAndPayWidget.php',
	'menu'					=> 		$layoutPath.	'/_partials/menu.php',
	'products'				=> 		$baseDir.		'/app/view/product/index.php',
	'init'					=> 		$baseDir.		'/app/init.php',
	'index'					=>		$publicBaseURL.	'/home/index',
	'login'					=>		$publicBaseURL.	'/user/login',

	// js
	'jquery'				=>		$publicBaseURL.	'/js/lib/jquery-3.1.1.min.js',
	'js_global'				=>		$publicBaseURL.	'/js/global.js',
	'js_cartWidget'			=>		$publicBaseURL.	'/js/layout/_partials/cartWidget.js',

	// Configuration
	'database'				=>		$database
];
