<?php
/*
 | ------------------------------------------
 | Admin general layout view
 | ------------------------------------------
 | The general template for views
 | 
*/
?>

<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<?php echo Html::styles( Url::css('bootstrap.min.css', true) ); ?>
	<?php echo Html::styles( Url::css('bootstrap-wysihtml5-0.0.2.css', true) ); ?>
	<?php echo Html::styles( Url::css('style.css', true) ); ?>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<?php echo Html::scripts( Url::js('bootstrap.min.js', true) ); ?>
	<?php echo Html::scripts( Url::js('wysihtml5-0.3.0.min.js', true) ); ?>
	<?php echo Html::scripts( Url::js('bootstrap-wysihtml5-0.0.2.js', true) ); ?>
</head>
<body>
	<section class="admin__content">
		<?php include($view); ?>
	</section>
	
	<section class="admin__sidebar">
		<nav class="sidebar__nav">
			<ul class="sidebar__nav__wrapper">
				<li class="sidebar__nav__item">
					<a class="sidebar__nav__item-a sidebar__nav__item-a--dashboard" href="<?php echo Url::admin(); ?>">
						<div class="button-text"><i class="button-icon icon-home icon-white"></i> Dashboard</div>
					</a>
				</li>
				<li class="sidebar__nav__item">
					<a class="sidebar__nav__item-a" href="<?php echo Url::admin('pages.php'); ?>">
						<div class="button-text"><i class="button-icon icon-file icon-white"></i> Pages</div>
					</a>
				</li>
				<li class="sidebar__nav__item">
					<a class="sidebar__nav__item-a" href="<?php echo Url::admin('projects.php'); ?>">
						<div class="button-text"><i class="button-icon icon-folder-open icon-white"></i> Projects</div>
					</a>
				</li>
				<li class="sidebar__nav__item">
					<a class="sidebar__nav__item-a" href="?logout">
						<div class="button-text"><i class="button-icon icon-off icon-white"></i> Logout</div>
					</a>
				</li>
			</ul>
		</nav>
	</section>

	<script type="text/javascript">
		$('#content').wysihtml5();
	</script>
</body>
</html>