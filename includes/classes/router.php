<?php

/*
 | ------------------------------------------
 | Router class
 | ------------------------------------------
 | This class is responsible for reading requests
 | 
*/
class Router
{

	/**
	 * Get request values
	 * @param  String $value
	 * @return String
	 */
	public static function get($value)
	{
		return $_GET[$value];
	}

	/**
	 * Post request values
	 * @param  String $value
	 * @return String
	 */
	public static function post($value)
	{
		return $_POST[$value];
	}

	/**
	 * Make broswer url friendly string
	 * @param  String $text
	 * @return String
	 */
	public static function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		// trim
		$text = trim($text, '-');
		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		// lowercase
		$text = strtolower($text);
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		if ( empty($text) ) return 'n-a';

		return $text;
	}
}