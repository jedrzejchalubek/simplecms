<?php
/*
 | ------------------------------------------
 | App single project view
 | ------------------------------------------
 | The general template for single project
 | 
*/
?>

<section class="header header--project">
	<article class="article--narrow container-fluid">
		<a class="goTo" href="#slider"><h3 class="header-title header-h"><?php echo $project["title"]; ?></h3></a>
		<nav class="header__nav">
			<a href="<?php echo $prev['slug']; ?>" class="header__nav-item header__nav-item--left">←</a>
			<a href="<?php echo $next['slug']; ?>" class="header__nav-item header__nav-item--right">→</a>
			<a href="<?php echo Url::home('#design'); ?>" class="header__nav-item header__nav-item--home">
				<img src="<?php echo Url::home('images/nav-home.png'); ?>" alt="Homepage">
			</a>
		</nav>
	</article>
</section>

<article class="slider" id="slider">
	<ul class="slides">
		<?php echo $project["content"]; ?>
		<!-- <li class="slide">
			<div class="slide-item" style="background: url() center center no-repeat; background-size: cover;"></div>
		</li> -->
	</ul>
</article>