<?php

class Sku extends Controller {
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
		$data['title'] = 'Data SKU';
		$data['sku'] = $this->model('SkuModel')->getAllSku();
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('sku/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('SkuModel')->getAllSku();

		$json = json_encode($data);
		echo $json;
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan SKU';
		$data['sku'] = $this->model('SkuModel')->getAllSku();
		$this->view('sku/lihatlaporan', $data);
	}
	public function cari()
	{
		$data['title'] = 'Data SKU';
		$data['sku'] = $this->model('SkuModel')->cariSku();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('sku/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail SKU';
		$data['item_group'] = $this->model('SkuModel')->getItemGroup();	
		$data['principal'] = $this->model('SkuModel')->getItemPrincipal();
		$data['sku'] = $this->model('SkuModel')->getSkuById($id);
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('sku/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah SKU';
		$data['item_group'] = $this->model('SkuGroupModel')->getItemGroup();	
		$data['principal'] = $this->model('SkuGroupModel')->getPrincipal();	
		$data['sku'] = $this->model('SkuModel')->getAllSku();		
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('sku/create', $data);
		$this->view('templates/footer');
	}

	public function simpanSku(){		

		if( $this->model('SkuModel')->tambahSku($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/sku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/sku');
			exit;	
		}
	}

	public function updateSku(){	
		if( $this->model('SkuModel')->updateDataSku($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/sku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/sku');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('SkuModel')->deleteSku($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/sku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/sku');
			exit;	
		}
	}
}