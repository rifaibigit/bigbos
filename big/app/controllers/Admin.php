<?php
class Admin extends Controller {
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
		$data['title'] = 'Admin';
		
		$data['nama'] = $_SESSION['nama'];
		$username = $_SESSION['username'];

		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('admin/index', $data);
		$this->view('templates/footer');
	}

}