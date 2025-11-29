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
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " WHERE (is_delete = 0 or isnull(is_delete)) ORDER BY id");
		return $this->db->resultSet();
	}

	public function getItemNameSKULord()
	{
		$this->db->opendb();
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
		$this->db->opendb();
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
		$this->db->opendb();
		$str_sql = "select distinct item_code from temp_so_contribution where not isnull(item_code) order by item_id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemNameBy_SO_Contribution()
	{
		$this->db->opendb();
		$str_sql = "select distinct a.id, a.item_group, a.item_code, a.item_name from sku a";
		$str_sql = $str_sql . " inner join temp_so_contribution b on a.item_code = b.item_code";
		$str_sql = $str_sql . " order by a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemGroupBy_SO_Contribution()
	{
		$this->db->opendb();
		$str_sql = "select distinct a.item_group, count(distinct a.item_name) as count_name from sku a";
		$str_sql = $str_sql . " inner join temp_so_contribution b on a.item_code = b.item_code";
		$str_sql = $str_sql . " group by a.item_group";
		$str_sql = $str_sql . " order by a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemRowBy_SO_Contribution()
	{
		$this->db->opendb();
		$str_sql = "select distinct count(distinct a.item_name) as item_row from sku a";
		$str_sql = $str_sql . " inner join temp_so_contribution b on a.item_code = b.item_code";
		$str_sql = $str_sql . " order by a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getGroupSKULord()
	{
		$this->db->opendb();
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
		$this->db->opendb();
		$this->db->query("SELECT count(item_name) as item_row FROM " . $this->table . " where principal = 'LORD' ORDER BY id");
		return $this->db->resultSet();
	}

	public function getItemNameSKU($principal)
	{
		$this->db->opendb();
		$str_sql = "SELECT DISTINCT a.item_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = '".$principal."'";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemCodeSKU()
	{
		if(isset($_POST['by_principal']))
		{
			$principal = $_POST['by_principal'];
		}else
		{
			$principal = "JORDAN";
		}

		$this->db->opendb();
		$str_sql = "SELECT DISTINCT a.item_code, a.item_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = '".$principal."'";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		// Flasher::setMessage('Berhasil',$str_sql,'success');

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemCodeGrowthExist()
	{
		if(isset($_POST['by_principal']))
		{
			$principal = $_POST['by_principal'];
		}else
		{
			$principal = "JORDAN";
		}
		if (isset($_POST['by_outlet_category']))
		{
			$outlet_category = $_POST['by_outlet_category'];
		}
		if (isset($_POST['by_year']))
		{
			$year = $_POST['by_year'];
		}else
		{
			$year = date('Y');
		}

		$year_to = $year;
		$year_from = $year_to - 1;

		$this->db->opendb();
		$str_sql = "SELECT so.item_code, s.item_name";
		$str_sql = $str_sql . " FROM selling_out so";
		$str_sql = $str_sql . " INNER JOIN sku s on so.item_code = s.item_code";
		$str_sql = $str_sql . " LEFT JOIN sku_group sg on s.item_group = sg.item_group";
		$str_sql = $str_sql . " INNER JOIN channel c on so.outlet_type = c.outlet_type ";
		$str_sql = $str_sql . " WHERE a.principal = '".$principal."' AND c.outlet_category IN ('".$outlet_category."')";
		$str_sql = $str_sql . " AND YEAR(so.tanggal) IN ('".$year_from."', '".$year_to."')";
		$str_sql = $str_sql . " AND MONTH(so.tanggal) IN (select distinct month(tanggal) as bulan from selling_out where year(tanggal) = '".$year_to."')";
		$str_sql = $str_sql . " AND so.value_exc <> 0 AND c.channel <> 'DISTRIBUTOR'";
		$str_sql = $str_sql . " GROUP BY so.item_code";
		$str_sql = $str_sql . " ORDER BY sg.group_id, s.id";

		// Flasher::setMessage('Berhasil',$str_sql,'success');

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getGroupSKU($principal)
	{
		$this->db->opendb();
		$str_sql = "SELECT a.item_group, count(distinct a.item_name) as count_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = '".$principal."'";
		$str_sql = $str_sql . " GROUP BY a.item_group";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getGroupSKU2()
	{
		$this->db->opendb();
		$str_sql = "SELECT * FROM sku_group";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getCountSKU($principal)
	{
		$this->db->opendb();
		$this->db->query("SELECT count(item_name) as item_row FROM " . $this->table . " where principal = '".$principal."' ORDER BY id");
		return $this->db->resultSet();
	}

	public function getItemNameSKUJordan()
	{
		$this->db->opendb();
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
		$this->db->opendb();
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
		$this->db->opendb();
		$str_sql = "SELECT a.item_group, count(a.item_name) as count_name";
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
		$this->db->opendb();
		$this->db->query("SELECT count(item_name) as item_row FROM " . $this->table . " where principal = 'JORDAN' ORDER BY id");
		return $this->db->single();
	}

	public function getItemNameSKURiemann()
	{
		$this->db->opendb();
		$str_sql = "SELECT DISTINCT a.item_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'RIEMANN'";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getItemCodeSKURiemann()
	{
		$this->db->opendb();
		$str_sql = "SELECT DISTINCT a.item_code";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'RIEMANN'";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getGroupSKURiemann()
	{
		$this->db->opendb();
		$str_sql = "SELECT a.item_group, count(distinct a.item_name) as count_name";
		$str_sql = $str_sql . " FROM sku a";
		$str_sql = $str_sql . " LEFT JOIN sku_group b on a.item_group = b.item_group";
		$str_sql = $str_sql . " WHERE a.principal = 'RIEMANN'";
		$str_sql = $str_sql . " GROUP BY a.item_group";
		$str_sql = $str_sql . " ORDER BY b.group_id, a.id";

		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getCountSKURiemann()
	{
		$this->db->opendb();
		$this->db->query("SELECT count(item_name) as item_row FROM " . $this->table . " where principal = 'RIEMANN' ORDER BY id");
		return $this->db->resultSet();
	}

	public function getSkuById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function getSkuByCode($code)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE item_code=:code');
		$this->db->bind('code', $code);
		return $this->db->single();
	}

	public function tambahSku($data)
	{
		$this->db->opendb();
		$query = "INSERT INTO sku (item_code, item_name, unit, item_group, principal, create_by, create_date) VALUES(:item_code, :item_name, :unit, :item_group, :principal, :create_by, now())";
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('item_code', $data['item_code']);
		$this->db->bind('item_name', $data['item_name']);
		$this->db->bind('unit', $data['unit']);
        $this->db->bind('item_group', $data['item_group']);
		$this->db->bind('principal', $data['principal']);
		$this->db->bind('create_by', $data['create_by']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataSku($data)
	{
		$this->db->opendb();
		$query = "UPDATE sku SET item_code=:item_code, item_name=:item_name, unit=:unit, item_group=:item_group, principal=:principal, edit_by=:edit_by, edit_date = now() WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('item_code', $data['item_code']);
		$this->db->bind('item_name', $data['item_name']);
		$this->db->bind('unit', $data['unit']);
        $this->db->bind('item_group', $data['item_group']);
		$this->db->bind('principal', $data['principal']);
		$this->db->bind('edit_by', $data['edit_by']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteSku($id)
	{
		$this->db->opendb();
		$query = "UPDATE sku SET is_delete=1, delete_by=:delete_by, delete_date = now() WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$id);
		$this->db->bind('delete_by', $_SESSION['username']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariSku()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE area LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}