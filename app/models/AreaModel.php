<?php

class AreaModel {
	
	private $table = 'area';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllArea()
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY island, id");
		return $this->db->resultSet();
	}

	public function getArea($area)
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " WHERE area in ('" . $area . "') ORDER BY island, id");
		return $this->db->resultSet();
	}

	public function getAreaById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahArea($data)
	{
		$this->db->opendb();
		$query = "INSERT INTO area (island, region, area) VALUES(:island, :region, :area)";
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('island', $data['island']);
		$this->db->bind('region', $data['region']);
		$this->db->bind('area', $data['area']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataArea($data)
	{
		$this->db->opendb();
		$query = "UPDATE area SET island=:island, region=:region, area=:area WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('island', $data['island']);
		$this->db->bind('region', $data['region']);
		$this->db->bind('area', $data['area']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteArea($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariArea()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE island LIKE :key or region LIKE :key or area LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}