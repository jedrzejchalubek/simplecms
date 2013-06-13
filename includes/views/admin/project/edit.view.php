<?php
/*
 | ------------------------------------------
 | Admin edit project view
 | ------------------------------------------
 | The template for displaying admin/page/edit.php content
 | 
*/
?>

<section class="admin__content">
	<article class="content__wrapper">
		<nav class="content__nav">
			<ul class="content__nav__wrapper">
				<li class="content__nav__item">
					<button class="content__nav__item-a button-update" type="submit" form="form--edit">
						<div class="button button-text"><i class="button-icon icon-refresh"></i> Update project</div>
					</button>
				</li>
				<li class="content__nav__item">
					<a class="content__nav__item-a" href="<?php echo Url::home('project.php?slug=' . $project['slug']); ?>">
						<div class="button button-text"><i class="button-icon icon-eye-open"></i> View project</div>
					</a>
				</li>
			</ul>
		</nav>
		<div class="content__containers">
			<div class="message">
				<?php echo Html::alert($message); ?>
			</div>
			<div class="content__edit container-fluid">
				<div class="row-fluid">
					<div class="row12"><h1>Editing "<?php echo $project['title']; ?>"</h1></div>
				</div>
				<div class="row-fluid">
					<div class="span10">
						<form class="form-verical" id="form--edit" method="POST">
							<div class="control-group">
								<label class="control-label" for="title">Title:</label>
								<div class="controls">
									<input class="span12" type="text" id="title" name="title" value="<?php echo $project['title']; ?>">
								</div>
								<label class="control-label" for="thumb">Thumb:</label>
								<div class="controls">
									<input class="span12" type="text" id="thumb" name="thumb" value="<?php echo $project['thumb']; ?>">
								</div>
								<label class="control-label" for="image">Image:</label>
								<div class="controls">
									<input class="span12" type="text" id="image" name="image" value="<?php echo $project['image']; ?>">
								</div>
								<label class="control-label" for="description">Description:</label>
								<div class="controls">
									<textarea class="span12" rows="6" id="description" name="description"><?php echo $project['description']; ?></textarea>
								</div>
								<label class="control-label" for="content">Content:</label>
								<div class="controls">
									<textarea class="span12" rows="15" id="content" name="content"><?php echo $project['content']; ?></textarea>
								</div>
							</div>
						</form>
					</div>
					<div class="span2">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Author</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $project['author']; ?></td>
								</tr>
							</tbody>
						</table>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Date created</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $project['date']; ?></td>
								</tr>
							</tbody>
						</table>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Date modified</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $project['modified']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>