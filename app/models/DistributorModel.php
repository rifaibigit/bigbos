<?php

class DistributorModel {
	
	private $table = 'distributor';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllDist()
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY id");
		return $this->db->resultSet();
	}

	public function getDistById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function getDistByArea()
	{

		$area = $_SESSION['area'];

		$this->db->opendb();
		if ( $area!= 'ALL')
		{
			$query = "SELECT * FROM ' . $this->table . ' WHERE area=:area";
			$this->db->query($query);
			$this->db->bind('area', $area);
		}
		else
		{
			$query = "SELECT * FROM " . $this->table . " ORDER BY id";
			$this->db->query($query);
		}

		//Flasher::setMessage('Berhasil',$query,'success');
		
		return $this->db->resultSet();
	}

	public function getBufferDistByCode($code)
	{

		$this->db->opendb();
		
		$query = "SELECT buffer_stock, lead_time FROM " . $this->table . " WHERE cust_code=:code";
		$this->db->query($query);
		$this->db->bind('code', $code);

		//Flasher::setMessage('Berhasil',$query,'success');
		
		return $this->db->single();
	}

	public function getDistByCode($code)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE cust_code=:code');
		$this->db->bind('code', $code);
		return $this->db->single();
	}

	public function tambahDist($data)
	{
		$query = "INSERT INTO distributor (cust_code, distributor, area, asm, pic, buffer_stock, lead_time, is_active) VALUES(:cust_code, :distributor, :area, :asm, :pic, :buffer_stock, :lead_time, :is_active)";
		$this->db->opendb();
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('cust_code', $data['cust_code']);
		$this->db->bind('distributor', $data['distributor']);
        $this->db->bind('area', $data['area']);
		$this->db->bind('asm', $data['asm']);
		$this->db->bind('pic', $data['pic']);
		$this->db->bind('buffer_stock', $data['buffer_stock']);
		$this->db->bind('lead_time', $data['lead_time']);
		$this->db->bind('is_active', $data['is_active']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataDist($data)
	{
		$query = "UPDATE distributor SET distributor=:distributor, area=:area, asm=:asm, pic=:pic, buffer_stock=:buffer_stock, lead_time=:lead_time, is_active=:is_active WHERE id=:id";
		$this->db->opendb();
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		//$this->db->bind('cust_code', $data['cust_code']);
		$this->db->bind('distributor', $data['distributor']);
        $this->db->bind('area', $data['area']);
		$this->db->bind('asm', $data['asm']);
		$this->db->bind('pic', $data['pic']);
		$this->db->bind('buffer_stock', $data['buffer_stock']);
		$this->db->bind('lead_time', $data['lead_time']);
		$this->db->bind('is_active', $data['is_active']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDist($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDist()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE area LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}