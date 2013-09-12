<?php 

require_once "../head.php";

if ($User->isLogged()) {  
	// Fetch all projects
	$projects = $Project->fetch();

	$data = array();

	// There is any project?
	if ($projects) {

		$data = array(
			'projects' => $projects,
		);

		// Make project list view
		View::admin('projects', $data);

	} else {

		// Make project list view
		View::admin('projects', $data);
		
	}
} else {
	Server::redirect('/login');
}