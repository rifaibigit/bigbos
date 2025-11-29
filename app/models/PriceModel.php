<?php

class PriceModel {
	
	private $table = 'pricelist';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPrice()
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

		if($month == 'all' or $month == 'All')
		{
			$query = "SELECT b.principal, a.item_code, b.item_name, b.unit, a.price_exc, a.price_inc, a.mt_exc, a.mt_inc, a.dist_exc, a.dist_inc, valid_from FROM " . $this->table . " a inner join sku b on a.item_code = b.item_code WHERE year(a.valid_from) = '" . $year . "' ORDER BY a.valid_from, b.id";
		}
		else
		{
			$query = "SELECT b.principal, a.item_code, b.item_name, b.unit, a.price_exc, a.price_inc, a.mt_exc, a.mt_inc, a.dist_exc, a.dist_inc, valid_from FROM " . $this->table . " a inner join sku b on a.item_code = b.item_code WHERE year(a.valid_from) = '" . $year . "' and month(a.valid_from) = '" . (int)$month . "' ORDER BY a.valid_from, b.id";
		}

		$this->db->opendb();
		$this->db->query($query);

        //Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->resultSet();
	}

	public function getPriceByItem($data)
	{
		$query = "SELECT price_exc, valid_from as last_date";
		$query = $query . " FROM " . $this->table;
		$query = $query . " WHERE item_code =:item_code";
		$query = $query . " AND valid_from = (select max(valid_from) from " . $this->table . " where item_code =:item_code and valid_from <=:tanggal)";
		$query = $query . " ORDER by valid_from desc limit 1";

		$this->db->opendb();
		$this->db->query($query);
        $this->db->bind('item_code', $data['item_code']);
		$this->db->bind('tanggal', $data['tanggal']);

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->resultSet();
	}

	public function getMTPriceByItem($data)
	{
		$query = "SELECT mt_exc, valid_from as last_date";
		$query = $query . " FROM " . $this->table;
		$query = $query . " WHERE item_code =:item_code";
		$query = $query . " AND valid_from = (select max(valid_from) from " . $this->table . " where item_code =:item_code and valid_from <=:tanggal)";
		$query = $query . " ORDER by valid_from desc limit 1";

		$this->db->opendb();
		$this->db->query($query);
        $this->db->bind('item_code', $data['item_code']);
		$this->db->bind('tanggal', $data['tanggal']);

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->resultSet();
	}

	public function getDistPriceByItem($data)
	{
		$query = "SELECT dist_exc, valid_from as last_date";
		$query = $query . " FROM " . $this->table;
		$query = $query . " WHERE item_code =:item_code";
		$query = $query . " AND valid_from = (select max(valid_from) from " . $this->table . " where item_code =:item_code and valid_from <=:tanggal)";
		$query = $query . " ORDER by valid_from desc limit 1";

		$this->db->opendb();
		$this->db->query($query);
        $this->db->bind('item_code', $data['item_code']);
		$this->db->bind('tanggal', $data['tanggal']);

		return $this->db->resultSet();
	}

	public function tambahPrice($data)
	{
		$this->db->opendb();
		$query = "INSERT INTO " . $this->table . " (item_code, price_exc, price_inc, mt_exc, mt_inc, dist_exc, dist_inc, valid_from, create_by, create_date) VALUES(:item_code, :price_exc, :price_inc, :mt_exc, :mt_inc, :dist_exc, :dist_inc, :valid_from, :create_by, now())";
		$this->db->query($query);
		$this->db->bind('item_code', $data['item_code']);
        $this->db->bind('price_exc', $data['price_exc']);
        $this->db->bind('price_inc', $data['price_inc']);
		$this->db->bind('mt_exc', $data['mt_exc']);
        $this->db->bind('mt_inc', $data['mt_inc']);
		$this->db->bind('dist_exc', $data['dist_exc']);
        $this->db->bind('dist_inc', $data['dist_inc']);
        $this->db->bind('valid_from', $data['valid_from']);
		$this->db->bind('create_by', $data['create_by']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updatePrice($data)
	{
		$query = "UPDATE " . $this->table . " SET price_exc=:price_exc, price_inc=:price_inc, mt_exc=:mt_exc, mt_inc=:mt_inc, dist_exc=:dist_exc, dist_inc=:dist_inc, edit_by=:edit_by, edit_date=now() WHERE item_code=:item_code and valid_from=:valid_from";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('item_code', $data['item_code']);
        $this->db->bind('price_exc', $data['price_exc']);
        $this->db->bind('price_inc', $data['price_inc']);
		$this->db->bind('mt_exc', $data['mt_exc']);
        $this->db->bind('mt_inc', $data['mt_inc']);
		$this->db->bind('dist_exc', $data['dist_exc']);
        $this->db->bind('dist_inc', $data['dist_inc']);
		$this->db->bind('edit_by', $data['edit_by']);
        $this->db->bind('valid_from', $data['valid_from']);
		
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

    public function getDuplicatePrice($data)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE item_code=:item_code and valid_from=:valid_from";
		$this->db->opendb();
		$this->db->query($query);
        $this->db->bind('item_code', $data['item_code']);
		$this->db->bind('valid_from', $data['valid_from']);

		return $this->db->single();
	}

	public function uploadPrice($data)
	{
		$error = "";
		$update_count = 0;
		$save_count = 0;
		$item_code='';

		try
		{
			$this->db->opendb();
			$this->db->begintrans();

			$baris = 1;

			foreach($data as $row){

				if($row['principal'] == "#N/A" or $row['principal'] == "")
                {
					
                    $error = "Error pada data PRINCIPAL : '".$row['principal']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['item_code'] == "#N/A" or $row['item_code'] == "")
                {
					
                    $error = "Error pada data KODE ITEM : '".$row['item_code']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['price_exc'] == "#N/A" or $row['price_exc'] == "")
                {
					
                    $error = "Error pada data SALE PRICE EXC : '".$row['price_exc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['price_inc'] == "#N/A" or $row['price_inc'] == "")
                {
					
                    $error = "Error pada data SALE PRICE INC : '".$row['price_inc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['mt_exc'] == "#N/A" or $row['mt_exc'] == "")
                {
					
                    $error = "Error pada data MT PRICE EXC : '".$row['mt_exc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['mt_inc'] == "#N/A" or $row['mt_inc'] == "")
                {
					
                    $error = "Error pada data MT PRICE INC : '".$row['mt_inc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['dist_exc'] == "#N/A" or $row['dist_exc'] == "")
                {
					
                    $error = "Error pada data DIST PRICE EXC : '".$row['dist_exc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['dist_inc'] == "#N/A" or $row['dist_inc'] == "")
                {
					
                    $error = "Error pada data DIST PRICE INC : '".$row['dist_inc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				$exist['price'] = $this->getDuplicatePrice($row);
				
				if($exist['price']['item_code'] == $row['item_code'] and $exist['price']['valid_from'] == $row['valid_from'])
				{
					// throw new Exception("Kode Outlet : '".$row['outlet_code']."' sudah terdaftar!");
					// goto rollback;

					$query = "UPDATE " . $this->table . " SET price_exc = '".$row['price_exc']."', price_inc = '".$row['price_inc']."', mt_exc = '".$row['mt_exc']."', mt_inc = '".$row['mt_inc']."', dist_exc = '".$row['dist_exc']."', dist_inc = '".$row['dist_inc']."', edit_by = '".$row['edit_by']."', edit_date = now() WHERE item_code = '".$row['item_code']."' and valid_from = '".$row['valid_from']."';";
					$this->db->query($query);
					$this->db->execute();
					$update_count++;
				}
				else
				{
					// throw new Exception(print_r($exist['target_so']));
					// goto rollback;

					$query = "INSERT INTO " . $this->table . " (item_code, price_exc, price_inc, mt_exc, mt_inc, dist_exc, dist_inc, valid_from, create_by, create_date) VALUES ('".$row['item_code']."', '".$row['price_exc']."', '".$row['price_inc']."', '".$row['mt_exc']."', '".$row['mt_inc']."', '".$row['dist_exc']."', '".$row['dist_inc']."', '".$row['valid_from']."', '".$row['create_by']."', now());";
					$this->db->query($query);
					$this->db->execute();
					$save_count++;
				}

				//$outlet_code = $row['outlet_code'];
				$baris++;

				//asset
				
			}

			//Flasher::setMessage('Berhasil',$query,'success');

			$this->db->committrans();
			
			$error = "";

			echo $update_count. " baris data lama, " .$save_count." baris data baru.";
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