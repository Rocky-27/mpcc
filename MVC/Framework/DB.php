<?php

namespace MVC\Framework;

class DB
{
	public $conn;

	function __construct()
	{
		$this->db_name = 'mpcc';
		$this->db_password = 'root';
		$this->db_server = 'localhost';
		$this->db_username = 'root';
		$this->conn = $this->connect();
	}

	function __destruct()
	{
		$this->conn->close();
	}

	/**
	 * Establish a connection to the database
	 * @return type
	 */
	public function connect()
	{
		return new \mysqli($this->db_server, $this->db_username, $this->db_password, $this->db_name);
	}

	/**
	 * Determines if a row should be updated or created before calling the correct method
	 * @param string $table 
	 * @param array $data 
	 * @param array $updateOn 
	 * @return type
	 */
	public function updateOrCreate(string $table, array $data, array $updateOn)
	{
		foreach($data AS $store)
		{
			if($this->check($table, $store, $updateOn)){
				$this->update($table, $store, $updateOn);
			} else{
				$this->create($table, $store);
			}
		}

		return true;
	}

	/**
	 * Creates a new record
	 * @param string $table 
	 * @param array $data 
	 * @return type
	 */
	public function create(string $table, array $data)
	{
		$data = $this->sanitize($data);

		$query = 'INSERT INTO `'.$table.'` (';
		foreach($data AS $key => $value){
			$query.= '`'.$key.'`, ';
		}

		$query = substr($query, 0, -2);
		$query.= ') VALUES (';

		foreach($data AS $key => $value){
			$query.= '\''.$value.'\', ';
		}

		$query = substr($query, 0, -2);
		$query.= ')';

		return $this->execute($query);
	}

	/**
	 * Updates a record based on matched fields
	 * @param string $table 
	 * @param array $data 
	 * @param array $updateOn 
	 * @return type
	 */
	public function update(string $table, array $data, array $updateOn)
	{
		$data = $this->sanitize($data);

		$query = 'UPDATE `'.$table.'` SET ';
		foreach($data AS $key => $value){
			$query.= '`'.$key.'` = "'.$value.'", ';
		}

		$query = substr($query, 0, -2);
		$query.= ' WHERE ';

		$columnCount = count($updateOn);
		$i = 1;

		foreach($updateOn AS $column){
			$query.= '`'.$column.'` = "'.$data[$column].'" ';
			
			if($i < $columnCount){
				$query.= 'AND ';
			}

			$i++;
		}

		return $this->execute($query);
	}

	/**
	 * Checks if a given value already appears in a a given column in the database table provided
	 * @param string $table 
	 * @param array $data 
	 * @param array $columns 
	 * @return type
	 */
	public function check(string $table, array $data, array $columns)
	{
		$data = $this->sanitize($data);

		$columnCount = count($columns);
		$i = 1;

		$query = 'SELECT `id` FROM `'.$table.'` WHERE ';

		foreach($columns AS $column){
			$query.= '`'.$column.'` = "'.$data[$column].'" ';
			
			if($i < $columnCount){
				$query.= 'AND ';
			}

			$i++;
		}

		$result = $this->execute($query);

		if ($result->num_rows > 0) {
		    return true;
		}

		return false;
	}

	/**
	 * Runs and returns a raw MySQL query 
	 * @param string $query 
	 * @return type
	 */
	public function query(string $query)
	{
		$return = [];
		$i = 0;

		$result = $this->execute($query);
		if($result->num_rows > 0){
			while($columns = $result->fetch_assoc()){
				$return[$i] = new \stdClass;
				foreach($columns AS $key => $value){
					$return[$i]->$key = $value;
				}
				$i++;
			}
		}

		return $return;
	}

	/**
	 * Executes the sql query
	 * @param type $query 
	 * @return type
	 */
	public function execute($query)
	{
		return $this->conn->query($query);
	}

	/**
	 * In the interests of time I have simply escaped the string, given more time I would've used prepared statements
	 * @param array $data 
	 * @return type
	 */
	public function sanitize(array $data)
	{
		foreach($data AS $key => $value)
		{
			$data[$key] = mysqli_real_escape_string($this->conn, $value);
		}

		return $data;
	}
}