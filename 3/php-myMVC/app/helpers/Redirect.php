<?php

class Redirect{

	public static function toIndex(){

		$paths = self::getPaths();

		$index = $paths['index'];

		header("Location: $index");

	}

	private static function getPaths(){

		return include dirname(dirname(__FILE__)) . "/paths.php";
		
	}
}