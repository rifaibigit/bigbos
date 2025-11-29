<?php

class UserModel {
	
	private $table = 'user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllUser()
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getUserMenu($username)
	{
		$this->db->opendb();
		$str_sql = "SELECT distinct a.user_id, b.username, a.menu_id, c.menu, c.menu_icon";
		$str_sql = $str_sql . " FROM user_access a";
		$str_sql = $str_sql . " LEFT JOIN user b on a.user_id = b.id";
		$str_sql = $str_sql . " LEFT JOIN user_menu c on a.menu_id = c.menu_id";
		$str_sql = $str_sql . " WHERE b.username = :username and c.is_active = 1";
		$str_sql = $str_sql . " ORDER BY a.user_id, a.menu_id";

		$this->db->query($str_sql);
		$this->db->bind('username', $username);
		return $this->db->resultSet();
	}

	public function getUserDashboard($username)
	{
		$this->db->opendb();
		$str_sql = "SELECT dashboard from user where username = :username";

		$this->db->query($str_sql);
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	public function getUserMenuByID($username)
	{
		$this->db->opendb();
		$str_sql = "SELECT a.id, a.user_id, b.username, a.menu_id, c.menu, c.menu_icon, a.sub_menu_id, d.sub_menu, d.url";
		$str_sql = $str_sql . " from user_access a";
		$str_sql = $str_sql . " LEFT JOIN user b on a.user_id = b.id";
		$str_sql = $str_sql . " LEFT JOIN user_menu c on a.menu_id = c.menu_id";
		$str_sql = $str_sql . " LEFT JOIN user_sub_menu d on a.menu_id = d.menu_id and a.sub_menu_id = d.sub_menu_id";
		$str_sql = $str_sql . " WHERE b.username = :username and c.is_active = 1 and d.is_active = 1";
		$str_sql = $str_sql . " ORDER BY a.user_id, a.menu_id, a.sub_menu_id";

		$this->db->query($str_sql);
		$this->db->bind('username', $username);
		return $this->db->resultSet();
	}

	public function getUserById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getUserArea($username)
	{
		$this->db->opendb();
		$str_sql = "SELECT area from user where username = :username";

		$this->db->query($str_sql);
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	public function getUserByUserName($username)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	public function tambahUser($data)
	{
		$this->db->opendb();
		$query = "INSERT INTO user (nama,username, area, dashboard, password) VALUES(:nama,:username,:area,:dashboard,:password)";
		$this->db->query($query);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('username',$data['username']);
		$this->db->bind('area',implode(', ', $data['area']));
		$this->db->bind('dashboard',$data['dashboard']);
		$this->db->bind('password', md5($data['password']));
		$this->db->execute();

		//Flasher::setMessage('Berhasil',$data['area'],'success');

		return $this->db->rowCount();
	}

	public function cekUsername()
	{
		$this->db->opendb();
		$username = $_POST['username'];
		$this->db->query("SELECT * FROM user WHERE username = :username");
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	public function cekPassword()
	{
		$this->db->opendb();
		$username = $_POST['username'];
		$this->db->query("SELECT * FROM user WHERE username = :username");
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	public function updatePassword($data)
	{
		$this->db->opendb();
		$query = "UPDATE user SET password=:password WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('password',md5($data['password']));
		
		//Flasher::setMessage('Area',$area,'success');

		$this->db->execute();
		return $this->db->rowCount();
	}

	public function updateDataUser($data)
	{
		$this->db->opendb();
		$area = implode(', ', $data['area']);

		if(empty($_POST['password'])) {
			$query = "UPDATE user SET nama=:nama, area=:area, dashboard=:dashboard WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('area',$area);
			$this->db->bind('dashboard',$data['dashboard']);
		} else {
			$query = "UPDATE user SET nama=:nama, area=:area, dashboard=:dashboard, password=:password WHERE id=:id";
			$this->db->query($query);
			$this->db->bind('id',$data['id']);
			$this->db->bind('nama',$data['nama']);
			$this->db->bind('area',$area);
			$this->db->bind('dashboard',$data['dashboard']);
			$this->db->bind('password',md5($data['password']));
		}
		
		//Flasher::setMessage('Area',$area,'success');

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteUser($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariUser()
	{
		$this->db->opendb();
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}