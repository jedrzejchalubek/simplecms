<?php
/*
 | ------------------------------------------
 | Admin index view
 | ------------------------------------------
 | The template for displaying admin dashboard
 | 
*/
?>

<article class="content__wrapper">
	<nav class="content__nav">
		<ul class="content__nav__wrapper">
			<li class="content__nav__item">
				<a class="content__nav__item-a" href="<?php echo Url::admin('page/add.php'); ?>">
					<div class="button-text"><i class="button-icon icon-plus"></i> Add new page</div>
				</a>
			</li>
			<li class="content__nav__item">
				<a class="content__nav__item-a" href="<?php echo Url::admin('project/add.php'); ?>">
					<div class="button-text"><i class="button-icon icon-plus"></i> Add new project</div>
				</a>
			</li>
		</ul>
	</nav>
	<div class="content__container content__container--form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="row12"><h1>Hello!</h1></div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<h3>Here is your website dashboard.</h3>
					<p>Your website have <span class="badge badge-info"><?php echo $pagesCount; ?></span> pages and <span class="badge badge-info"><?php echo $projectsCount; ?></span> projects</p>
				</div>
			</div>
		</div>
	</div>
</article>
