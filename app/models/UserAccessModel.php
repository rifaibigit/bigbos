<?php

class UserAccessModel {
	
	private $table = 'user_access';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllAccess()
	{
		$this->db->opendb();
		$this->db->query("SELECT * FROM " . $this->table . " ORDER BY user_id, menu_id, sub_menu_id");
		return $this->db->resultSet();
	}

    public function getUserAccess()
	{
        $str_sql = "SELECT a.id, a.user_id, b.username, a.menu_id, c.menu, c.menu_icon, a.sub_menu_id, d.sub_menu, d.url";
        $str_sql = $str_sql . " from user_access a";
        $str_sql = $str_sql . " INNER JOIN user b on a.user_id = b.id";
        $str_sql = $str_sql . " LEFT JOIN user_menu c on a.menu_id = c.menu_id";
        $str_sql = $str_sql . " LEFT JOIN user_sub_menu d on a.menu_id = d.menu_id and a.sub_menu_id = d.sub_menu_id";
        $str_sql = $str_sql . " order by a.user_id, a.menu_id, a.sub_menu_id";
		$this->db->opendb();
		$this->db->query($str_sql);
		return $this->db->resultSet();
	}

	public function getUserAccessById($id)
	{
		$this->db->opendb();
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahUserAccess($data)
	{
		$query = "INSERT INTO ". $this->table ." (user_id, menu_id, sub_menu_id) VALUES (:user_id, :menu_id, :sub_menu_id)";
		$this->db->opendb();
		$this->db->query($query);
        //$this->db->bind('id',$data['id']);
		$this->db->bind('user_id', $data['user_id']);
		$this->db->bind('menu_id', $data['menu_id']);
        $this->db->bind('sub_menu_id', $data['sub_menu_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

    public function tambahUserAccessMulti($data)
	{
        $query = "INSERT INTO ". $this->table ." (user_id, menu_id, sub_menu_id) VALUES";
        foreach($data as $row){
            $query = $query . " ('".$row['user_id']."', '".$row['menu_id']."', '".$row['sub_menu_id']."'),";
        }
        $strsql = substr($query, 0, -1);
		$this->db->opendb();
        $this->db->query($strsql);
		/* $this->db->bind('user_id', $data['user_id']);
		$this->db->bind('menu_id', $data['menu_id']);
        $this->db->bind('sub_menu_id', $data['sub_menu_id']); */
        $this->db->execute();

        //Flasher::setMessage('Berhasil',$strsql,'success');

		return $this->db->rowCount();
	}

	public function updateUserAccess($data)
	{
		$query = "UPDATE ". $this->table ." SET user_id=:user_id, menu_id=:menu_id, sub_menu_id=:sub_menu_id WHERE id=:id";
		$this->db->opendb();
		$this->db->query($query);
        $this->db->bind('id', $data['id']);
		$this->db->bind('user_id', $data['user_id']);
		$this->db->bind('menu_id', $data['menu_id']);
        $this->db->bind('sub_menu_id', $data['sub_menu_id']);
		$this->db->execute();

        //Flasher::setMessage('Berhasil',$query,'success');

		return $this->db->rowCount();
	}

	public function deleteUserAccess($id)
	{
		$this->db->opendb();
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

}