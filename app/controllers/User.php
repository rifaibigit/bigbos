<?php

class User extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/Login');
			exit;
		}
	} 

	public function index()
	{
		$data['title'] = 'Data User';
		//$data['user'] = $this->model('UserModel')->getAllUser();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer');
	}

	public function show()
	{
		$data['data'] = $this->model('UserModel')->getAllUser();

		$json = json_encode($data);
		echo $json;
	}

	public function cari()
	{
		$data['title'] = 'Data User';
		$data['user'] = $this->model('UserModel')->cariUser();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Edit User';
		$data['user'] = $this->model('UserModel')->getUserById($id);
		$data['area'] = $this->model('AreaModel')->getAllArea();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('user/edit', $data);
		$this->view('templates/footer');
	}

	public function edit_pass($username){

		$data['title'] = 'Edit Password';
		$data['user'] = $this->model('UserModel')->getUserByUserName($username);
		//$data['area'] = $this->model('AreaModel')->getAllArea();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('user/edit_pass', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah User';
		$data['area'] = $this->model('AreaModel')->getAllArea();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('user/create', $data);
		$this->view('templates/footer');
	}

	public function simpanUser(){		
		if($_POST['password'] == $_POST['ulangi_password']) {	
			$row = $this->model('UserModel')->cekUsername();
			if($row['username'] == $_POST['username']){
				Flasher::setMessage('Gagal','Username yang anda masukan sudah pernah digunakan!','danger');
				header('location: '. base_url . '/User/tambah');
				exit;	
			} else {
				if( $this->model('UserModel')->tambahUser($_POST) > 0 ) {
					Flasher::setMessage('Berhasil','ditambahkan','success');
					header('location: '. base_url . '/User');
					exit;			
				} else {
					Flasher::setMessage('Gagal','ditambahkan','danger');
					header('location: '. base_url . '/User');
					exit;	
				}
			}
		} else {
			Flasher::setMessage('Gagal','password tidak sama.','danger');
			header('location: '. base_url . '/User/tambah');
			exit;	
		}
		
	}

	public function updatePassword(){	
		$old_password = md5($_POST['old_password']);
		if($_POST['password'] == $_POST['ulangi_password']) {	
			$row = $this->model('UserModel')->cekPassword();
			if($row['password'] != $old_password){
				Flasher::setMessage('Gagal','Password Lama Salah!','danger');
				header('location: '. base_url . '/User/edit_pass/'.$_POST['username']);
				exit;	
			} else {
				if( $this->model('UserModel')->updatePassword($_POST) > 0 ) {
					Flasher::setMessage('Berhasil','edit password','success');
					header('location: '. base_url . '/Home');
					exit;			
				} else {
					Flasher::setMessage('Gagal','edit password','danger');
					header('location: '. base_url . '/Home');
					exit;	
				}
			}
		} else {
			Flasher::setMessage('Gagal','password baru tidak sama.','danger');
			header('location: '. base_url . '/User/edit_pass/'.$_POST['username']);
			exit;	
		}
	
	}

	public function updateUser(){	
		if(empty($_POST['password'])) {
			if( $this->model('UserModel')->updateDataUser($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/User');
			exit;			
			}else{
				Flasher::setMessage('Gagal','diupdate','danger');
				header('location: '. base_url . '/User');
				exit;	
			}
		} else {
			if($_POST['password'] == $_POST['ulangi_password']) {
				if( $this->model('UserModel')->updateDataUser($_POST) > 0 ) {
				Flasher::setMessage('Berhasil','diupdate','success');
				header('location: '. base_url . '/User');
				exit;			
				}else{
					Flasher::setMessage('Gagal','diupdate','danger');
					header('location: '. base_url . '/User');
					exit;	
				}
			} else {
				Flasher::setMessage('Gagal','password tidak sama.','danger');
				header('location: '. base_url . '/User/tambah');
				exit;	
			}
		}
	}

	public function hapus($id){
		if( $this->model('UserModel')->deleteUser($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/User');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/User');
			exit;	
		}
	}
}