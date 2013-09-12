<?php

require_once "../../head.php";

if ($User->isLogged()) {  

	// Set defaul message
	$message = array(
		'type' => 'normal',
		'text' => "<strong>Adding </strong>&mdash; You're currently adding new user."
	);

	// Request was post?
	if ( Server::ispost() ) {

		$token = Auth::randomToken();
		$first_name = Router::post('first_name');
		$last_name  = Router::post('last_name');
		$username   = Router::post('username');
		$email      = Router::post('email');
		$pass       = Auth::hash(Router::post('pass'), $token);

		// There is title?
		if ( !empty($username) ) {
			
			// Add user
			$User->add(array(
				'username' => $username,
				'pass' => $pass,
				'email' => $email,
				'first_name' => $first_name,
				'last_name'  => $last_name,
				'token' => $token 
			));

			// Set success message
			$message = array(
				'type' => 'success',
				'text' => "<strong>Success </strong>&mdash; User successful added."
			);

		// Title was empty
		} else {

			// Set error message
			$message = array(
				'type' => 'danger',
				'text' => "<strong>Error </strong>&mdash; Fill in user title."
			);

		}
	}

	// Make 'add user' view
	View::admin('user/add', array(
		'message' => $message
	));
	
} else {
	Server::redirect('/login');
}