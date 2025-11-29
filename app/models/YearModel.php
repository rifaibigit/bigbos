<?php

class YearModel {
	
	private $table = 'report_year';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getYear()
	{
		$this->db->opendb();
		$this->db->query('SELECT year FROM ' . $this->table);
		return $this->db->single();
	}

	public function updateYear($data)
	{
		$this->db->opendb();
		$query = "UPDATE report_year SET year=:year";
		$this->db->query($query);
		$this->db->bind('year',$data['year']);
		
		
		//Flasher::setMessage('Area',$area,'success');

		$this->db->execute();

		return $this->db->rowCount();
	}

}