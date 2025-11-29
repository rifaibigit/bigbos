<?php

class ChannelModel {
	
	private $table = 'channel';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getDistinct()
	{
		$this->db->opendb();
		$this->db->query("SELECT DISTINCT channel FROM " . $this->table . " ORDER BY id");
		return $this->db->resultSet();
	}

	public function getAllChannel()
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY id");
		return $this->db->resultSet();
	}

	public function getChannelById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getOutletType()
	{
		$this->db->opendb();
		$this->db->query("SELECT DISTINCT outlet_type FROM " . $this->table . " ORDER BY id");
		return $this->db->resultSet();
	}

	public function getOutletTypebyChannel($channel)
	{
		$this->db->opendb();
		$this->db->query("SELECT DISTINCT outlet_type FROM " . $this->table . " where channel = '" . $channel . "' ORDER BY id");
		return $this->db->resultSet();
	}

	public function tambahChannel($data)
	{
		$query = "INSERT INTO " . $this->table . " (channel, outlet_type, desc_type) VALUES(:channel, :outlet_type, :desc_type)";
		$this->db->opendb();
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('channel', $data['channel']);
		$this->db->bind('outlet_type', $data['outlet_type']);
		$this->db->bind('desc_type', $data['desc_type']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataChannel($data)
	{
		$query = "UPDATE area SET channel=:channel, outlet_type=:outlet_type, desc_type=:desc_type WHERE id=:id";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('channel', $data['channel']);
		$this->db->bind('outlet_type', $data['outlet_type']);
		$this->db->bind('desc_type', $data['desc_type']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteChannel($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariChannel()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE channel LIKE :key or outlet_type LIKE :key or desc_type LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}