<?php

class OutletModel {
	
	private $table = 'outlet';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllOutlet()
	{
		$query = "SELECT o.id, o.area, o.big_code, o.outlet_code, o.outlet_name, o.alamat, o.outlet_type, o.total_outlet, o.dist_code, d.distributor, o.register_date";
		$query = $query . " FROM " . $this->table . " o";
		$query = $query . " INNER JOIN distributor d ON o.dist_code = d.cust_code";
		$query = $query . " WHERE d.is_active = 1";
		$query = $query . " GROUP BY o.big_code, o.outlet_code, o.area";

		$this->db->opendb();
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getOutletVisit()
	{
		$query = "SELECT * FROM";
		$query = $query . " (";
			$query = $query . " select o.id, a.island, a.region, o.area, o.big_code, o.outlet_code, o.outlet_name, o.alamat, o.outlet_type, o.dist_code, d.distributor, o.register_date";
			$query = $query . " from " . $this->table . " o";
			$query = $query . " left join distributor d on o.dist_code = d.cust_code and d.is_active = 1";
			$query = $query . " left join area a on o.area = a.area";
			$query = $query . " union all";
			$query = $query . " select dh.id, a.island, a.region, dh.area, dh.big_code, dh.outlet_code, dh.outlet_name, dh.alamat, dh.outlet_type, dh.dist_code, d.distributor, dh.register_date";
			$query = $query . " from dc_hub dh";
			$query = $query . " left join distributor d on dh.dist_code = d.cust_code";
			$query = $query . " left join area a on dh.area = a.area";
			$query = $query . " group by big_code, area";
			$query = $query . " order by big_code, area";
		$query = $query . " ) outlet";
		$query = $query . " GROUP BY outlet.big_code, outlet.outlet_name, outlet.area, outlet.dist_code, outlet.outlet_type";
		$query = $query . " ORDER BY outlet.dist_code, outlet.area, outlet.big_code";

		$this->db->opendb();
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getAllOutlet2()
	{
		$query = "SELECT o.id, o.area, o.big_code, o.outlet_code, o.outlet_name, o.alamat, o.outlet_type, o.total_outlet, o.dist_code, d.distributor, o.register_date";
		$query = $query . " FROM " . $this->table . " o";
		$query = $query . " INNER JOIN distributor d ON o.dist_code = d.cust_code";
		$query = $query . " GROUP BY o.big_code, o.outlet_code, o.area";
		$query = $query . " ORDER BY o.id";

		$this->db->opendb();
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getOutletName()
	{
		$this->db->opendb();
		$this->db->query("SELECT big_code, outlet_code, outlet_name FROM " . $this->table . " GROUP BY big_code ORDER BY id");
		return $this->db->resultSet();
	}

	public function getOutletById($id)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE id=:id";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getOutletByCode($code)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE outlet_code=:code";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('code',$code);
		return $this->db->single();
	}

	public function getOutletByCodeNArea($code, $area)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE outlet_code=:code AND area=:area";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('code',$code);
		$this->db->bind('area',$area);
		return $this->db->single();
	}

	public function getOutletBy_Code_Area_Dist($outlet_code, $area, $dist_code)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE outlet_code=:outlet_code AND area=:area AND dist_code=:dist_code ";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('outlet_code',$outlet_code);
		$this->db->bind('area',$area);
		$this->db->bind('dist_code',$dist_code);
		return $this->db->single();
	}

	public function getDistByCode($code)
	{
		$query = "SELECT * FROM distributor WHERE cust_code=:code";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('code',$code);
		return $this->db->single();
	}

	public function getBIGCode($big_code)
	{
		$query = "SELECT DISTINCT big_code FROM outlet WHERE big_code = '".$big_code."'";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		// $this->db->bind('big_code',$big_code);
		return $this->db->single();
	}

