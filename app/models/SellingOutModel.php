<?php

class SellingOutModel {
	
	private $table = 'selling_out';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllSellingout()
	{
		if(isset($_POST['by_big_code']))
		{
			$big_code = $_POST['by_big_code'];
		}
		else
		{
			$big_code = "";
		}

		if(isset($_POST['by_dist_code']))
		{
			$dist_code = $_POST['by_dist_code'];
		}
		else
		{
			$dist_code = "";
		}

		if (isset($_POST['by_area']))
		{
			$area = $_POST['by_area'];
			// $area = str_replace(",", "','", $area);;
		}
		elseif ($_SESSION['area'] != 'ALL')
		{
			$session_area = str_replace(", ", "','", $_SESSION['area']); 
			$area = $session_area;
		}

		if(isset($_POST['by_region']))
		{
			$region = $_POST['by_region'];
		}
		else
		{
			$region = "";
		}

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
			$query = "SELECT * FROM " . $this->table . " where year(tanggal) = '" . $year . "'";
		}
		else
		{
			$query = "SELECT * FROM " . $this->table . " where year(tanggal) = '" . $year . "' and month(tanggal) = '" . (int)$month . "'";
		}

		if (isset($big_code))
		{
			if($big_code != '')
			{
				$query = $query . " and big_code = '" . $big_code . "'";
			}
		}

		if (isset($dist_code))
		{
			if($dist_code != '')
			{
				$query = $query . " and kode_dist = '" . $dist_code . "'";
			}
		}

		if (isset($region))
		{
			if($region != '')
			{
				$query = $query . " and region in ('" . $region . "')";
			}
		}

		if (isset($area))
		{
			if($area != '')
			{
				$query = $query . " and area in ('" . $area . "')";
			}
		}

		if ($_SESSION['area'] != 'ALL')
		{
			$session_area = str_replace(",", "','", $_SESSION['area']);
			$session_area = str_replace(" ", "", $session_area);

			$query = $query . " and area in ('" . $session_area . "')";
		}

		// $query = $query . " ORDER BY ID DESC LIMIT 15000";
		$query = $query . " ORDER BY ID";

		// Flasher::setMessage('Berhasil',$query,'success');

		$this->db->opendb();
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getSellingout2($direct)
	{
		$data = explode(",", $direct);

		$principal = $data[0];
		$dist_code = $data[1];
		$month = $data[2];
		$year = $data[3];

		if($month == 'all' or $month == 'All')
		{
			$query = "SELECT * FROM " . $this->table . " where year(tanggal) = '" . $year . "'";
		}
		else
		{
			$query = "SELECT * FROM " . $this->table . " where year(tanggal) = '" . $year . "' and month(tanggal) = '" . (int)$month . "'";
		}

		if (isset($principal))
		{
			if($principal != '')
			{
				$query = $query . " and principal = '" . $principal . "')";
			}
		}

		if (isset($dist_code))
		{
			if($dist_code != '')
			{
				$query = $query . " and kode_dist = '" . $dist_code . "'";
			}
		}

		// if ($_SESSION['area'] != 'ALL')
		// {
		// 	$session_area = str_replace(",", "','", $_SESSION['area']);
		// 	$session_area = str_replace(" ", "", $session_area);

		// 	$query = $query . " and area in ('" . $session_area . "')";
		// }

		$query = $query . " ORDER BY ID DESC LIMIT 15000";

		//Flasher::setMessage('Berhasil',$query,'success');

		$this->db->opendb();
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function getSellingoutById($id)
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getDuplicateSellingout($cust_code, $outlet_type, $item_code, $qty, $value_exc, $value_inc, $tanggal, $invoice, $inv_status, $kode_dist)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE cust_code='" .$cust_code. "' and outlet_type='" .$outlet_type. "' and item_code='" .$item_code. "' and qty='" .$qty. "' and value_exc='" .$value_exc. "' and value_inc='" .$value_inc. "' and tanggal='" .$tanggal. "' and invoice='" .$invoice. "' and inv_status='" .$inv_status. "' and kode_dist='" .$kode_dist. "'";

		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('cust_code', $cust_code);
        $this->db->bind('outlet_type', $outlet_type);
        $this->db->bind('item_code', $item_code);
		$this->db->bind('qty', $qty);
		$this->db->bind('value_exc', $value_exc);
		$this->db->bind('value_inc', $value_inc);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('invoice', $invoice);
        $this->db->bind('inv_status', $inv_status);
        $this->db->bind('kode_dist', $kode_dist);

		/* Flasher::setMessage('Berhasil',$this->db->rowCount(),'success');*/

		return $this->db->resultSet();
	}

