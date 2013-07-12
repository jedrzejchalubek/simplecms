<?php

/*
 | ------------------------------------------
 | Model class
 | ------------------------------------------
 | This is general class for creating
 | application views
 | 
*/
class View
{

	/**
	 * Render view in default layout
	 * @param  String $name
	 * @param  Array $data
	 * @param  String $path
	 */
	public static function app($name, $data = null, $layout = false)
	{	
		// If data exist, extract to variables
		if ($data) extract($data);

		// Set view path
		$view = ROOT_PATH . "includes/views/{$name}.view.php";

		// If layout argument is true
		if (!$layout) {
			// Include view with layout
			include ROOT_PATH . "includes/views/layout.view.php";
		} else {
			// Include view without default layout
			include $view;
		}
	}

	/**
	 * Render admin view in default layout
	 * @param  String $name
	 * @param  Array $data
	 * @param  String $path
	 */
	public static function admin($name, $data = null, $layout = false)
	{	
		// If data exist, extract to variables
		if ($data) extract($data);

		// Set view path
		$view = ROOT_PATH . "includes/views/admin/{$name}.view.php";

		// If layout argument is true
		if (!$layout) {
			// Include view with layout
			include ROOT_PATH . "includes/views/admin/layout.view.php";
		} else {
			// Include view without default layout
			include $view;
		}
	}

}