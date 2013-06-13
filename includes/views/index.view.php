<?php
/*
 | ------------------------------------------
 | App index view
 | ------------------------------------------
 | The template for displaying admin dashboard
 | 
*/
?>

<section class="greet">
	<article class="article--narrow">
		<div class="container-fluid">
			<div class="row-fluid">
				<a href="#about" class="greet__hello goTo"></a>
				<img class="greet__arrow" src="images/greet-arrow.png" alt="Go further">
			</div>
		</div>
	</article>
</section>

<section class="about" id="about">
	<article>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h1 class="about-h article-h">
						<img class="about__logotype" src="images/logotype.jpg" alt="shn">
						I’m Jędrzej Chałubek, aka shn <br />
						a young design designer and web developer<br />
						of unrestrained desire to collect new experiences.<br />
						I'm really curious about how it all works.<br />
						Go ahead and visit my <a class="about-a" href="http://www.behance.net/jedrzejchalubek">behance</a>, <a class="about-a" href="http://dribbble.com/jedrzejchalubek">dribbble</a> and <a class="about-a" href="https://github.com/jedrzejchalubek">github</a>.</h1>
				</div>
			</div>
		</div>
	</article>
</section>

<section class="design" id="design">
	<article class="article--narrow">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h1 class="article-h">Take a look at some projects <br />that I designed.</h1>
					<ul class="design__thumbs row-fluid">
						
						<?php foreach ($firstProject as $project) : ?>
						<li class="design__thumbs-item design__thumbs-item--big">
							<a href="<?php echo "design/{$project['slug']}"; ?>" class="thumbs-item__img" style="background: url(<?php echo $project['image']; ?>) no-repeat center center;"></a>
							<div class="thumbs-item__disc">
								<div class="thumbs-item__disc-wrapper thumbs-item__disc-wrapper--big">
									<h2 class="thumbs-item__disc-h thumbs-item__disc-h--big">
										<?php echo $project['title']; ?>
									</h2>
									<p class="thumbs-item__disc-p thumbs-item__disc-p--big">
										<?php echo $project['description']; ?>
									</p>
								</div>
							</div>
						</li>
						<?php endforeach; ?>

						<?php foreach ($allNextProjects as $project) : ?>
						<li class="design__thumbs-item">
							<a href="<?php echo "design/{$project['slug']}"; ?>" class="thumbs-item__img" style="background: url(<?php echo $project['thumb']; ?>) no-repeat center center;"></a>
							<div class="thumbs-item__disc">
								<div class="thumbs-item__disc-wrapper">
									<h2 class="thumbs-item__disc-h">
										<?php echo $project['title']; ?>
									</h2>
									<p class="thumbs-item__disc-p">
										<?php echo $project['description']; ?>
									</p>
								</div>
							</div>
						</li>
						<?php endforeach; ?>

					</ul>
				</div>
			</div>
		</div>
	</article>
</section>

<section class="project" id="project">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h1 class="article-h">Here are some little things <br /> that I developed.</h1>
				<article class="dev__articles article--narrow">
					<?php foreach ($pages as $key => $page) : ?>
					<a href="<?php echo "project/{$page['slug']}"; ?>" class="article__content span<?php echo ($pagesCount < 4) ? 12/$pagesCount : 3; ?>">
						<div class="article__content-wrapper">
							<h2 class="article__content-h">
								<?php echo $page['title']; ?>
							</h2>
							<p class="article__content-p">
								<?php echo $page['description']; ?>
							</p>
						</div>
					</a>
					<?php endforeach; ?>
				</article>
			</div>
		</div>
	</div>
</section>