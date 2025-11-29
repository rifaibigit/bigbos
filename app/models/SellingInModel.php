<?php

class SellingInModel {
	
	private $table = 'selling_in';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllSellingin()
	{
		if(isset($_POST['by_month']))
		{
			$month = $_POST['by_month'];
		}else
		{
			$month = date('m');
		}

		if(isset($_POST['by_year']))
		{
			$year = $_POST['by_year'];
		}else
		{
			$year = date('Y');
		}

		$query = "SELECT a.id, a.tanggal, a.invoice, a.principal, a.cust_code, a.cust_name, a.item_code, a.item_name,";
		$query = $query . " a.qty, a.sale_price, a.total_diskon, a.value_exc, a.value_inc, a.create_by, a.create_date";
		$query = $query . " FROM selling_in a";
		$query = $query . " left join distributor b on a.cust_code = b.cust_code";

		if($month == 'all' or $month == 'All')
		{
			$query = $query . " where year(a.tanggal) = '" . $year . "'";
		}
		else
		{
			$query = $query . " where year(a.tanggal) = '" . $year . "' and month(a.tanggal) = '" . (int)$month . "'";
		}

		if ($_SESSION['area'] != 'ALL')
		{
			$session_area = str_replace(",", "','", $_SESSION['area']);
			$session_area = str_replace(" ", "", $session_area);

			$query = $query . " and b.area in ('" . $session_area . "')";
		}

		$query = $query . " ORDER BY a.ID DESC LIMIT 15000";

		//Flasher::setMessage('Berhasil',$query,'success');

		$this->db->opendb();
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getSellinginById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahSellingin($data)
	{
		$query = "INSERT INTO selling_in (tanggal, invoice, principal, cust_code, cust_name, item_code, item_name, qty, sale_price, total_diskon, value_exc, value_inc, create_by, create_date) VALUES(:tanggal, :invoice, :principal, :cust_code, :cust_name, :item_code, :item_name, :qty, :sale_price, :total_diskon, :value_exc, :value_inc, :create_by, now())";
		//$query = "INSERT INTO selling_in (tanggal, invoice, principal, cust_code, cust_name, item_code, item_name, qty, sale_price, value_price) VALUES(:tanggal, :invoice, :principal, :cust_code, :cust_name, :item_code, :item_name, :qty, :sale_price, :value_price)";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('tanggal', $data['tanggal']);
		$this->db->bind('invoice', $data['invoice']);
        $this->db->bind('principal', $data['principal']);
        $this->db->bind('cust_code', $data['cust_code']);
        $this->db->bind('cust_name', $data['cust_name']);
        $this->db->bind('item_code', $data['item_code']);
        $this->db->bind('item_name', $data['item_name']);
        $this->db->bind('qty', $data['qty']);
		$this->db->bind('sale_price', $data['sale_price']);
		$this->db->bind('total_diskon', $data['total_diskon']);
        $this->db->bind('value_exc', $data['value_exc']);
		$this->db->bind('value_inc', $data['value_inc']);
		$this->db->bind('create_by', $data['create_by']);
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

	public function updateDataSellingin($data)
	{
		$query = "UPDATE area SET island=:island, area=:area WHERE id=:id";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('island', $data['island']);
		$this->db->bind('area', $data['area']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteSellingin($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariSellingin()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE cust_name LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	public function uploadSellingIn($data)
	{
		$error = "";
		// $update_count = 0;
		$save_count = 0;

		try
		{
			$this->db->opendb();
			$this->db->begintrans();

			$baris = 1;

			foreach($data as $row){

				if ($row['tanggal'] == "#N/A" or $row['tanggal'] == "") 
				{
					$error = "Error pada data TANGGAL : '".$row['tanggal']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				$selisih_bulan = (int)date("m") - (int)substr($row['tanggal'],5,2);

				// if ( $selisih_bulan > 2) 
				// {
				// 	$error = "Tanggal SALES lebih dari 2 bulan yang lalu. Pada baris ke '".$baris."'";
				// 	throw new Exception($error);

				// 	goto rollback;
				// }

				if ($row['invoice'] == "#N/A" or $row['invoice'] == "") 
				{
					$error = "Error pada data NO INVOICE : '".$row['invoice']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['principal'] == "#N/A" or $row['principal'] == "") 
				{
					$error = "Error pada data PRINCIPAL : '".$row['principal']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['cust_code'] == "#N/A" or $row['cust_code'] == "") 
				{
					$error = "Error pada data CUST CODE : '".$row['cust_code']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['cust_name'] == "#N/A" or $row['cust_name'] == "") 
				{
					$error = "Error pada data CUST NAME : '".$row['cust_name']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['item_code'] == "#N/A" or $row['item_code'] == "") 
				{
					$error = "Error pada data ITEM CODE : '".$row['item_code']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['item_name'] == "#N/A" or $row['item_name'] == "") 
				{
					$error = "Error pada data ITEM NAME : '".$row['item_name']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['qty'] == "#N/A" or $row['qty'] == "") 
				{
					$error = "Error pada data QTY : '".$row['qty']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['sale_price'] == "#N/A" or $row['sale_price'] == "") 
				{
					$error = "Error pada data SALE PRICE : '".$row['sale_price']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				// if ($data1['total_diskon'] == "#N/A" or $data1['total_diskon'] == "") 
				// {
				// 	$error = "Error pada data TOTAL DISKON : '".$row['total_diskon']."' di baris : '".$baris."'";
				// 	throw new Exception($error);

				// 	goto rollback;
				// }

				if ($row['value_exc'] == "#N/A" or $row['value_exc'] == "") 
				{
					$error = "Error pada data VALUE EXC : '".$row['value_exc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['value_inc'] == "#N/A" or $row['value_inc'] == "") 
				{
					$error = "Error pada data VALUE INC : '".$row['value_inc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				$query = "INSERT INTO selling_in (tanggal, invoice, principal, cust_code, cust_name, item_code, item_name, qty, sale_price, total_diskon, value_exc, value_inc, create_by, create_date) VALUES ('".$row['tanggal']."', '".$row['invoice']."', '".$row['principal']."', '".$row['cust_code']."', '".$row['cust_name']."', '".$row['item_code']."', '".$row['item_name']."', '".$row['qty']."', '".$row['sale_price']."', '".$row['total_diskon']."', '".$row['value_exc']."', '".$row['value_inc']."', '".$row['create_by']."', now());";
				$this->db->query($query);
				$this->db->execute();
				$save_count++;
				
				$baris++;

				//asset
				
			}

			//Flasher::setMessage('Berhasil',$query,'success');

			$this->db->committrans();
			
			$error = "";

			echo $save_count." data tersimpan.";
		}
		catch(Exception $e)
		{
			rollback:
			echo $e->getMessage();
			$this->db->rollbacktrans();
		}

		//$this->db->closedb();

		return $this->db->rowCount();
	}
}