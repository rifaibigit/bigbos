<?php

class SkuGroupModel {
	
	private $table = 'sku_group';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllSkuGroup()
	{
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY id");
		return $this->db->resultSet();
	}

	public function getItemGroup()
	{

		$str_sql = "SELECT item_group from " . $this->table . " order by id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemGroup_LORD()
	{

		$str_sql = "SELECT * from " . $this->table . " where principal='LORD' order by id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemGroup_JORDAN()
	{

		$str_sql = "SELECT * from " . $this->table . " where principal='JORDAN' order by id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

    public function getItemGroupById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function getPrincipal()
	{

		$str_sql = "SELECT distinct(principal) from " . $this->table . " order by id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function tambahSkuGroup($data)
	{
		$query = "INSERT INTO " . $this->table . " (item_group, principal) VALUES(:item_group, :principal)";
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
        $this->db->bind('item_group', $data['item_group']);
		$this->db->bind('principal', $data['principal']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataSkuGroup($data)
	{
		$query = "UPDATE " . $this->table . " SET item_group=:item_group, principal=:principal WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
        $this->db->bind('item_group', $data['item_group']);
		$this->db->bind('principal', $data['principal']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteSkuGroup($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

}