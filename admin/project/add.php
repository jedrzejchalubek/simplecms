<?php

require_once "../../head.php";

// Set defaul message
$message = array(
	'type' => 'normal',
	'text' => "<strong>Adding </strong>&mdash; You're currently adding new project."
);

// Request was post?
if ( Server::ispost() ) {

	// Set project data
	$slug        = Router::slugify(Router::post('title'));
	$title       = Router::post('title');
	$thumb       = Router::post('thumb');
	$image       = Router::post('image');
	$content     = Router::post('content');
	$description = Router::post('description');

	// There is title?
	if ( !empty($title) ) {
		
		// Add project
		$Project->add(array(
			'slug'        => $slug,
			'title'       => $title,
			'thumb'       => $thumb,
			'image'       => $image,
			'content'     => $content,
			'description' => $description 
		));

		// Set success message
		$message = array(
			'type' => 'success',
			'text' => "<strong>Success </strong>&mdash; Project successful added."
		);

	// Title was empty
	} else {

		// Set error message
		$message = array(
			'type' => 'danger',
			'text' => "<strong>Error </strong>&mdash; Fill in project title."
		);

	}
}

// Make 'add project' view
View::admin('project/add', array(
	'message' => $message
));