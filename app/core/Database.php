<?php

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbnm = DB_NAME;

	private $dbh;
	private $stmt;

	public function __construct()
	{
		// $dsn = 'mysql:host='. $this->host .';charset=utf8;dbname='. $this->dbnm;

		// $option = [
		// 	PDO::ATTR_PERSISTENT => true,
		// 	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		// 	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
		// ];

		// try{
		// 	$this->dbh = new PDO($dsn,$this->user,$this->pass, $option);
		// }catch(PDOException $e){
		// 	die($e->getMessage());
		// }

		//$this->dbh = null;
	}

	public function opendb()
	{
		$dsn = 'mysql:host='. $this->host .';charset=utf8;dbname='. $this->dbnm;

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
		];

		if($this->dbh == null)
		{
			try{
				$this->dbh = new PDO($dsn,$this->user,$this->pass, $option);
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}

	public function closedb()
	{
		$this->stmt = null;
		$this->dbh = null;
	}

	public function begintrans()
	{
		$this->dbh->beginTransaction();
	}

	public function committrans()
	{
		$this->dbh->commit();
	}

	public function rollbacktrans()
	{
		$this->dbh->rollBack();
		$this->closedb();
	}


	public function query($query)
	{
		//$this->opendb();
		$this->stmt = $this->dbh->prepare($query);
		//$this->closedb();
	}

	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute()
	{
		$this->stmt->execute();
	}

	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		$this->closedb();
	}

	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
		$this->closedb();
	}

	public function rowCount()
	{
		return $this->stmt->rowCount();
		$this->closedb();
	}
}

