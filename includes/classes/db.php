<?php

/*
 | ------------------------------------------
 | Database class
 | ------------------------------------------
 | This class is responsible for handling 
 | database operations
 | 
*/
class Database
{

	protected $host;
	protected $name;
	protected $user;
	protected $pass;
	protected $conn;

	/**
	 * Update row in database
	 * @param  String $table
	 * @param  String $columns
	 * @param  Array $data
	 */
	public function update($table, $columns, $data)
	{
		$this->query("UPDATE $table SET $columns WHERE id = :id", $data);
	}

	/**
	 * Remove row from database
	 * @param  String $table 
	 * @param  String $slug  
	 */
	public function delete($table, $id)
	{
		$this->query("DELETE FROM $table WHERE id = :id", array(
			'id' => $id
		));
	}

	/**
	 * Insert row to database
	 * @param String $table
	 * @param String $columns
	 * @param String $values
	 * @param Array $data
	 */
	public function add($table, $columns, $values, $data)
	{
		$this->query("INSERT INTO {$table}({$columns}) VALUES({$values})", $data);
	}

	/**
	 * Get specifed row by slug
	 * @param  String $table
	 * @param  String $slug
	 * @return Array $row
	 */
	public function getBySlug($table, $slug)
	{	
		$row = $this->query("SELECT * FROM $table WHERE slug = :slug LIMIT 1", array(
			'slug' => $slug
		));
		$row = ( $row->rowCount() > 0 ) ? $row->fetchAll() : false;

		return $row[0];
	}

	/**
	 * Get specifed row by id
	 * @param  String $table
	 * @param  String $id
	 * @return Array $row
	 */
	public function getById($table, $id)
	{	
		$row = $this->query("SELECT * FROM $table WHERE id = :id LIMIT 1", array(
			'id' => $id
		));
		$row = ( $row->rowCount() > 0 ) ? $row->fetchAll() : false;

		return $row[0];
	}

	/**
	 * Fetching rows from table
	 * @param  String $table
	 * @return Array
	 */
	public function fetch($table, $limit = 10)
	{
		$rows = $this->conn ->query("SELECT * FROM $table ORDER BY date DESC LIMIT $limit");
		return ( $rows->rowCount() > 0 ) ? $rows->fetchAll() : false;
	}

	/**
	 * Execute specifet SQL query
	 * @param  String $query
	 * @param  Array $bindings
	 * @return Array     
	 */
	public function query($query, $bindings = null)
	{
		$stack = $this->conn ->prepare($query);
		$stack->execute($bindings);
		return $stack;
	}

	/**
	 * Making PDO connection
	 */
	private function connect()
	{
		try {
			$this->conn = new PDO(
				"mysql:host=" . $this->host . ";dbname=" . $this->name,
				$this->user,
				$this->pass
			);
			$this->conn ->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->conn ->query('SET NAMES UTF8');
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	/**
	 * Constructor
	 * @param String $host Database host
	 * @param String $name Database name
	 * @param String $user Database username
	 * @param String $pass Database user password
	 */
	function __construct($host, $name, $user, $pass)
	{
		$this->host = $host;
		$this->name = $name;
		$this->user = $user;
		$this->pass = $pass;

		$this->connect();
	}
}