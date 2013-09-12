<?php

require_once "../../head.php";

if ($User->isLogged()) { 

	$message = array(
		'type' => 'normal',
		'text' => "<strong>Adding </strong>&mdash; You're currently adding new page."
	);

	if ( Server::ispost() ) {
		$slug        = Router::slugify(Router::post('title'));
		$title       = Router::post('title');
		$thumb       = Router::post('thumb');
		$image       = Router::post('image');
		$content     = Router::post('content');
		$description = Router::post('description');

		if ( !empty($title) ) {
			
			$Page->add(array(
				'slug'        => $slug,
				'title'       => $title,
				'thumb'       => $thumb,
				'image'       => $image,
				'content'     => $content,
				'description' => $description 
			));

			$message = array(
				'type' => 'success',
				'text' => "<strong>Success </strong>&mdash; Page successful added."
			);

		} else {
			$message = array(
				'type' => 'danger',
				'text' => "<strong>Error </strong>&mdash; Fill in page title."
			);
		}
	}

	View::admin('page/add', array(
		'message' => $message
	));
	
} else {
	Server::redirect('/login');
}