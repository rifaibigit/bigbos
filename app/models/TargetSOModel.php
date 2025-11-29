<?php

class TargetSOModel {
	
	private $table = 'sellingout_target';
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
			$query = "SELECT b.id, a.tahun, a.bulan, a.principal, a.area, a.item_code, b.item_name, b.unit, a.qty, a.value FROM " . $this->table . " a inner join sku b on a.item_code = b.item_code WHERE a.tahun = '" . $year . "' ORDER BY tahun, bulan, area, id";
		}
		else
		{
			$query = "SELECT b.id, a.tahun, a.bulan, a.principal, a.area, a.item_code, b.item_name, b.unit, a.qty, a.value FROM " . $this->table . " a inner join sku b on a.item_code = b.item_code WHERE a.tahun = '" . $year . "' and CONVERT(a.bulan, SIGNED INTEGER) = '" . (int)$month . "' ORDER BY tahun, bulan, area, id";
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
		$query = "INSERT INTO sellingout_target (tahun, bulan, principal, area, item_code, qty, value, create_by, create_date) VALUES(:tahun, :bulan, :principal, :area, :item_code, :qty, :value, :create_by, now())";
		$this->db->query($query);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('bulan', $data['bulan']);
        $this->db->bind('principal', $data['principal']);
        $this->db->bind('area', $data['area']);
        $this->db->bind('item_code', $data['item_code']);
		$this->db->bind('qty', $data['qty']);
        $this->db->bind('value', $data['value']);
		$this->db->bind('create_by', $data['create_by']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateTarget($data)
	{
		$query = "UPDATE sellingout_target SET qty=:qty, value=:value, edit_by=:edit_by, edit_date=now() WHERE tahun=:tahun and bulan=:bulan and item_code=:item_code and area=:area";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('qty', $data['qty']);
        $this->db->bind('value', $data['value']);
		$this->db->bind('edit_by', $data['edit_by']);
		$this->db->bind('tahun', $data['tahun']);
        $this->db->bind('bulan', $data['bulan']);
		$this->db->bind('item_code', $data['item_code']);
		$this->db->bind('area', $data['area']);
        
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

    public function getDuplicateTargetSO($data)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE tahun=:tahun and bulan=:bulan and item_code=:item_code and area=:area";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('tahun', $data['tahun']);
        $this->db->bind('bulan', $data['bulan']);
        $this->db->bind('item_code', $data['item_code']);
		$this->db->bind('area', $data['area']);

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->single();
	}

	public function uploadTargetSO($data)
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

				if($row['principal'] == "#N/A" or $row['principal'] == "")
                {
					
                    $error = "Error pada data PRINCIPAL : '".$row['principal']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['area'] == "#N/A" or $row['area'] == "")
                {
					
                    $error = "Error pada data AREA : '".$row['area']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['item_code'] == "#N/A" or $row['item_code'] == "")
                {
					
                    $error = "Error pada data KODE ITEM : '".$row['item_code']."' di baris : '".$baris."'";
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

				$exist['target_so'] = $this->getDuplicateTargetSO($row);
				
				if($exist['target_so']['tahun'] == $row['tahun'] and $exist['target_so']['bulan'] == $row['bulan'] and $exist['target_so']['area'] == $row['area'] and $exist['target_so']['item_code'] == $row['item_code'])
				{
					// throw new Exception("Kode Outlet : '".$row['outlet_code']."' sudah terdaftar!");
					// goto rollback;

					$query = "UPDATE " . $this->table . " SET qty = '".$row['qty']."', value = '".$row['value']."', edit_by = '".$row['edit_by']."', edit_date = now() WHERE tahun = '".$row['tahun']."' and bulan = '".$row['bulan']."' and item_code = '".$row['item_code']."' and area = '".$row['area']."';";
					$this->db->query($query);
					$this->db->execute();
					$update_count++;
				}
				else
				{
					// throw new Exception(print_r($exist['target_so']));
					// goto rollback;

					$query = "INSERT INTO " . $this->table . " (tahun, bulan, principal, area, item_code, qty, value, create_by, create_date) VALUES ('".$row['tahun']."', '".$row['bulan']."', '".$row['principal']."', '".$row['area']."', '".$row['item_code']."', '".$row['qty']."', '".$row['value']."', '".$row['create_by']."', now());";
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
			//echo $e->getMessage();
			echo $query;
			$this->db->rollbacktrans();
		}

		//$this->db->closedb();

		return $this->db->rowCount();
	}

}