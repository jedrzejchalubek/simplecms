<?php

require_once "../head.php";

if ($User->isLogged()) { 
	// Make admin dashboard view
	View::admin('index', array(
		// Count pages
		'pagesCount' => $Page->count(),
		// Count projects
		'projectsCount' => $Project->count()
	));
} else {
	Server::redirect('/login');
}