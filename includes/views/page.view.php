<?php
/*
 | ------------------------------------------
 | App single page view
 | ------------------------------------------
 | The general template for single page
 | 
*/
?>

<section class="header header--page">
	<article class="article--narrow container-fluid">
		<a class="goTo" href="#content"><h3 class="header-title header-h"><?php echo $page["title"]; ?></h3></a>
		<nav class="header__nav">
			<a href="<?php echo $prev['slug']; ?>" class="header__nav-item header__nav-item--left">←</a>
			<a href="<?php echo $next['slug']; ?>" class="header__nav-item header__nav-item--right">→</a>
			<a href="<?php echo Url::home('#project'); ?>" class="header__nav-item header__nav-item--home">
				<img src="<?php echo Url::home('images/nav-home.png'); ?>" alt="Homepage">
			</a>
		</nav>
	</article>
</section>

<section class="content" id="content">
	<article class="article--narrow container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<?php echo $page["content"]; ?>
			</div>
		</div>
	</article>
</section>