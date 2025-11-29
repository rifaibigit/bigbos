<?php

class DcModel {
	
	private $table = 'dc';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllDc()
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY id");
		return $this->db->resultSet();
	}

	public function getDcById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahDc($data)
	{
		$this->db->opendb();
		$query = "INSERT INTO " . $this->table . " (outlet_code, outlet_name, outlet_count) VALUES(:outlet_code, :outlet_name, :outlet_count)";
		$this->db->query($query);
		$this->db->bind('outlet_code', $data['outlet_code']);
        $this->db->bind('outlet_name', $data['outlet_name']);
		$this->db->bind('outlet_count', $data['outlet_count']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataDc($data)
	{
		$this->db->opendb();
		$query = "UPDATE " . $this->table . " SET outlet_code=:outlet_code, outlet_name=:outlet_name, outlet_count=:outlet_count WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('outlet_code', $data['outlet_code']);
        $this->db->bind('outlet_name', $data['outlet_name']);
		$this->db->bind('outlet_count', $data['outlet_count']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDc($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}