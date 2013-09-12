<?php 

require_once "head.php";

$page = $Page->getBySlug(Router::get('slug'));
$next = $Page->next($page);
$prev = $Page->prev($page);

if ($page) {
	View::app('page', array(
		'page' => $page,
		'next' => $next,
		'prev' => $prev
	));
} else {
	View::app('404');
}