<?php
/*
 | ------------------------------------------
 | Admin add project view
 | ------------------------------------------
 | The template for displaying admin/page/add.php content
 | 
*/
?>

<article class="content__wrapper">
	<nav class="content__nav">
		<ul class="content__nav__wrapper">
			<li class="content__nav__item">
				<button class="content__nav__item-a button-add" type="submit" form="form--add" href="#">
					<div class="button button-text"><i class="button-icon icon-plus"></i> Add this user</div>
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
							<label class="control-label" for="register-firstname">Firstname:</label>
							<div class="controls">
								<input id="register-firstname" type="text" pattern="{1,64}" name="first_name" required />
							</div>
							<label class="control-label" for="register-lastname">Lastname:</label>
							<div class="controls">
								<input id="register-lastname" type="text" pattern="{1,64}" name="last_name" required />
							</div>
							<label class="control-label" for="register-username">Username:</label>
							<div class="controls">
								<input id="register-username" type="text" pattern="[a-zA-Z0-9]{5,64}" name="username" required />
							</div>
							<label class="control-label" for="register-email">Email:</label>
							<div class="controls">
								<input id="register-email" type="email" name="email" required />     
							</div>
							<label class="control-label" for="register-pass">Password:</label>
							<div class="controls">
								<input id="register-pass" type="password" name="pass" pattern=".{6,}" required autocomplete="off" />  
							</div>
							<label class="control-label" for="register-pass">Password:</label>
							<div class="controls">
								<input id="register-pass" type="password" name="pass--repeat" pattern=".{6,}" required autocomplete="off" />  
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</article>
