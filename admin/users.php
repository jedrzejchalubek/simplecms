<?php 

require_once "../head.php";

if ($User->isLogged()) {  
	// Fetch all users
	$users = $User->fetch();

	$data = array();

	// There is any project?
	if ($users) {

		$data = array(
			'users' => $users,
		);

		// Make project list view
		View::admin('users', $data);

	} else {

		// Make project list view
		View::admin('users', $data);
		
	}
} else {
	Server::redirect('/login');
}