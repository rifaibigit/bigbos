<?php

class Dc extends Controller {
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
		$data['title'] = 'Data DC';
		//$data['outlet'] = $this->model('OutletModel')->getAllOutlet();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('dc/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('DcModel')->getAllDc();

		$json = json_encode($data);
		echo $json;
	}

	public function edit($id){
		$data['title'] = 'Detail DC';
		$data['dc'] = $this->model('DcModel')->getDcById($id);
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('dc/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah DC';	
        $data['outlet'] = $this->model('OutletModel')->getAllOutlet();	
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('dc/create', $data);
		$this->view('templates/footer');
	}

	public function simpanDc(){		
		if( $this->model('DcModel')->tambahDc($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Dc');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Dc');
			exit;	
		}
	}

	public function updateDc(){	
		if( $this->model('DcModel')->updateDataDc($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Dc');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Dc');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('DcModel')->deleteDc($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Outlet');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Outlet');
			exit;	
		}
	}
}