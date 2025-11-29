<?php

class SkuGroup extends Controller {
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
		$data['title'] = 'Data SKU Group';
		$data['sku'] = $this->model('SkuGroupModel')->getAllSkuGroup();
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('skugroup/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('SkuGroupModel')->getAllSkuGroup();

		$json = json_encode($data);
		echo $json;
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan SKU';
		$data['sku'] = $this->model('SkuGroupModel')->getAllSkuGroup();
		$this->view('sku/lihatlaporan', $data);
	}
	public function cari()
	{
		$data['title'] = 'Data SKU Group';
		$data['sku'] = $this->model('SkuGroupModel')->cariSku();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('sku/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail SKU Group';
		//$data['item_group'] = $this->model('SkuModel')->getItemGroup();	
		//$data['principal'] = $this->model('SkuModel')->getItemPrincipal();
		$data['sku'] = $this->model('SkuGroupModel')->getItemGroupById($id);
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('skugroup/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah SKU Group';
		// $data['item_group'] = $this->model('SkuModel')->getItemGroup();	
		// $data['principal'] = $this->model('SkuModel')->getItemPrincipal();	
		// $data['sku'] = $this->model('SkuModel')->getAllSku();		
		$this->template('header', $data);
		$this->view('templates/sidebar2');
		$this->view('skugroup/create', $data);
		$this->view('templates/footer');
	}

	public function simpanSkuGroup(){		

		if( $this->model('SkuGroupModel')->tambahSkuGroup($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/SkuGroup');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/SkuGroup');
			exit;	
		}
	}

	public function updateSkuGroup(){	
		if( $this->model('SkuGroupModel')->updateDataSkuGroup($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/SkuGroup');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/SkuGroup');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('SkuGroupModel')->deleteSkuGroup($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/SkuGroup');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/SkuGroup');
			exit;	
		}
	}
}