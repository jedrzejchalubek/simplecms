<?php
/*
 | ------------------------------------------
 | Registration page view
 | ------------------------------------------
 | Registration page view
 | 
*/
?>
<article class="content__wrapper">
	<div class="content__container content__container--form">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span6">
					<form method="post" action="" name="loginform">
						<label for="username">Username</label>
						<input id="username" class="login_input" type="text" name="username" required />
						<label for="pass">Password</label>
						<input id="pass" class="login_input" type="password" name="pass" autocomplete="off" required />
						<input type="submit"  name="login" value="Log in" />
					</form>
				</div>
			</div>
		</div>
	</div>
</article>
