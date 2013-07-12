<?php

require_once "../head.php";

if ($User->isLogged()) { 
	
	if ( Server::ispost() ) {

		$token = Auth::randomToken();

		$User->register(array(
			'first_name' => Router::post('first_name'),
			'last_name'  => Router::post('last_name'),
			'username'   => Router::post('username'),
			'email'      => Router::post('email'),
			'pass'       => Auth::hash(Router::post('pass'), $token),
			'token'      => $token,
		));

	}

	View::admin('users');
	
} else {
	Server::redirect('/login');
}
