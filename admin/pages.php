<?php 

require_once "../head.php";

if ($User->isLogged()) { 
	$pages = $Page->fetch();

	$data = array();

	// There is any page?
	if ($pages) {

		$data = array(
			'pages' => $pages,
		);

		// Make pages list view
		View::admin('pages', $data);

	} else {

		// Make pages list view
		View::admin('pages', $data);
		
	}
} else {
	Server::redirect('/login');
}