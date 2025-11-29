<?php

class MenuModel {
	
	private $table = 'user_menu';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMenu()
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY menu_id");
		return $this->db->resultSet();
	}

	public function getMenuById($menu_id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE menu_id=:menu_id');
		$this->db->bind('menu_id',$menu_id);
		return $this->db->single();
	}

	public function tambahMenu($data)
	{
		$query = "INSERT INTO ". $this->table ." (menu, menu_icon, is_active) VALUES(:menu, :menu_icon, 1)";
		$this->db->opendb();
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('menu', $data['menu']);
		$this->db->bind('menu_icon', $data['menu_icon']);
		//$this->db->bind('is_active', $data['is_active']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataMenu($data)
	{
		$query = "UPDATE ". $this->table ." SET menu=:menu, menu_icon=:menu_icon, is_active=:is_active WHERE menu_id=:menu_id";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('menu_id',$data['menu_id']);
		$this->db->bind('menu', $data['menu']);
		$this->db->bind('menu_icon', $data['menu_icon']);
		$this->db->bind('is_active', $data['is_active']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteMenu($menu_id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE menu_id=:menu_id');
		$this->db->bind('menu_id',$menu_id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariMenu()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE island LIKE :key or region LIKE :key or area LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}