	public function getMaxBIGCodeByArea($area)
	{
		$query = "SELECT big_code FROM outlet WHERE area = :area ORDER BY big_code DESC LIMIT 1";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('area',$area);
		return $this->db->single();
	}

	public function getAkronimArea($area)
	{
		$query = "SELECT akronim FROM area WHERE area = :area";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('area',$area);
		return $this->db->single();
	}

	public function getArea($area)
	{
		$query = "SELECT * FROM area WHERE area = :area";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('area',$area);
		return $this->db->single();
	}

	public function tambahOutlet($data)
	{
		$query = "INSERT INTO outlet (area, outlet_code, outlet_name, alamat, outlet_type) VALUES(:area, :outlet_code, :outlet_name, :alamat, :outlet_type)";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('area', $data['area']);
		$this->db->bind('outlet_code', $data['outlet_code']);
        $this->db->bind('outlet_name', $data['outlet_name']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('outlet_type', $data['outlet_type']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataOutlet($data)
	{
		try
		{
			$this->db->opendb();
			$this->db->begintrans();

			// $baris = 1;

			// foreach($data as $row){
				$query = "UPDATE outlet SET area = '".$data['area']."', outlet_code = '".$data['cust_code']."', outlet_name = '".$data['cust_name']."', alamat = '".$data['alamat']."', outlet_type = '".$data['outlet_type']."', total_outlet = '".$data['total_outlet']."', dist_code = '".$data['dist_code']."' WHERE id = '".$data['id']."'";
				$this->db->opendb();
				$this->db->query($query);
				$this->db->execute();

				$query = "UPDATE selling_out SET area = '".$data['area']."', alamat = '".$data['alamat']."', outlet_type = '".$data['outlet_type']."', kode_dist = '".$data['dist_code']."' WHERE cust_code = '".$data['cust_code']."' AND big_code = '".$data['big_code']."'";
				$this->db->query($query);
				$this->db->execute();
			// }

			// Flasher::setMessage('Berhasil',$query,'success');

			$this->db->committrans();
			
			$error = "";

		}
		catch(Exception $e)
		{
			rollback:
			echo $e->getMessage();
			$this->db->rollbacktrans();
		}

		return $this->db->rowCount();
	}

	public function deleteOutlet($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariOutlet()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE area LIKE :key or outlet_code LIKE :key or outlet_name LIKE :key or outlet_type LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	public function uploadDataOutlet($data)
	{
		$error = "";
		$update_count = 0;
		$save_count = 0;
		$outlet_code = "";
		$area = "";

		try
		{
			$this->db->opendb();
			$this->db->begintrans();

			$baris = 1;

			foreach($data as $row){

				if($row['area'] == "" or $row['outlet_code'] == "" or $row['outlet_name'] == "" or $row['outlet_type'] == "" or $row['total_outlet'] == "" or $row['dist_code'] == "")
                {
					
                    $error = "Ada Data Kosong (undefined) di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($outlet_code == $row['outlet_code'] and $area == $row['area'])
                {
					
                    $error = "outlet_code Duplicate!";
					throw new Exception("Kode Outlet Duplicate: '".$row['outlet_code']."'");

					goto rollback;
                }

				$exist['distributor'] = $this->getDistByCode($row['dist_code']);

				if($exist['distributor'] == "")
				{
					$error = "outlet_code Duplicate!";
					throw new Exception("Kode Distributor : '".$row['dist_code']."' di baris : '".$baris."' tidak terdaftar!");

					goto rollback;
				}

				$exist['outlet_code'] = $this->getOutletByCodeNArea($row['outlet_code'], $row['area']);
				
				if($exist['outlet_code']['outlet_code'] == $row['outlet_code'] and $exist['outlet_code']['area'] == $row['area'])
				{
					// throw new Exception("Kode Outlet : '".$row['outlet_code']."' sudah terdaftar!");
					// goto rollback;

					$query = "UPDATE " . $this->table . " SET area='".$row['area']."', outlet_code='".$row['outlet_code']."', outlet_name='".$row['outlet_name']."', alamat='".$row['alamat']."', outlet_type='".$row['outlet_type']."', total_outlet='".$row['total_outlet']."', dist_code='".$row['dist_code']."' WHERE outlet_code='".$row['outlet_code']."' AND area='".$row['area']."' AND outlet_type='".$row['outlet_type']."';";
					$this->db->query($query);
					$this->db->execute();
					$update_count++;
				}
				else
				{
					$query = "INSERT INTO " . $this->table . " (area, outlet_code, outlet_name, alamat, outlet_type, total_outlet, dist_code) VALUES ('".$row['area']."', '".$row['outlet_code']."', '".$row['outlet_name']."', '".$row['alamat']."', '".$row['outlet_type']."', '".$row['total_outlet']."', '".$row['dist_code']."');";
					$this->db->query($query);
					$this->db->execute();
					$save_count++;
				}

				$outlet_code = $row['outlet_code'];
				$area = $row['area'];
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

	public function uploadNOO($data)
	{
		$error = "";
		$update_count = 0;
		$save_count = 0;
		$outlet_code = "";
		$area = "";

		try
		{
			$this->db->opendb();
			$this->db->begintrans();

			$baris = 1;

			foreach($data as $row){

				if($row['outlet_code'] == "" or $row['outlet_name'] == "" or $row['area'] == "" or $row['outlet_type'] == "" or $row['total_outlet'] == "" or $row['dist_code'] == "" or $row['register_date'] == "")
                {
					
                    $error = "Ada Data Kosong (undefined) di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($outlet_code == $row['outlet_code'] and $area == $row['area'])
                {
					
                    $error = "outlet_code Duplicate!";
					throw new Exception("Kode Outlet Duplicate: '".$row['outlet_code']."'");

					goto rollback;
                }

				$exist['distributor'] = $this->getDistByCode($row['dist_code']);

				if(!$exist['distributor'])
				{
					$error = "outlet_code Duplicate!";
					throw new Exception("Kode Distributor : '".$row['dist_code']."' di baris : '".$baris."' tidak terdaftar!");

					goto rollback;
				}

				$exist['outlet'] = $this->getOutletBy_Code_Area_Dist($row['outlet_code'], $row['area'], $row['dist_code']);

				if($exist['outlet'])
				{
					$error = "outlet_code Duplicate!";
					throw new Exception("Kode Oulet : '".$row['outlet_code']."', Nama Outlet : '".$row['outlet_name']."', Area : '".$row['area']."', Kode Dist : '".$row['dist_code']."' di baris : '".$baris."' sudah terdaftar!");

					goto rollback;
				}

				$data1['area'] = $this->getAkronimArea($row['area']);

				if(!$data1['area'])
				{
					$error = "Area tidak terdaftar!";
					throw new Exception("Area : '".$row['area']."' di baris : '".$baris."' tidak terdaftar!");

					goto rollback;
				}

				$akronim = $data1['area']['akronim'];

				$data1['max_big_code'] = $this->getMaxBIGCodeByArea($row['area']);
				$max_big_code = $data1['max_big_code']['big_code'];

				if ($max_big_code == '')
				{
					$big_code = "BIG" . $akronim . date("y") . "001";
				}
				else
				{
					$max_big_code = (int)substr($max_big_code, -3) + 1;
					$big_code = "BIG" . $akronim . date("y") . substr('000' . $max_big_code, -3);
				}

				$query = "INSERT INTO " . $this->table . " (area, big_code, outlet_code, outlet_name, alamat, outlet_type, total_outlet, dist_code, register_date) VALUES ('".$row['area']."', '".$big_code."', '".$row['outlet_code']."', '".$row['outlet_name']."', '".$row['alamat']."', '".$row['outlet_type']."', '".$row['total_outlet']."', '".$row['dist_code']."', '".$row['register_date']."');";
				$this->db->query($query);
				$this->db->execute();
				$save_count++;

				$outlet_code = $row['outlet_code'];
				$area = $row['area'];
				$baris++;
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

	public function uploadOutlet($data)
	{
		$error = "";
		$update_count = 0;
		$save_count = 0;
		$outlet_code = "";
		$area = "";

		try
		{
			$this->db->opendb();
			$this->db->begintrans();

			$baris = 1;

			foreach($data as $row){

				if($row['big_code'] == "" or $row['outlet_code'] == "" or $row['outlet_name'] == "" or $row['area'] == "" or $row['outlet_type'] == "" or $row['total_outlet'] == "" or $row['dist_code'] == "" or $row['register_date'] == "")
                {
					
                    $error = "Ada Data Kosong (undefined) di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
                }

				if($outlet_code == $row['outlet_code'] and $area == $row['area'])
                {
					
                    $error = "outlet_code Duplicate!";
					throw new Exception("Kode Outlet Duplicate: '".$row['outlet_code']."'");

					goto rollback;
                }

				$exist['big_code'] = $this->getBIGCode($row['big_code']);
				// die($exist['big_code']['big_code']);

				if($row['big_code'] != $exist['big_code']['big_code'])
				{
					$error = "BIG Code tidak terdaftar!";
					throw new Exception("BIG Code : '".$row['big_code']."' di baris : '".$baris."' tidak terdaftar!");
					// throw new Exception("BIG Code : '".$exist['big_code']['big_code']."' di baris : '".$baris."' tidak terdaftar!");

					goto rollback;
				}

				$exist['distributor'] = $this->getDistByCode($row['dist_code']);

				if(!$exist['distributor'])
				{
					$error = "distributor tidak terdaftar!";
					throw new Exception("Kode Distributor : '".$row['dist_code']."' di baris : '".$baris."' tidak terdaftar!");

					goto rollback;
				}

				$data1['area'] = $this->getArea($row['area']);

				if(!$data1['area'])
				{
					$error = "Area tidak terdaftar!";
					throw new Exception("Area : '".$row['area']."' di baris : '".$baris."' tidak terdaftar!");

					goto rollback;
				}

				$exist['outlet'] = $this->getOutletBy_Code_Area_Dist($row['outlet_code'], $row['area'], $row['dist_code']);

				if($exist['outlet'])
				{
					$query = "UPDATE " . $this->table . " SET big_code = '".$row['big_code']."', alamat = '".$row['alamat']."', outlet_type = '".$row['outlet_type']."', total_outlet = '".$row['total_outlet']."' WHERE outlet_code = '".$row['outlet_code']."' AND area = '".$row['area']."' AND dist_code = '".$row['dist_code']."';";
					$this->db->query($query);
					$this->db->execute();
					// $update_count++;

					$query = "UPDATE selling_out SET big_code = '".$row['big_code']."', alamat = '".$row['alamat']."', outlet_type = '".$row['outlet_type']."' WHERE cust_code = '".$row['outlet_code']."' AND area = '".$row['area']."' AND kode_dist = '".$row['dist_code']."';";
					$this->db->query($query);
					$this->db->execute();

					$update_count++;
				}
				else
				{
					$query = "INSERT INTO " . $this->table . " (area, big_code, outlet_code, outlet_name, alamat, outlet_type, total_outlet, dist_code, register_date) VALUES ('".$row['area']."', '".$row['big_code']."', '".$row['outlet_code']."', '".$row['outlet_name']."', '".$row['alamat']."', '".$row['outlet_type']."', '".$row['total_outlet']."', '".$row['dist_code']."', '".$row['register_date']."');";
					$this->db->query($query);
					$this->db->execute();
					$save_count++;
				}

				$outlet_code = $row['outlet_code'];
				$area = $row['area'];
				$baris++;
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