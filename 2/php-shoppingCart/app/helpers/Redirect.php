<?php

class Redirect{

	public static function toIndex(){

		$paths = self::getPaths();

		$index = $paths['index'];

		header("Location: $index");

	}

	public static function toLogin(){

		$paths = self::getPaths();

		$login = $paths['login'];

		header("Location: $login");

	}

	private static function getPaths(){

		return include dirname(dirname(__FILE__)) . "/paths.php";
		
	}
}