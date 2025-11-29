<?php
class Home extends Controller {
	public function __construct()
	{	
		/* if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
 */
	} 
	public function index()
	{
		$data['title'] = 'Dashboard';

		//$this->view('templates/header_index');
		$this->view('home/index');
		//$this->view('templates/footer_index');

	}

	public function FMCG()
	{
		$data['title'] = 'Dashboard';

		$this->view('templates/header_fmcg');
		$this->view('home/home_fmcg');
		$this->view('templates/footer_rental');
	}

	public function FMCG_ID()
	{
		$data['title'] = 'Dashboard';

		$this->view('templates/header_fmcg_id');
		$this->view('home/home_fmcg_id');
		$this->view('templates/footer_rental_id');
	}

	public function Rental()
	{
		$data['title'] = 'Dashboard';

		$data['sku'] = $this->model('FridgeModel')->getAllFridge();

		$this->view('templates/header_rental');
		$this->view('home/home_rental', $data);
		$this->view('templates/footer_rental');
	}

	public function Rental_ID()
	{
		$data['title'] = 'Dashboard';

		$data['sku'] = $this->model('FridgeModel')->getAllFridge();

		$this->view('templates/header_rental_id');
		$this->view('home/home_rental_id', $data);
		$this->view('templates/footer_rental_id');
	}

}