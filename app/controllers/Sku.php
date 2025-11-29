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
		$this->template('sidebar', $data);
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

	public function laporan()
	{
		$data['sku'] = $this->model('SkuModel')->getAllSku();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN AREA',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(85,6,'JUDUL',1);
			$pdf->Cell(30,6,'PENERBIT',1);
			$pdf->Cell(30,6,'PENGARANG',1);
			$pdf->Cell(15,6,'TAHUN',1);
			$pdf->Cell(25,6,'KATEGORI',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['area'] as $row) {
			    $pdf->Cell(85,6,$row['island'],1);
			    $pdf->Cell(30,6,$row['area'],1);
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Area.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data SKU';
		$data['sku'] = $this->model('SkuModel')->cariSku();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sku/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail SKU';
		$data['item_group'] = $this->model('SkuModel')->getGroupSKU2();
		$data['principal'] = $this->model('ReportModel')->getPrincipalIn();
		$data['sku'] = $this->model('SkuModel')->getSkuById($id);
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sku/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah SKU';
		$data['item_group'] = $this->model('SkuModel')->getGroupSKU2();	
		$data['principal'] = $this->model('ReportModel')->getPrincipalIn();	
		$data['sku'] = $this->model('SkuModel')->getAllSku();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sku/create', $data);
		$this->view('templates/footer');
	}

	public function simpanSku(){		

		if( $this->model('SkuModel')->tambahSku($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Sku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Sku');
			exit;	
		}
	}

	public function updateSku(){	
		if( $this->model('SkuModel')->updateDataSku($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Sku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Sku');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('SkuModel')->deleteSku($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Sku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Sku');
			exit;	
		}
	}
}