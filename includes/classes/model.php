<?php

/*
 | ------------------------------------------
 | Model class
 | ------------------------------------------
 | This is general class for creating application models.
 | By default operates on all table columns.
 | 
*/
class Model
{
	
	protected $db;
	protected $table;

	/**
	 * Get the next row of currently passed
	 * @param  Array $row
	 * @return Array
	 */
	public function next($row)
	{
		$rows = $this->db ->query("SELECT * FROM $this->table WHERE date > :date ORDER BY date ASC LIMIT 0,1", array(
			'date' => $row['date']
		));

		$nextRow = $rows->fetchAll();

		return ( $rows->rowCount() > 0 ) ? $nextRow[0] : $this->first();
	}

	/**
	 * Get the previous row of currently passed
	 * @param  Array $row
	 * @return Array
	 */
	public function prev($row)
	{
		$rows = $this->db ->query("SELECT * FROM $this->table WHERE date < :date ORDER BY date ASC LIMIT 0,1", array(
			'date' => $row['date']
		));

		$prevRow = $rows->fetchAll();

		return ( $rows->rowCount() > 0 ) ? $prevRow[0] : $this->last();
	}

	/**
	 * Get first row in tabele
	 * @return $row
	 */
	public function first()
	{
		$row = $this->db ->query("SELECT * FROM $this->table ORDER BY date ASC LIMIT 0,1");
		$row = $row->fetchAll();

		return $row[0];
	}

	/**
	 * Get last row in tabele
	 * @return $row
	 */
	public function last()
	{
		$row = $this->db ->query("SELECT * FROM $this->table ORDER BY date DESC LIMIT 0,1");
		$row = $row->fetchAll();
		
		return $row[0];
	}

	/**
	 * Count number of rows in database
	 * @return Int
	 */
	public function count()
	{
		return count( $this->fetch() );
	}

	/**
	 * Fetch rows from database
	 * @return Array
	 */
	public function fetch()
	{
		return $this->db ->fetch($this->table);
	}

	/**
	 * Get row from database by slug
	 * @param  String $slug
	 * @return Array
	 */
	public function getBySlug($slug)
	{
		return $this->db ->getBySlug($this->table, $slug);
	}

	/**
	 * Get row from database by id
	 * @param  String $id
	 * @return Array
	 */
	public function getById($id)
	{
		return $this->db ->getById($this->table, $id);
	}

	/**
	 * Remove row from database
	 * @param  String $id 
	 */
	public function delete($id)
	{
		$this->db ->delete($this->table, $id);
	}

	/**
	 * Add row to database
	 * @param  Array $data
	 */
	public function add($data)
	{
		$this->db ->add(
			$this->table, 
			'slug, title, thumb, image, content, description', 
			':slug, :title, :thumb, :image, :content, :description', 
			$data
		);
	}

	/**
	 * Update row in database
	 * @param  Array $data
	 */
	public function update($data)
	{
		$this->db ->update(
			$this->table, 
			'slug = :slug, title = :title, thumb = :thumb, image = :image, content = :content, description = :description', 
			$data
		);
	}

}