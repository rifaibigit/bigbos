<?php

class ROModel {
	
	private $table = 'ro';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllRO()
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
			$query = "SELECT b.id, a.tahun, a.bulan, a.principal, a.area, a.outlet_type, b.desc_type, a.ro FROM " . $this->table . " a inner join channel b on a.outlet_type = b.outlet_type WHERE a.tahun = '" . $year . "' ORDER BY a.tahun, a.bulan, a.principal, a.area, id";
		}
		else
		{
			$query = "SELECT b.id, a.tahun, a.bulan, a.principal, a.area, a.outlet_type, b.desc_type, a.ro FROM " . $this->table . " a inner join channel b on a.outlet_type = b.outlet_type WHERE a.tahun = '" . $year . "' and a.bulan = '" . (int)$month .  "' ORDER BY a.tahun, a.bulan, a.principal, a.area, id";
		}

        
		$this->db->opendb();
		$this->db->query($query);

        //Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->resultSet();
	}

	public function getROById($id)
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id and tahun = year(now()) and bulan = month(now())");
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahRO($data)
	{
		$query = "INSERT INTO " . $this->table . " (tahun, bulan, principal, area, outlet_type, ro, create_by, create_date) VALUES(:tahun, :bulan, :principal, :area, :outlet_type, :ro, :create_by, now())";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('bulan', $data['bulan']);
        $this->db->bind('principal', $data['principal']);
        $this->db->bind('area', $data['area']);
        $this->db->bind('outlet_type', $data['outlet_type']);
		$this->db->bind('ro', $data['ro']);
		$this->db->bind('create_by', $data['create_by']);
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

	public function updateRO($data)
	{
		$query = "UPDATE " . $this->table . " SET ro=:ro, edit_by=:edit_by, edit_date=now() WHERE tahun=:tahun and bulan=:bulan and outlet_type=:outlet_type and area=:area and principal=:principal";

		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('ro', $data['ro']);
		$this->db->bind('edit_by', $data['edit_by']);
		$this->db->bind('tahun', $data['tahun']);
        $this->db->bind('bulan', $data['bulan']);
		$this->db->bind('outlet_type', $data['outlet_type']);
		$this->db->bind('area', $data['area']);
        $this->db->bind('principal', $data['principal']);
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

    public function getDuplicateRO($data)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE tahun=:tahun and bulan=:bulan and principal=:principal and area=:area and outlet_type=:outlet_type";

		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('tahun', $data['tahun']);
        $this->db->bind('bulan', $data['bulan']);
        $this->db->bind('principal', $data['principal']);
		$this->db->bind('area', $data['area']);
		$this->db->bind('outlet_type', $data['outlet_type']);

		return $this->db->resultSet();
	}

	public function getDuplicateRO2($data)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE tahun=:tahun and bulan=:bulan and principal=:principal and area=:area and outlet_type=:outlet_type";

		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('tahun', $data['tahun']);
        $this->db->bind('bulan', $data['bulan']);
        $this->db->bind('principal', $data['principal']);
		$this->db->bind('area', $data['area']);
		$this->db->bind('outlet_type', $data['outlet_type']);

		return $this->db->single();
	}


	public function uploadRO($data)
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

				if($row['outlet_type'] == "#N/A" or $row['outlet_type'] == "")
                {
					
                    $error = "Error pada data OUTLET TYPE : '".$row['outlet_type']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($row['ro'] == "#N/A" or $row['ro'] == "")
                {
					
                    $error = "Error pada data RO : '".$row['ro']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				$exist['ro'] = $this->getDuplicateRO2($row);
				
				if($exist['ro']['tahun'] == $row['tahun'] and $exist['ro']['bulan'] == $row['bulan']and $exist['ro']['principal'] == $row['principal'] and $exist['ro']['area'] == $row['area'] and $exist['ro']['outlet_type'] == $row['outlet_type'])
				{
					// throw new Exception("Kode Outlet : '".$row['outlet_code']."' sudah terdaftar!");
					// goto rollback;

					$query = "UPDATE " . $this->table . " SET ro = '".$row['ro']."', edit_by = '".$row['edit_by']."', edit_date = now() WHERE tahun = '".$row['tahun']."' and bulan = '".$row['bulan']."' and principal = '".$row['principal']."' and area = '".$row['area']."' and outlet_type = '".$row['outlet_type']."';";
					$this->db->query($query);
					$this->db->execute();
					$update_count++;
				}
				else
				{
					// throw new Exception(print_r($exist['target_so']));
					// goto rollback;

					$query = "INSERT INTO " . $this->table . " (tahun, bulan, principal, area, outlet_type, ro, create_by, create_date) VALUES ('".$row['tahun']."', '".$row['bulan']."', '".$row['principal']."', '".$row['area']."', '".$row['outlet_type']."', '".$row['ro']."', '".$row['create_by']."', now());";
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