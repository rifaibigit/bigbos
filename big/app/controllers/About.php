<?php

class About extends Controller {
	public function __construct()
	{	
		/* if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		} */
	} 
	public function index()
	{
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/Login');
			exit;
		} 

		$data['title'] = 'About Us';

		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('about/index');
		$this->view('templates/footer');
	}

	public function About_fmcg()
	{
		$data['title'] = 'About Us';

		$this->view('templates/header_about_us_fmcg');
		$this->view('about/about_fmcg');
		$this->view('templates/footer_rental');
	}

	public function About_fmcg_id()
	{
		$data['title'] = 'Tentang Kami';

		$this->view('templates/header_about_us_fmcg_id');
		$this->view('about/about_fmcg_id');
		$this->view('templates/footer_rental_id');
	}

	public function About_rental()
	{
		$data['title'] = 'About Us';

		$this->view('templates/header_about_us_rental');
		$this->view('about/about_rental');
		$this->view('templates/footer_rental');
	}

	public function About_rental_id()
	{
		$data['title'] = 'Tentang Kami';

		$this->view('templates/header_about_us_rental_id');
		$this->view('about/about_rental_id');
		$this->view('templates/footer_rental_id');
	}
}