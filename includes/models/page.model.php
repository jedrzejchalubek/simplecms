<?php

/*
 | ------------------------------------------
 | Page model
 | ------------------------------------------
 | This is general model for pages.
 | Here you can add page specific methods.
 | 
*/
class Page extends Model
{
	
	/**
	 * Constructor
	 * @param Object $db    
	 * @param string $table 
	 */
	function __construct($db, $table = 'pages')
	{
		$this->db = $db;
		$this->table = $table;
	}

}