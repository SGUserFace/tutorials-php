<?php

error_reporting(1);

session_start();

$foldersToRequire = [
	'core',
	'controller',
	'database',
	'model',
	'helpers',
	'service',
	'webServices'
];

$lastFilesToLoad =[
	'Admin.php'
];

foreach ($foldersToRequire as $folderToRequire) {

	$dirToRequire = dirname(__FILE__) . "/$folderToRequire";
	
	foreach (scandir($dirToRequire) as $filename) {

		if($filename == 'Admin.php'){
			continue;
		}
		
		$ext 	= 	end(explode('.', $filename));

	    $path 	= 	$dirToRequire . "/" . $filename;

	    $path 	= 	str_replace('\\','/',$path);
	    
	    if (is_file($path) && $ext == 'php') {

	        require_once $path;
	    }
	}
}

$adminPath = dirname(__FILE__) . "/model/Admin.php";

$adminPath 	= 	str_replace('\\','/',$adminPath);

require_once $adminPath;