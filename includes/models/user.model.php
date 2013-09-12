<?php

/*
 | ------------------------------------------
 | User model
 | ------------------------------------------
 | This is general model for users.
 | Here you can add user specific methods.
 | 
*/
class User extends Model
{
	
	// User data
	public $user;
	// Login status flag
	public $loggedIn = false;

	/**
	 * Return user login status
	 * @return boolean 
	 */
	public function isLogged()
	{
		return $this->loggedIn;
	}

	/**
	 * If there is user login session change login flag
	 */
	public function loginWithSession()
	{
		$this->loggedIn = true;
	}

	/**
	 * Login with form
	 */
	public function loginWithPost() 
	{

		$this->user = $this->get($_POST['username']);

		if ($this->user) {

			if ( Auth::password($this->user) ) {
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['email']    = $_POST['email'];
				$_SESSION['loggedIn'] = 1;
				$this->loggedIn       = true; 
			}
		}

	}

	/**
	 * Logout user
	 */
	public function logout()
	{
		$_SESSION = array();
		session_destroy();
		$this->loggedIn = false;
	}

	/**
	 * Register new user
	 * @param  Array $data
	 */
	public function add($data)
	{
		$this->db ->add(
			$this->table, 
			'username, pass, email, first_name, last_name, token', 
			':username, :pass, :email, :first_name, :last_name, :token', 
			$data
		);
	}

	/**
	 * Update user data
	 * @param  Array $data
	 */
	public function update($data)
	{
		$this->db ->update(
			$this->table,
			'username = :username, pass = :pass, email = :email, first_name = :first_name, last_name = :last_name, token = :token', 
			$data
		);
	}

	/**
	 * Get user data from database
	 * @param  String $username 
	 * @return Array
	 */
	public function get($username)
	{
		$row = $this->db ->query("SELECT * FROM $this->table WHERE username = :username LIMIT 1", array(
			'username' => $username
		));
		$row = ( $row->rowCount() > 0 ) ? $row->fetchAll() : false;

		return $row[0];
	}

	/**
	 * Constructor
	 * @param Object $db    
	 * @param string $table 
	 */
	function __construct($db, $table = 'users')
	{
		$this->db = $db;
		$this->table = $table;

		session_start();                                        

		if (isset($_GET["logout"])) {
			$this->logout();
		} 
		else if (!empty($_SESSION['username']) && ($_SESSION['loggedIn'] == true)) {
			$this->loginWithSession();            
		}
		else if (isset($_POST["login"])) {
			$this->loginWithPost();
		}
	}

}