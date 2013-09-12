<?php

/*
 | ------------------------------------------
 | Html class
 | ------------------------------------------
 | This is helper class for generating html markup
 | 
*/
class Html
{

	/**
	 * Image
	 * @param  String $src 
	 * @return String
	 */
	public static function img($src)
	{
		return "<img src='{$src}' />";
	}

	/**
	 * Anchor
	 * @param  String $url  
	 * @param  String $text 
	 * @return Sting       
	 */
	public static function link($url, $text)
	{
		return "<a href='{$url}'>{$text}</a>";
	}

	/**
	 * Stylesheet link
	 * @param  String $href 
	 * @return String       
	 */
	public static function styles($href)
	{
		return "<link rel='stylesheet' href='{$href}'>";
	}

	/**
	 * Scripts link
	 * @param  String $src 
	 * @return String       
	 */
	public static function scripts($src)
	{
		return "<script type='text/javascript' src='{$src}'></script>";
	}

	/**
	 * Alert box markup
	 * @param  String $message 
	 * @return String
	 */
	public static function alert($message)
	{
		if (isset($message)) {
			return "<div class='alert alert-{$message['type']}'>{$message['text']}</div>";
		}
	}

}