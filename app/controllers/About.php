<?php

class About extends Controller {
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
		$data['title'] = 'Halaman AboutMe';

		$this->template('header', $data);
		//$this->view('templates/sidebar', $data);
		$this->template('sidebar', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}
}