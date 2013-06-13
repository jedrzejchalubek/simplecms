<?php

/*
 | ------------------------------------------
 | Defining application paths
 | ------------------------------------------
 | Uses data form configuration file
 | 
*/
Define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
Define("APP_PATH", "/");


/*
 | ------------------------------------------
 | Database connetion data
 | ------------------------------------------
 | Data use to connect to the database
 | 
*/
$DBconfig = array(
	'host' => 'localhost',
	'name' => 'cms',
	'user' => 'root',
	'pass' => ''
);