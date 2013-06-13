<?php
/*
 | ------------------------------------------
 | App 404 error view
 | ------------------------------------------
 | The template for displaying 404 "Not found" error
 | 
*/
?>

<section class="header header--page">
	<article class="article--narrow container-fluid">
		<h3 class="header-h">Oh, 404!</h3>
		<nav class="header__nav">
			<a href="<?php echo Url::home(); ?>" class="header__nav-item header__nav-item--home"><img src="images/nav-home.png" alt="Homepage"></a>
		</nav>
	</article>
</section>

<section class="content">
	<article class="article--narrow container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h1 class="article-h">I don't have the page you are looking for :( <br />But don't worry, I have quite a lot of other. Take a look.</h1>
			</div>
		</div>
	</article>
</section>