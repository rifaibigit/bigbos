<?php

class SubMenuModel {
	
	private $table = 'user_sub_menu';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllSubMenu()
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY menu_id");
		return $this->db->resultSet();
	}

    public function getSubMenu()
	{
		$this->db->opendb();
        $str_sql = "select b.id, a.menu_id, a.menu, b.sub_menu_id, b.sub_menu, b.url, b.is_active";
        $str_sql = $str_sql . " from user_menu a";
        $str_sql = $str_sql . " inner join user_sub_menu b on a.menu_id = b.menu_id";
        $str_sql = $str_sql . " order by a.menu_id, b.sub_menu_id asc";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

    public function getMaxSubMenuId_byMenuId($menu_id)
    {
		$this->db->opendb();
		$query = "SELECT MAX(sub_menu_id) as sub_menu_id FROM " . $this->table . " WHERE menu_id=:menu_id ORDER BY id asc";
        $this->db->query($query);
		$this->db->bind('menu_id',$menu_id);

		//Flasher::setMessage('Berhasil',$menu_id,'success');
		
		return $this->db->single();
    }

	public function getSubMenuById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getSubMenuByMenuId($menu_id)
	{
		$this->db->opendb();
		$query = "SELECT * FROM " . $this->table . " WHERE menu_id=:menu_id order by menu_id, sub_menu_id";
		$this->db->query($query);
		$this->db->bind('menu_id',$menu_id);

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->resultSet();
	}

	public function tambahSubMenu($data)
	{
		$this->db->opendb();
		$query = "INSERT INTO ". $this->table ." (menu_id, sub_menu_id, sub_menu, url, is_active) VALUES(:menu_id, :sub_menu_id, :sub_menu, :url, 1)";
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('menu_id', $data['menu_id']);
		$this->db->bind('sub_menu_id', $data['sub_menu_id']);
        $this->db->bind('sub_menu', $data['sub_menu']);
		$this->db->bind('url', $data['url']);
		//$this->db->bind('is_active', $data['is_active']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataSubMenu($data)
	{
		$this->db->opendb();
		$query = "UPDATE ". $this->table ." SET menu_id=:menu_id, sub_menu_id=:sub_menu_id, sub_menu=:sub_menu, url=:url, is_active=:is_active WHERE id=:id";
		$this->db->query($query);
        $this->db->bind('id', $data['id']);
		$this->db->bind('menu_id', $data['menu_id']);
		$this->db->bind('sub_menu_id', $data['sub_menu_id']);
        $this->db->bind('sub_menu', $data['sub_menu']);
		$this->db->bind('url', $data['url']);
		$this->db->bind('is_active', $data['is_active']);
		$this->db->execute();

        //Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

	public function deleteSubMenu($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariSubMenu()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE island LIKE :key or region LIKE :key or area LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}