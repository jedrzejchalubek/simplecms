<?php

require_once "../../head.php";

if ($User->isLogged()) { 
	// Get project id
	$id = Router::get('id');

	// There is id set?
	if ($id) {
		
		// Delete targeted project
		$Project->delete($id);

		// Redirect to project list
		Server::redirect('../projects.php');

	} else {
		// Delete Error
	}
} else {
	Server::redirect('/login');
}