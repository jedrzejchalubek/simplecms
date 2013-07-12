<?php

/*
 | ------------------------------------------
 | Require application configuration file
 | ------------------------------------------
 | That file stores configuration data
 | 
*/
require_once "config.php";


/*
 | ------------------------------------------
 | Require all application classes
 | ------------------------------------------
 | Require all files from classes directory
 | 
*/
foreach(glob(ROOT_PATH . "includes/classes/*.php") as $class){
    require_once $class;
}


/*
 | ------------------------------------------
 | Require all application models
 | ------------------------------------------
 | Require all files from models directory
 | 
*/
foreach(glob(ROOT_PATH . "includes/models/*.php") as $model){
    require_once $model;
}


/*
 | ------------------------------------------
 | Making database connection
 | ------------------------------------------
 | Uses data form configuration file
 | 
*/
$db = new Database(
	$DBconfig['host'],
	$DBconfig['name'],
	$DBconfig['user'],
	$DBconfig['pass']
);


/*
 | ------------------------------------------
 | Models instances
 | ------------------------------------------
 | Calling models constructors
 | 
*/
$Page = new Page($db);
$Project = new Project($db);
$User = new User($db);