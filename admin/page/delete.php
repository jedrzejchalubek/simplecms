<?php

require_once "../../head.php";

if ($User->isLogged()) { 
	$id = Router::get('id');

	if ($id) {
		
		$Page->delete($id);

		Server::redirect('../pages.php');

	} else {
		// Delete Error
	}
} else {
	Server::redirect('/login');
}