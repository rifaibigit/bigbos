<?php

class Distributor extends Controller {
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
		$data['title'] = 'Data Distributor';
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('distributor/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('DistributorModel')->getAllDist();

		$json = json_encode($data);
		echo $json;
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Distributor';
		$data['distributor'] = $this->model('DistributorModel')->getAllDist();
		$this->view('distributor/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['distributor'] = $this->model('DistributorModel')->getAllDist();

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
		$data['title'] = 'Data Distributor';
		$data['distributor'] = $this->model('DistributorModel')->cariDist();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('distributor/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Distributor';
		$data['area'] = $this->model('AreaModel')->getAllArea();
		$data['distributor'] = $this->model('DistributorModel')->getDistById($id);
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('distributor/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Distributor';		
		$data['area'] = $this->model('AreaModel')->getAllArea();
		// $data['distributor'] = $this->model('DistributorModel')->getAllDist();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('distributor/create', $data);
		$this->view('templates/footer');
	}

	public function simpanDist(){		

		if( $this->model('DistributorModel')->tambahDist($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Distributor');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Distributor');
			exit;	
		}
	}

	public function updateDist(){	
		if( $this->model('DistributorModel')->updateDataDist($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Distributor');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Distributor');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('DistributorModel')->deleteDist($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Distributor');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Distributor');
			exit;	
		}
	}
}