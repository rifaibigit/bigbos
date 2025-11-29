<?php

class SkuDescModel {
	
	private $table = 'sku_desc';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllSKU()
	{
		$query = "SELECT b.id, a.item_code, b.item_name, a.item_desc_en, a.item_desc_id, a.img, b.item_group";
		$query = $query . " FROM sku_desc a";
		$query = $query . " inner join sku b on a.item_code = b.item_code";

		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getSKUById($id)
	{
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function getSKUJoinDesc_ById($id)
	{
		$query = "SELECT b.id, a.item_code, b.item_name, a.item_desc_en, a.item_desc_id, a.img, b.item_group";
		$query = $query . " FROM sku_desc a";
		$query = $query . " inner join sku b on a.item_code = b.item_code";
		$query = $query . " where b.id=:id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function getSKUJoinDesc_LORD()
	{
		$query = "SELECT b.id, a.item_code, b.item_name, a.item_desc_en, a.item_desc_id, a.img, b.item_group";
		$query = $query . " FROM sku_desc a";
		$query = $query . " inner join sku b on a.item_code = b.item_code";
		$query = $query . " where b.principal = 'LORD'";

		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getSKUJoinDesc_JORDAN()
	{
		$query = "SELECT b.id, a.item_code, b.item_name, a.item_desc_en, a.item_desc_id, a.img, b.item_group";
		$query = $query . " FROM sku_desc a";
		$query = $query . " inner join sku b on a.item_code = b.item_code";
		$query = $query . " where b.principal = 'JORDAN'";
		$query = $query . " order by b.id";

		$this->db->query($query);
		return $this->db->resultSet();
	}


	public function tambahSKU($data)
	{
        $tmp_name = $_FILES['img']['tmp_name'];
        $target = "dist/img/fmcg/upload/".basename($_FILES['img']['name']);
        move_uploaded_file($tmp_name, $target);

		$query = "INSERT INTO " . $this->table . " (id, item_code, item_desc_en, item_desc_id, img) VALUES(:id, :item_code, :desc_en, :desc_id, :img)";
		$this->db->query($query);
        $this->db->bind('id', $data['id']);
		$this->db->bind('item_code', $data['item_code']);
		$this->db->bind('desc_en', $data['desc_en']);
		$this->db->bind('desc_id', $data['desc_id']);
        $this->db->bind('img', $_FILES['img']['name']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataSKU($data)
	{
        if($_FILES['img']['name']!='')
        {
            $tmp_name = $_FILES['img']['tmp_name'];
            $target = "dist/img/fmcg/upload/".basename($_FILES['img']['name']);
            move_uploaded_file($tmp_name, $target);
            
            $query = "UPDATE " . $this->table . " SET item_code=:item_code, item_desc_en=:desc_en, item_desc_id=:desc_id, img=:img WHERE id=:id";
            $this->db->query($query);
			
            $this->db->bind('id',$data['id']);
            $this->db->bind('item_code', $data['item_code']);
            $this->db->bind('desc_en', $data['desc_en']);
			$this->db->bind('desc_id', $data['desc_id']);
            $this->db->bind('img', $_FILES['img']['name']);
        }
        else
        {
            $query = "UPDATE " . $this->table . " SET item_code=:item_code, item_desc_en=:desc_en, item_desc_id=:desc_id WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id',$data['id']);
            $this->db->bind('item_code', $data['item_code']);
            $this->db->bind('desc_en', $data['desc_en']);
			$this->db->bind('desc_id', $data['desc_id']);
        }
		
		
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteSKU($id)
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