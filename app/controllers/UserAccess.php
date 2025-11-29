<?php

class UserAccess extends Controller {
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
		$data['title'] = 'Data User Akses';
		//$data['sub_menu'] = $this->model('SubSubMenuModel')->getAllSubMenu();

		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('useraccess/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('UserAccessModel')->getUserAccess();

		$json = json_encode($data);
		echo $json;
	}

	public function tambah(){
		$data['title'] = 'Tambah User Akses';
        $data['user'] = $this->model('UserModel')->getAllUser();		
		$data['menu'] = $this->model('MenuModel')->getAllMenu();
        $data['sub_menu'] = $this->model('SubMenuModel')->getSubMenu();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('useraccess/create2', $data);
		$this->view('templates/footer');
	}

	public function simpanUserAccess()
    {

        $user_id = $_POST['user'];
        $menu_id = $_POST['menu'];
        $sub_menu_id = $_POST['sub_menu'];
        $data = array();

        foreach($sub_menu_id as $submenuid){
            array_push($data, array(
                'user_id' => $user_id,
                'menu_id' => $menu_id,
                'sub_menu_id' => $submenuid
            ));
        }

		if( $this->model('UserAccessModel')->tambahUserAccessMulti($data) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/UserAccess');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/UserAccess');
			exit;	
		}
	}

	public function updateSubMenu(){	
		if( $this->model('SubMenuModel')->updateDataSubMenu($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/UserAccess');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/UserAccess');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('UserAccessModel')->deleteUserAccess($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/UserAccess');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/UserAccess');
			exit;	
		}
	}
}