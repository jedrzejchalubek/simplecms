<?php
/*
 | ------------------------------------------
 | Admin edit page view
 | ------------------------------------------
 | The template for displaying admin/page/edit.php content
 | 
*/
?>

<article class="content__wrapper">
	<nav class="content__nav">
		<ul class="content__nav__wrapper">
			<li class="content__nav__item">
				<button class="content__nav__item-a button-update" type="submit" form="form--edit">
					<div class="button button-text"><i class="button-icon icon-refresh"></i> Update page</div>
				</button>
			</li>
			<li class="content__nav__item">
				<a class="content__nav__item-a" href="<?php echo Url::home('page.php?slug=' . $page['slug']); ?>">
					<div class="button button-text"><i class="button-icon icon-eye-open"></i> View page</div>
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
				<div class="row12"><h1>Editing "<?php echo $page['title']; ?>"</h1></div>
			</div>
			<div class="row-fluid">
				<div class="span10">
					<form class="form-verical" id="form--edit" method="POST">
						<div class="control-group">
							<label class="control-label" for="title">Title:</label>
							<div class="controls">
								<input class="span12" type="text" id="title" name="title" value="<?php echo $page['title']; ?>">
							</div>
							<label class="control-label" for="thumb">Thumb:</label>
							<div class="controls">
								<input class="span12" type="text" id="thumb" name="thumb" palaceholder="Thumb url" value="<?php echo $page['thumb']; ?>">
							</div>
							<label class="control-label" for="image">Image:</label>
							<div class="controls">
								<input class="span12" type="text" id="image" name="image" value="<?php echo $page['image']; ?>">
							</div>
							<label class="control-label" for="description">Description:</label>
							<div class="controls">
								<textarea class="span12" rows="6" id="description" name="description"><?php echo $page['description']; ?></textarea>
							</div>
							<label class="control-label" for="content">Content:</label>
							<div class="controls">
								<textarea class="span12" rows="15" id="content" name="content"><?php echo $page['content']; ?></textarea>
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
								<td><?php echo $page['author']; ?></td>
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
								<td><?php echo $page['date']; ?></td>
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
								<td><?php echo $page['modified']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</article>