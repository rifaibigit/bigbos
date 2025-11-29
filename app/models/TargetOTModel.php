<?php

class TargetOTModel {
	
	private $table = 'outlet_target';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllTarget()
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
			$query = <<<SQL
				SELECT a.id, a.tahun, a.bulan, a.big_code, b.outlet_name, b.outlet_type, b.total_outlet, b.area, a.qty, a.value 
				FROM outlet_target a
				LEFT JOIN outlet b on a.big_code = b.big_code 
				WHERE a.tahun = '$year' 
				ORDER BY a.tahun, a.bulan, a.id
			SQL;
			// $query = "SELECT a.id, a.tahun, a.bulan, a.big_code, a.qty, a.value FROM " . $this->table . " a WHERE a.tahun = '" . $year . "' ORDER BY a.tahun, a.bulan, a.id";
		}
		else
		{
			$query = <<<SQL
				SELECT a.id, a.tahun, a.bulan, a.big_code, b.outlet_name, b.outlet_type, b.total_outlet, b.area, a.qty, a.value 
				FROM outlet_target a
				LEFT JOIN outlet b on a.big_code = b.big_code 
				WHERE a.tahun = '$year'
				and CONVERT(a.bulan, SIGNED INTEGER) = '$month'
				ORDER BY a.tahun, a.bulan, a.id
			SQL;
			// $query = "SELECT a.id, a.tahun, a.bulan, a.big_code, a.qty, a.value FROM " . $this->table . " a WHERE a.tahun = '" . $year . "' and CONVERT(a.bulan, SIGNED INTEGER) = '" . (int)$month . "' ORDER BY a.tahun, a.bulan, a.id";
		}

        
		$this->db->opendb();
		$this->db->query($query);

        //Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->resultSet();
	}

	public function getTargetById($id)
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id and tahun = year(now()) and bulan = month(now())");
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahTarget($data)
	{
		$this->db->opendb();
		$query = "INSERT INTO " . $this->table . " (tahun, bulan, big_code, qty, value, create_by, create_date) VALUES(:tahun, :bulan, :big_code, :qty, :value, :create_by, now())";
		$this->db->query($query);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('bulan', $data['bulan']);
        $this->db->bind('big_code', $data['big_code']);
		$this->db->bind('qty', $data['qty']);
        $this->db->bind('value', $data['value']);
		$this->db->bind('create_by', $data['create_by']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateTarget($data)
	{
		$query = "UPDATE " . $this->table . " SET qty=:qty, value=:value, edit_by=:edit_by, edit_date=now() WHERE tahun=:tahun and bulan=:bulan and big_code=:big_code";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('qty', $data['qty']);
        $this->db->bind('value', $data['value']);
		$this->db->bind('edit_by', $data['edit_by']);
		$this->db->bind('tahun', $data['tahun']);
        $this->db->bind('bulan', $data['bulan']);
		$this->db->bind('big_code', $data['big_code']);
        
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

    public function getDuplicateTargetOT($data)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE tahun=:tahun and bulan=:bulan and big_code=:big_code";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('tahun', $data['tahun']);
        $this->db->bind('bulan', $data['bulan']);
        $this->db->bind('big_code', $data['big_code']);

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->single();
	}

	public function uploadTargetOT($data)
	{
		$error = "";
		$update_count = 0;
		$save_count = 0;
		// $big_code='';

		try
		{
			$this->db->opendb();
			$this->db->begintrans();

			$baris = 1;

			foreach($data as $row){

				if($row['tahun'] == "#N/A" or $row['tahun'] == "")
                {
					
                    $error = "Error pada data TAHUN : '".$row['tahun']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['bulan'] == "#N/A" or $row['bulan'] == "")
                {
					
                    $error = "Error pada data BULAN : '".$row['bulan']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['big_code'] == "#N/A" or $row['big_code'] == "")
                {
					
                    $error = "Error pada data BIG Code : '".$row['big_code']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }


				if($row['qty'] == "#N/A" or $row['qty'] == "")
                {
					
                    $error = "Error pada data QTY : '".$row['qty']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['value'] == "#N/A" or $row['value'] == "")
                {
					
                    $error = "Error pada data VALUE : '".$row['value']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				$exist['target_ot'] = $this->getDuplicateTargetOT($row);
				
				if($exist['target_ot']['tahun'] == $row['tahun'] and $exist['target_ot']['bulan'] == $row['bulan'] and $exist['target_ot']['big_code'] == $row['big_code'])
				{
					// throw new Exception("Kode Outlet : '".$row['outlet_code']."' sudah terdaftar!");
					// goto rollback;

					$query = "UPDATE " . $this->table . " SET qty = '".$row['qty']."', value = '".$row['value']."', edit_by = '".$row['edit_by']."', edit_date = now() WHERE tahun = '".$row['tahun']."' and bulan = '".$row['bulan']."' and big_code = '".$row['big_code']."';";
					$this->db->query($query);
					$this->db->execute();
					$update_count++;
				}
				else
				{
					// throw new Exception(print_r($exist['target_sl']));
					// goto rollback;

					$query = "INSERT INTO " . $this->table . " (tahun, bulan, big_code, qty, value, create_by, create_date) VALUES ('".$row['tahun']."', '".$row['bulan']."', '".$row['big_code']."', '".$row['qty']."', '".$row['value']."', '".$row['create_by']."', now());";
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