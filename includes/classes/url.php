<?php

/*
 | ------------------------------------------
 | Html class
 | ------------------------------------------
 | This is helper class for generating
 | application folders paths
 | 
*/
class Url
{

	/**
	 * Home directory path
	 * @param  String $url 
	 * @return String      
	 */
	public static function home($url = null)
	{
		return APP_PATH . $url;
	}

	/**
	 * Admin directory path
	 * @param  String $url 
	 * @return String      
	 */
	public static function admin($url = null)
	{
		return APP_PATH . "admin/{$url}";
	}

	/**
	 * CSS directory path
	 * @param  String $url
	 * @param  Bool $admin
	 * @return String
	 */
	public static function css($url = null, $admin = false)
	{
		if($admin) $admin = 'admin/';

		return APP_PATH . "{$admin}css/{$url}";
	}

	/**
	 * JS directory path
	 * @param  String $url
	 * @param  Bool $admin
	 * @return String
	 */
	public static function js($url = null, $admin = false)
	{
		if($admin) $admin = 'admin/';

		return APP_PATH . "{$admin}js/{$url}";
	}

}