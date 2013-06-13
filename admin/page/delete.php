<?php

require_once "../../head.php";

$id = Router::get('id');

if ($id) {
	
	$Page->delete($id);

	Server::redirect('../pages.php');

} else {
	// Delete Error
}