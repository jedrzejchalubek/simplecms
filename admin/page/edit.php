<?php 

require_once "../../head.php";

if ($User->isLogged()) { 

	$message = array(
		'type' => 'normal',
		'text' => "<strong>Editing </strong>&mdash; You're currently editing this page."
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

			$Page->update(array(
				'id'          => $id,
				'slug'        => $slug,
				'title'       => $title,
				'thumb'       => $thumb,
				'image'       => $image,
				'content'     => $content,
				'description' => $description
			));

			$message = array(
				'type' => 'success',
				'text' => "<strong>Success </strong>&mdash; Page successful updated."
			);

			$page = $Page->getById(Router::get('id'));

			View::admin('page/edit', array(
				'page'    => $page,
				'message' => $message
			));

		} else {

			$message = array(
				'type' => 'danger',
				'text' => "<strong>Error </strong>&mdash; Fill page title."
			);

			$page = $Page->getById(Router::get('id'));

			View::admin('page/edit', array(
				'page'    => $page,
				'message' => $message
			));

		}
	}

	if ( Server::isget() ) {

		if ( Router::get('id') ) {

			$page = $Page->getById(Router::get('id'));

			if ($page) {
				View::admin('page/edit', array(
					'page'    => $page,
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