	public function tambahSellingout($data)
	{
		$query = "INSERT INTO selling_out (cust_code, cust_name, alamat, outlet_type, item_code, item_name, qty, value_exc, value_inc, tanggal, invoice, inv_status, kode_dist, nama_dist, principal, asm, area, region, item_group, salesman, create_by, create_date) VALUES(:cust_code, :cust_name, :alamat, :outlet_type, :item_code, :item_name, :qty, :value_exc, :value_inc, :tanggal, :invoice, :inv_status, :kode_dist, :nama_dist, :principal, :asm, :area, :region, :item_group, :salesman, :create_by, now())";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('cust_code', $data['cust_code']);
		$this->db->bind('cust_name', $data['cust_name']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('outlet_type', $data['outlet_type']);
        $this->db->bind('item_code', $data['item_code']);
        $this->db->bind('item_name', $data['item_name']);
		$this->db->bind('qty', $data['qty']);
        $this->db->bind('value_exc', $data['value_exc']);
        $this->db->bind('value_inc', $data['value_inc']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('invoice', $data['invoice']);
        $this->db->bind('inv_status', $data['inv_status']);
        $this->db->bind('kode_dist', $data['kode_dist']);
        $this->db->bind('nama_dist', $data['nama_dist']);
		$this->db->bind('principal', $data['principal']);
		$this->db->bind('asm', $data['asm']);
		$this->db->bind('area', $data['area']);
		$this->db->bind('region', $data['region']);
		$this->db->bind('item_group', $data['item_group']);
		$this->db->bind('salesman', $data['salesman']);
		$this->db->bind('create_by', $data['create_by']);
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

	public function updateDataSellingout($data)
	{
		$query = "UPDATE selling_out SET qty=:qty, value_exc=:value_exc, value_inc=:value_inc WHERE cust_code=:cust_code and outlet_type=:outlet_type and item_code=:item_code and qty=:qty and value_exc=:value_exc and value_inc=:value_inc and tanggal=:tanggal and invoice=:invoice and inv_status=:inv_status and kode_dist=:kode_dist";

		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('qty', $data['qty']);
        $this->db->bind('value_exc', $data['value_exc']);
        $this->db->bind('value_inc', $data['value_inc']);
		$this->db->bind('cust_code', $data['cust_code']);
        $this->db->bind('outlet_type', $data['outlet_type']);
        $this->db->bind('item_code', $data['item_code']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('invoice', $data['invoice']);
        $this->db->bind('inv_status', $data['inv_status']);
        $this->db->bind('kode_dist', $data['kode_dist']);
        $this->db->bind('nama_dist', $data['nama_dist']);
		$this->db->bind('principal', $data['principal']);
		$this->db->bind('pic', $data['pic']);
		$this->db->bind('area', $data['area']);
		$this->db->bind('region', $data['region']);
		$this->db->bind('item_group', $data['item_group']);
		$this->db->bind('salesman', $data['salesman']);
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

	public function deleteSellingout($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariSellingout()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE cust_name LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}

	public function uploadSellingOut($data)
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

				if ($row['cust_code'] === "#N/A" or $row['cust_code'] === "") 
				{
					$error = "Error pada data KODE CUSTOMER : '".$row['cust_code']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['big_code'] === "#N/A" or $row['big_code'] === "") 
				{
					$error = "Error pada data BIG CODE : '".$row['big_code']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['cust_name'] === "#N/A" or $row['cust_name'] === "") 
				{
					$error = "Error pada data NAMA CUSTOMER : '".$row['cust_name']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['outlet_type'] === "#N/A" or $row['outlet_type'] === "") 
				{
					$error = "Error pada data TIPE OUTLET : '".$row['outlet_type']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				$sku_code = $this->getSkuByCode($row['item_code']);

				// $error = "KODE SKU : '".$sku_code['item_code']."' di baris : '".$baris."' tidak ditemukan di Master Data SKU";
				// throw new Exception($error);

				if(!$sku_code or $sku_code['item_code'] !== $row['item_code'])
				{
					$error = "KODE SKU : '".$row['item_code']."' di baris : '".$baris."' tidak ditemukan di Master Data SKU";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['item_code'] === "#N/A" or $row['item_code'] === "") 
				{
					$error = "Error pada data KODE ITEM : '".$row['item_code']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['item_name'] === "#N/A" or $row['item_name'] === "") 
				{
					$error = "Error pada data NAMA ITEM : '".$row['item_name']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['qty'] === "#N/A" or $row['qty'] === "") 
				{
					$error = "Error pada data QTY : '".$row['qty']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['value_exc'] === "#N/A" or $row['value_exc'] === "") 
				{
					$error = "Error pada data VALUE EXC : '".$row['value_exc']."' di baris : '".$baris."' - '".$row['item_code']."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['value_inc'] === "#N/A" or $row['value_inc'] === "") 
				{
					$error = "Error pada data VALUE INC : '".$row['value_inc']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['tanggal'] === "#N/A" or $row['tanggal'] === "") 
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

				if ($row['invoice'] === "#N/A" or $row['invoice'] === "") 
				{
					$error = "Error pada data NO INVOICE : '".$row['invoice']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['inv_status'] === "#N/A" or $row['inv_status'] === "") 
				{
					$error = "Error pada data STATUS INVOICE : '".$row['inv_status']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['kode_dist'] === "#N/A" or $row['kode_dist'] === "") 
				{
					$error = "Error pada data KODE DISTRIBUTOR : '".$row['kode_dist']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['nama_dist'] === "#N/A" or $row['nama_dist'] === "") 
				{
					$error = "Error pada data NAMA DISTRIBUTOR : '".$row['nama_dist']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['principal'] === "#N/A" or $row['principal'] === "") 
				{
					$error = "Error pada data PRINCIPAL : '".$row['principal']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['asm'] === "#N/A" or $row['asm'] === "") 
				{
					$error = "Error pada data PIC : '".$row['asm']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['area'] === "#N/A" or $row['area'] === "") 
				{
					$error = "Error pada data AREA : '".$row['cust_code']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['region'] === "#N/A" or $row['region'] === "") 
				{
					$error = "Error pada data REGION : '".$row['region']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				if ($row['item_group'] === "#N/A" or $row['item_group'] === "") 
				{
					$error = "Error pada data GROUP SKU : '".$row['item_group']."' di baris : '".$baris."'";
					throw new Exception($error);

					goto rollback;
				}

				$outlet = $this->getOutletByCode($row['cust_code'], $row['area'], $row['kode_dist']);

				if(!$outlet or $outlet['outlet_code'] !== $row['cust_code'])
				{
					$error = "KODE OUTLET : '".var_dump($outlet)."' dan AREA : '".$row['area']."' di baris : '".$baris."' tidak ditemukan di Master Data Outlet";
					throw new Exception($error);

					goto rollback;
				}
				else
				{
					if($outlet['big_code'] !== $row['big_code'])
					{
						$error = "BIG CODE : '".$row['big_code']."' di baris : '".$baris."' tidak sesuai dengan Kode outlet";
						throw new Exception($error);

						goto rollback;
					}

					if($outlet['outlet_type'] !== $row['outlet_type'])
					{
						$error = "OUTLET TYPE : '".$row['outlet_type']."' di baris : '".$baris."' tidak sesuai dengan Kode outlet";
						throw new Exception($error);

						goto rollback;
					}

					if($outlet['total_outlet'] == 0)
					{
						$error = "TOTAL OUTLET = '0' (nol) pada BIG CODE : '".$row['big_code']."' di baris : '".$baris."'. Harap Edit Total Outlet di Master Data Outlet";
						throw new Exception($error);

						goto rollback;
					}
				}

				$query = "INSERT INTO selling_out (cust_code, big_code, cust_name, alamat, outlet_type, item_code, item_name, qty, value_exc, value_inc, tanggal, invoice, inv_status, kode_dist, nama_dist, principal, asm, area, region, item_group, salesman, create_by, create_date)";
				$query = $query . " VALUES ('".$row['cust_code']."', '".$row['big_code']."', '".$row['cust_name']."', '".$row['alamat']."', '".$row['outlet_type']."', '".$row['item_code']."', '".$row['item_name']."', '".$row['qty']."', '".$row['value_exc']."', '".$row['value_inc']."', '".$row['tanggal']."', '".$row['invoice']."', '".$row['inv_status']."', '".$row['kode_dist']."', '".$row['nama_dist']."', '".$row['principal']."', '".$row['asm']."', '".$row['area']."', '".$row['region']."', '".$row['item_group']."', '".$row['salesman']."', '".$row['create_by']."', now());";
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

	public function getOutletType($type)
	{
		$query = "SELECT * FROM channel where outlet_type = :type ORDER BY id";

		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('type',$type);
		return $this->db->single();
	}

	public function getOutletByCode($code, $area, $dist_code)
	{
		$query = "SELECT * FROM outlet WHERE outlet_code = '".$code."' AND area = '".$area."' AND dist_code = '".$dist_code."'";
		//Flasher::setMessage('Berhasil',$query,'success');
		$this->db->opendb();
		$this->db->query($query);
		// $this->db->bind('code',$code);
		// $this->db->bind('area',$area);
		// $this->db->bind('dist_code',$dist_code);
		return $this->db->single();
	}

	public function getSkuByCode($code)
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM sku WHERE item_code = '".$code."'");
		// $this->db->bind('code', $code);
		return $this->db->single();
	}
}