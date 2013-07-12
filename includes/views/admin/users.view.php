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
	<form method="post" action="register.php" name="registerform">   
		
		<label for="register-firstname">Imię</label>
		<input id="register-firstname" type="text" pattern="{1,64}" name="first_name" required />

		<label for="register-lastname">Nazwisko</label>
		<input id="register-lastname" type="text" pattern="{1,64}" name="last_name" required />

		<label for="register-username">Username (only letters and numbers, 5 to 64 characters)</label>
		<input id="register-username" type="text" pattern="[a-zA-Z0-9]{5,64}" name="username" required />
		
		<label for="register-email">User's email</label>
		<input id="register-email" type="email" name="email" required />     
		
		<label for="register-pass">Password (min. 6 characters)</label>
		<input id="register-pass" type="password" name="pass" pattern=".{6,}" required autocomplete="off" />  
		
		<label for="register-pass">Repeat password</label>
		<input id="register-pass" type="password" name="pass--repeat" pattern=".{6,}" required autocomplete="off" />        

		<input type="submit"  name="register" value="Register" />

	</form>
</article>