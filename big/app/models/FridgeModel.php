<?php

class FridgeModel {
	
	private $table = 'fridge';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllFridge()
	{
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY item_group, id");
		return $this->db->resultSet();
	}

	public function getFridgeById($id)
	{
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahFridge($data)
	{
        $tmp_name = $_FILES['img']['tmp_name'];
        $target = "dist/img/freezer n chiller/upload/".basename($_FILES['img']['name']);
        move_uploaded_file($tmp_name, $target);

		$query = "INSERT INTO " . $this->table . " (item_code, item_name, item_desc_en, item_desc_id, img, item_group) VALUES(:item_code, :item_name, :desc_en, :desc_id, :img, :item_group)";
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('item_code', $data['item_code']);
		$this->db->bind('item_name', $data['item_name']);
		$this->db->bind('desc_en', $data['desc_en']);
		$this->db->bind('desc_id', $data['desc_id']);
        $this->db->bind('img', $_FILES['img']['name']);
        $this->db->bind('item_group', $data['item_group']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataFridge($data)
	{
        if($data['img']!='')
        {
            $tmp_name = $_FILES['img']['tmp_name'];
            $target = "dist/img/freezer n chiller/upload/".basename($_FILES['img']['name']);
            move_uploaded_file($tmp_name, $target);
            
            $query = "UPDATE " . $this->table . " SET item_code=:item_code, item_name=:item_name, item_desc_en=:desc_en, item_desc_id=:desc_id, img=:img, item_group=:item_group WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id',$data['id']);
            $this->db->bind('item_code', $data['item_code']);
			$this->db->bind('item_name', $data['item_name']);
            $this->db->bind('desc_en', $data['desc_en']);
			$this->db->bind('desc_id', $data['desc_id']);
            $this->db->bind('img', $data['img']);
            $this->db->bind('item_group', $data['item_group']);
        }
        else
        {
            $query = "UPDATE " . $this->table . " SET item_code=:item_code, item_name=:item_name, item_desc_en=:desc_en, item_desc_id=:desc_id, item_group=:item_group WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id',$data['id']);
            $this->db->bind('item_code', $data['item_code']);
			$this->db->bind('item_name', $data['item_name']);
            $this->db->bind('desc_en', $data['desc_en']);
			$this->db->bind('desc_id', $data['desc_id']);
            $this->db->bind('item_group', $data['item_group']);
        }
		
		
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteFridge($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariSku()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE area LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}