<?php

$configActive 		= 		require_once dirname(__FILE__) . '/config/configActive.php';

// Dir --------------------------------------------------------

$baseDir 			= 		dirname(dirname(__FILE__));

$baseDir 			= 		str_replace('\\','/',$baseDir);

$config  			=  		$baseDir . '/app/config';

$layoutPath 		= 		$baseDir . '/app/view/layout';

// Url --------------------------------------------------------

$configParams 		=       parse_ini_file("$config/config$configActive.ini", true);

$baseURL 			= 		'http://localhost/_projetos/php-myMVC/php-myMVC';//$configParams['url']['base'];//

$publicBaseURL 		= 		$baseURL . '/public';

// Ret --------------------------------------------------------

return [
	'baseURL'		=> 		$baseURL,
	'publicBaseURL'	=> 		$publicBaseURL,
	// Files
	'header'		=> 		$layoutPath.	'/header.php',
	'footer'		=> 		$layoutPath.	'/footer.php',
	'userWidget'	=> 		$layoutPath.	'/_partials/userWidget.php',
	'menu'			=> 		$layoutPath.	'/_partials/menu.php',
	'init'			=> 		$baseDir.		'/app/init.php',
	'index'			=>		$publicBaseURL.	'/home/index',
	// Configuration
	'database'		=>		$database
];
