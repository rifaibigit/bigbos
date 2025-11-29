<?php

class Year extends Controller {
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
		$data['title'] = 'Report Year';
		$data['year'] = $this->model('YearModel')->getYear();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('year/index', $data);
		$this->view('templates/footer');
	}

	public function updateYear(){	
			if( $this->model('YearModel')->updateYear($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Year');
			exit;			
			}else{
				Flasher::setMessage('Gagal','diupdate','danger');
				header('location: '. base_url . '/Year');
				exit;	
			}
	}

}