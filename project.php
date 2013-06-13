<?php 

require_once "head.php";

$project = $Project->getBySlug(Router::get('slug'));
$next = $Project->next($project);
$prev = $Project->prev($project);

if ($project) {
	View::app('project', array(
		'project' => $project,
		'next' => $next,
		'prev' => $prev
	));
} else {
	View::app('404');
}