<?php

class Fridge extends Controller {
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
		$data['title'] = 'Data Unit Pendingin';
		$data['sku'] = $this->model('FridgeModel')->getAllFridge();
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('fridge/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('FridgeModel')->getAllFridge();

		$json = json_encode($data);
		echo $json;
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan SKU';
		$data['sku'] = $this->model('FridgeModel')->getAllFridge();
		$this->view('sku/lihatlaporan', $data);
	}
	public function cari()
	{
		$data['title'] = 'Data Unit';
		$data['sku'] = $this->model('FridgeModel')->cariSku();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('sku/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Unit Pendingin';
		//$data['item_group'] = $this->model('FridgeModel')->getItemGroup();	
		//$data['principal'] = $this->model('FridgeModel')->getItemPrincipal();
		$data['sku'] = $this->model('FridgeModel')->getFridgeById($id);
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('fridge/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Unit Pendingin';
		//$data['item_group'] = $this->model('FridgeModel')->getItemGroup();	
		//$data['principal'] = $this->model('FridgeModel')->getItemPrincipal();	
		//$data['sku'] = $this->model('FridgeModel')->getAllSku();		
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('fridge/create', $data);
		$this->view('templates/footer');
	}

	public function simpanFridge(){		

        // $tmp_name = $_FILES['img']['tmp_name'];
        // $target = "dist/img/freezer n chiller/upload/".basename($_FILES['img']['name']);
        // move_uploaded_file($tmp_name, $target);

		if( $this->model('FridgeModel')->tambahFridge($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Fridge');
			exit;			
		}else{
            unlink($target);
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Fridge');
			exit;	
		}
	}

	public function updateFridge(){	
		if( $this->model('FridgeModel')->updateDataFridge($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Fridge');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Fridge');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('FridgeModel')->deleteFridge($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Fridge');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Fridge');
			exit;	
		}
	}
}