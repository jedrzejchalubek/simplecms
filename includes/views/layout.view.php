<?php
/*
 | ------------------------------------------
 | App general layout view
 | ------------------------------------------
 | The general template for views
 | 
*/

// Setting chartset
header('Content-Type: text/html; charset=utf-8');
?>

<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Jędrzej Chałubek | Graphic Designer & Web Developer 
		<?php 
			if ( isset($page['title']) ) echo "| {$page['title']}";
			else if ( isset($project['title']) ) echo "| {$project['title']}";
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="description" content="I’m Jędrzej Chałubek, aka shn a young graphic designer and web developer of unrestrained desire to collect new experiences. I'm really curious about how it all works.">
	<meta name="keywords" content="graphic designer, web developer, front-end, dtp, web design, web development, html/css, javascript, design">
	
	<link rel="Shortcut icon" href="favicon.ico" />
	<?php echo Html::styles( Url::css('style.min.css') ) ?>
</head>
<body>
	<?php include($view); ?>
	
	<section class="contact">
		<article class="article--narrow container-fluid">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<h1 class="article-h">If you would like to say hello, <br /> feel free to use ...</h1>
						<h3><a href="mailto:&#104;&#101;&#108;&#108;&#111;&#64;&#106;&#101;&#100;&#114;&#122;&#101;&#106;&#99;&#104;&#97;&#108;&#117;&#98;&#101;&#107;&#46;&#99;&#111;&#109;" class="contact__button">The Biggest Contact Button That You've Ever Seen</a></h3>
						<h1 class="article-h">... or grap my email here &mdash; <a class="contact-a">&#104;&#101;&#108;&#108;&#111;&#64;&#106;&#101;&#100;&#114;&#122;&#101;&#106;&#99;&#104;&#97;&#108;&#117;&#98;&#101;&#107;&#46;&#99;&#111;&#109;</a></h1>
					</div>
				</div>
			</div>
		</article>
	</section>
	
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<?php echo Html::scripts( Url::js('scripts.js') ); ?>
	
	<script>
		$('.goTo').scrollTo({
			speed: 350
		});
		$('.slider').glide();
	</script>

	<script type="text/javascript">
		var _gaq = _gaq || [];
		var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
		_gaq.push(['_require', 'inpage_linkid', pluginUrl]);
		_gaq.push(['_setAccount', 'UA-41586814-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</body>
</html>