<?php 

require_once "../../head.php";

if ($User->isLogged()) { 
	
	$message = array(
		'type' => 'normal',
		'text' => "<strong>Editing </strong>&mdash; You're currently editing this user."
	);

	if ( Server::ispost() ) {

		$token = Auth::randomToken();
		$id         = Router::get('id');
		$first_name = Router::post('first_name');
		$last_name  = Router::post('last_name');
		$username   = Router::post('username');
		$email      = Router::post('email');
		$pass       = Auth::hash(Router::post('pass'), $token);

		if ( !empty($username) ) {

			$User->update(array(
				'id'          => $id,
				'first_name' => $first_name,
				'last_name'  => $last_name,
				'username' => $username,
				'email' => $email,
				'pass' => $pass,
				'token' => $token
			));

			$message = array(
				'type' => 'success',
				'text' => "<strong>Success </strong>&mdash; User successful updated."
			);

			$user = $User->getById(Router::get('id'));

			View::admin('user/edit', array(
				'user' => $user,
				'message' => $message
			));

		} else {

			$message = array(
				'type' => 'danger',
				'text' => "<strong>Error </strong>&mdash; Fill user title."
			);

			$user = $User->getById(Router::get('id'));

			View::admin('user/edit', array(
				'user' => $user,
				'message' => $message
			));

		}
	}

	if ( Server::isget() ) {

		if ( Router::get('id') ) {

			$user = $User->getById(Router::get('id'));

			if ($user) {

				View::admin('user/edit', array(
					'user' => $user,
					'message' => $message
				));

			} else {
				View::admin('404');
			}

		} else {
			View::admin('404');
		}
	}

} else {
	Server::redirect('/login');
}