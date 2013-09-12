<?php

require_once "../../head.php";

if ($User->isLogged()) { 
	// Get User id
	$id = Router::get('id');

	// There is id set?
	if ($id) {
		
		// Delete targeted User
		$User->delete($id);

		// Redirect to User list
		Server::redirect('../users.php');

	} else {
		// Delete Error
	}
} else {
	Server::redirect('/login');
}