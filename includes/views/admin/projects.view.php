<?php
/*
 | ------------------------------------------
 | Admin projects view
 | ------------------------------------------
 | The template for displaying projects list
 | 
*/
?>


<article class="content__wrapper">
	<nav class="content__nav">
		<ul class="content__nav__wrapper">
			<li class="content__nav__item">
				<a class="content__nav__item-a" href="../admin/project/add.php">
					<div class="button-text"><i class="button-icon icon-plus"></i> Add new project</div>
				</a>
			</li>
		</ul>
	</nav>
	<div class="content__list">
		<div class="row-fluid">
			<?php foreach ($projects as $project) : ?>
			<div class="content__list__item row12">
				<div class="content__list__item-title content__list__item-col span5">
					<a class="content__list__item-title-a" href="project/edit.php?id=<?php echo $project['id']; ?>">
						<?php echo $project['title']; ?>
					</a>
				</div>
				<div class="content__list__item-date content__list__item-col span1">
					<?php echo $project['author']; ?>
				</div>
				<div class="content__list__item-modify content__list__item-col span2">
					<?php echo strtok($project['date'], " ");; ?>
				</div>
				<div class="content__list__item-nav content__list__item-col span4">
					<nav class="content__list__item__nav">
						<ul class="list__item__nav__wrapper">
							<li class="list__item__nav__el">
								<a class="list__item__nav__el-a button-view" href="../project.php?slug=<?php echo $project['slug']; ?>">
									<div class="button button-text"><i class="button-icon icon-eye-open"></i> View</div>
								</a>
							</li>
							<li class="list__item__nav__el">
								<a class="list__item__nav__el-a button-edit" href="project/edit.php?id=<?php echo $project['id']; ?>">
									<div class="button button-text"><i class="button-icon icon-edit"></i> Edit</div>
								</a>
							</li>
							<li class="list__item__nav__el">
								<a class="list__item__nav__el-a button-delete" href="#" 
									data-toggle="popover"
									data-original-title ="Are you sure you want to delete this project?"
									data-content='
										<a href="project/delete.php?id=<?php echo $project['id']; ?>" class="button-delete-confirm btn btn-danger btn-block" type="button">Delete</a>
										<button class="button-delete-cancel btn btn btn-block" type="button">Cancel</button>
									' 
								>
									<div class="button button-text"><i class="button-icon icon-remove"></i> Delete</div>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</article>

<script>
	$('.button-delete').on('click', function (e) {
		e.preventDefault();
	}).popover({
		'placement': 'bottom',
		'html': true
	});

	$(document).on('click', '.button-delete-cancel', function(e) {
		e.preventDefault();
		$('.button-delete').popover('hide');
	});
</script>
