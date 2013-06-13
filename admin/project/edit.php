<?php 

require_once "../../head.php";

$message = array(
	'type' => 'normal',
	'text' => "<strong>Editing </strong>&mdash; You're currently editing this project."
);

if ( Server::ispost() ) {

	$id          = Router::get('id');
	$slug        = Router::slugify(Router::post('title'));
	$title       = Router::post('title');
	$thumb       = Router::post('thumb');
	$image       = Router::post('image');
	$content     = Router::post('content');
	$description = Router::post('description');

	if ( !empty($title) ) {

		$Project->update(array(
			'id'          => $id,
			'slug'        => $slug,
			'title'       => $title,
			'thumb'       => $thumb,
			'image'       => $image,
			'content'     => $content,
			'description' => $description,
		));

		$message = array(
			'type' => 'success',
			'text' => "<strong>Success </strong>&mdash; Project successful updated."
		);

		$project = $Project->getById(Router::get('id'));

		View::admin('project/edit', array(
			'project' => $project,
			'message' => $message
		));

	} else {

		$message = array(
			'type' => 'danger',
			'text' => "<strong>Error </strong>&mdash; Fill project title."
		);

		$project = $Project->getById(Router::get('id'));

		View::admin('project/edit', array(
			'project' => $project,
			'message' => $message
		));

	}
}

if ( Server::isget() ) {

	if ( Router::get('id') ) {

		$project = $Project->getById(Router::get('id'));

		if ($project) {

			View::admin('project/edit', array(
				'project' => $project,
				'message' => $message
			));

		} else {
			View::admin('404');
		}

	} else {
		View::admin('404');
	}
}