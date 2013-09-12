<?php

require_once "head.php";

$pages = $Page->fetch();
$projects = $Project->fetch();

$firstProject    = array_slice($projects, 0, 1);
$allNextProjects = array_slice($projects, 1);
$pagesCount      = count($pages);

$data = array();

if ($pages) {

	$data = array(
		'pages'           => $pages,
		'projects'        => $projects,
		'firstProject'    => $firstProject,
		'allNextProjects' => $allNextProjects,
		'pagesCount'      => $pagesCount
	);

	View::app('index', $data);

} else {

	View::app('index', $data);

}