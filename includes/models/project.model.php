<?php

/*
 | ------------------------------------------
 | Projects model
 | ------------------------------------------
 | This is general model for projects.
 | Here you can add project specific methods.
 | 
*/
class Project extends Model
{
	
	/**
	 * Constructor
	 * @param Object $db    
	 * @param string $table 
	 */
	function __construct($db, $table = 'projects')
	{
		$this->db = $db;
		$this->table = $table;
	}

}