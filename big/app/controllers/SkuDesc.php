<?php

class SkuDesc extends Controller {
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
		$data['title'] = 'Data SKU Description';
		$data['sku'] = $this->model('SkuDescModel')->getAllSKU();
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('skudesc/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('SkuDescModel')->getAllSKU();

		$json = json_encode($data);
		echo $json;
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan SKU';
		$data['sku'] = $this->model('SkuDescModel')->getAllSKU();
		$this->view('sku/lihatlaporan', $data);
	}
	public function cari()
	{
		$data['title'] = 'Data Unit';
		$data['sku'] = $this->model('SkuDescModel')->cariSku();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('sku/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'SKU Description Detail';
		//$data['item_group'] = $this->model('FridgeModel')->getItemGroup();	
		//$data['principal'] = $this->model('FridgeModel')->getItemPrincipal();
		$data['sku'] = $this->model('SkuDescModel')->getSKUJoinDesc_ById($id);
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('skudesc/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah SKU Desc';
		//$data['item_group'] = $this->model('FridgeModel')->getItemGroup();	
		//$data['principal'] = $this->model('FridgeModel')->getItemPrincipal();	
		$data['sku'] = $this->model('SkuModel')->getAllSku();		
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('skudesc/create', $data);
		$this->view('templates/footer');
	}

	public function simpanSKU(){		

		$id = $this->model('SkuModel')->getSkuIdByCode($_POST['item_code']);
		$_POST['id'] = $id['id'];

		if( $this->model('SkuDescModel')->tambahSKU($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/SkuDesc');
			exit;			
		}else{
            unlink($target);
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/SkuDesc');
			exit;	
		}
	}

	public function updateSKU(){	
		if( $this->model('SkuDescModel')->updateDataSKU($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/SkuDesc');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/SkuDesc');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('SkuDescModel')->deleteFridge($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/SkuDesc');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/SkuDesc');
			exit;	
		}
	}
}