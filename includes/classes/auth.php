<?php 

/**
* Auth
*/
class Auth
{
	
	/**
	 * Verify password
	 * @param  Array $user 
	 * @return Bool
	 */
	public static function password($user)
	{
		return Auth::hash($_POST['pass'], $user['token']) === $user['pass'];
	}

	/**
	 * Generate hash
	 * @param  String $value
	 * @param  String $salt 
	 * @return String       
	 */
	public static function hash($value, $salt = null)
	{
		return hash('sha512', $value . $salt);
	}

	/**
	 * Randomize unique token
	 * @return String
	 */
	public static function randomToken()
	{
		return sha1( uniqid(microtime(true).mt_rand(10000, 90000)) );
	}

}