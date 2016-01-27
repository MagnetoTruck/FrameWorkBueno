<?php

	class Model{

		protected $db;
		private $stmt;

		function __construct(){
			$this->db=DB::singleton();
		}

		function query($query)
		{
			$stmt=$this->db->prepare('SELECT * FROM users');
		}

		function bind($param,$value,$type=null)
		{
			switch ($value) {
				case is_int($value):
					$type=PDO::PARAM_INT;
					break;
				case is_str($value):
					$type=PDO::PARAM_STR;
					break;
				default:
					$type=PDO::PARAM_STR;
					break;
			}

			$this->stmt->bindValue($param,$value,$type);
		}

		function exectute()
		{
			$this->stmt->exectute();
		}

		function resultSet()
		{
			$results = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
			return $results;
		}

		function single()
		{
			$results = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
			return $results;
		}

		function rowCount()
		{
			$result = $this->stmt->rowCount();
			return $result;
		}

		function lastinsertID()
		{
			$lastId = $this->db->lastInsertId();
			return $lastId;
		}

		function beginTransaction()
		{
			$this->db->beginTransaction();
		}

		function endTransaction()
		{
			$this->db->commit();
		}

		function cancelTransaction()
		{
			$this->db->rollback();
		}

		function debugDumpParams()
		{
			return $this->stmt->debugDumpParams();
		}
	}