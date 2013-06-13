<?php
/*
 | ------------------------------------------
 | Admin add page view
 | ------------------------------------------
 | The template for displaying admin/page/add.php content
 | 
*/
?>

<section class="admin__content">
	<article class="content__wrapper">
		<nav class="content__nav">
			<ul class="content__nav__wrapper">
				<li class="content__nav__item">
					<button class="content__nav__item-a button-add" type="submit" form="form--add" href="#">
						<div class="button button-text"><i class="button-icon icon-plus"></i> Add this page</div>
					</button>
				</li>

			</ul>
		</nav>
		<div class="content__containerss">
			<div class="message">
				<?php echo Html::alert($message); ?>
			</div>
			<div class="content__edit container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<form class="form-verical" id="form--add" method="POST">
							<div class="control-group">
								<label class="control-label" for="title">Title:</label>
								<div class="controls">
									<input class="span12" type="text" id="title" name="title" placeholder="Page title">
								</div>
								<label class="control-label" for="thumb">Thumb:</label>
								<div class="controls">
									<input class="span12" type="text" id="thumb" name="thumb" placeholder="Page thumb">
								</div>
								<label class="control-label" for="image">Image:</label>
								<div class="controls">
									<input class="span12" type="text" id="image" name="image" placeholder="Page image">
								</div>
								<label class="control-label" for="description">Description:</label>
								<div class="controls">
									<textarea class="span12" rows="6" id="description" name="description" placeholder="Page description"></textarea>
								</div>
								<label class="control-label" for="content">Content:</label>
								<div class="controls">
									<textarea class="span12" rows="15" id="content" name="content" placeholder="Page content"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>