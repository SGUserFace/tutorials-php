<?php

class Security{
	
	public static function hashString($string){

		return password_hash($string, PASSWORD_DEFAULT);

	}

	public static function sanitize($link, $string){

		return htmlentities(strip_tags(mysqli_real_escape_string($link, $string)));
		
	}

	public static function arraySanitize($link, $array){

		$sanitized = [];

		foreach ($array as $key => $value) {

			$sanitized[$key] = self::sanitize($link, $value);
		}

		return $sanitized;
	}

}