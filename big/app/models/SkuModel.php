<?php

class SkuModel {
	
	private $table = 'sku';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllSku()
	{
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY item_group, id");
		return $this->db->resultSet();
	}

	public function getItemNameSKULord()
	{
		$str_sql = "SELECT a.item_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'LORD'";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemCodeSKULord()
	{
		$str_sql = "SELECT a.item_code";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'LORD'";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemCodeBy_SO_Contribution()
	{

		$str_sql = "select distinct item_code from temp_so_contribution where not isnull(item_code) order by item_id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemNameBy_SO_Contribution()
	{

		$str_sql = "select distinct a.id, a.item_group, a.item_code, a.item_name from sku a";
		$str_sql = $str_sql . " inner join temp_so_contribution b on a.item_code = b.item_code";
		$str_sql = $str_sql . " order by a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemPrincipal()
	{

		$str_sql = "SELECT distinct(principal) from sku order by id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemGroup()
	{

		$str_sql = "SELECT distinct(item_group) from sku order by id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemGroup_LORD()
	{

		$str_sql = "SELECT distinct(item_group) from sku where principal='LORD' order by id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemGroup_JORDAN()
	{

		$str_sql = "SELECT distinct(item_group) from sku where principal='JORDAN' order by id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemGroupBy_SO_Contribution()
	{

		$str_sql = "select distinct a.item_group, count(distinct a.item_name) as count_name from sku a";
		$str_sql = $str_sql . " inner join temp_so_contribution b on a.item_code = b.item_code";
		$str_sql = $str_sql . " group by a.item_group";
		$str_sql = $str_sql . " order by a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemRowBy_SO_Contribution()
	{

		$str_sql = "select distinct count(distinct a.item_name) as item_row from sku a";
		$str_sql = $str_sql . " inner join temp_so_contribution b on a.item_code = b.item_code";
		$str_sql = $str_sql . " order by a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getGroupSKULord()
	{
		$str_sql = "SELECT a.item_group, count(distinct a.item_name) as count_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'LORD'";
		$str_sql = $str_sql . " GROUP BY a.item_group";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getCountSKULord()
	{
		$this->db->query("SELECT count(item_name) as item_row FROM " . $this->table . " where principal = 'LORD' ORDER BY id");
		return $this->db->resultSet();
	}

	public function getItemNameSKUJordan()
	{
		$str_sql = "SELECT a.item_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'JORDAN'";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemCodeSKUJordan()
	{
		$str_sql = "SELECT a.item_code";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'JORDAN'";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getGroupSKUJordan()
	{
		$str_sql = "SELECT a.item_group, count(distinct a.item_name) as count_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'JORDAN'";
		$str_sql = $str_sql . " GROUP BY a.item_group";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getCountSKUJordan()
	{
		$this->db->query("SELECT count(item_name) as item_row FROM " . $this->table . " where principal = 'JORDAN' ORDER BY id");
		return $this->db->resultSet();
	}

	public function getSkuById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function getSkuIdByCode($code)
	{
		$this->db->query('SELECT id FROM ' . $this->table . ' WHERE item_code=:code');
		$this->db->bind('code', $code);
		return $this->db->single();
	}

	public function tambahSku($data)
	{
		$query = "INSERT INTO sku (item_code, item_name, unit, item_group, principal) VALUES(:item_code, :item_name, :unit, :item_group, :principal)";
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('item_code', $data['item_code']);
		$this->db->bind('item_name', $data['item_name']);
		$this->db->bind('unit', $data['unit']);
        $this->db->bind('item_group', $data['item_group']);
		$this->db->bind('principal', $data['principal']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataSku($data)
	{
		$query = "UPDATE sku SET item_code=:item_code, item_name=:item_name, unit=:unit, item_group=:item_group, principal=:principal WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('item_code', $data['item_code']);
		$this->db->bind('item_name', $data['item_name']);
		$this->db->bind('unit', $data['unit']);
        $this->db->bind('item_group', $data['item_group']);
		$this->db->bind('principal', $data['principal']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteSku($id)
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