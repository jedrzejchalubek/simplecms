<?php

/*
 | ------------------------------------------
 | Server class
 | ------------------------------------------
 | This class is responsible for checking 
 | and writing requests headers
 | 
*/
class Server
{
	
	/**
	 * Checking if server request is get
	 * @return Bool
	 */
	public static function isget()
	{
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}

	/**
	 * Checking if server request is post
	 * @return Bool
	 */
	public static function ispost()
	{
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	/**
	 * Redirect broswer to specifed url
	 * @param  String $url
	 */
	public static function redirect($url)
	{
		header("Location:" . $url);
	}
}