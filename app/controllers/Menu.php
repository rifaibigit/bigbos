<?php

class Menu extends Controller {
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
		$data['title'] = 'Data Menu';
		$data['Menu'] = $this->model('MenuModel')->getAllMenu();

		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('menu/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('MenuModel')->getAllMenu();

		$json = json_encode($data);
		echo $json;
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Menu';
		$data['menu'] = $this->model('MenuModel')->getAllMenu();	
		$this->view('menu/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['Menu'] = $this->model('MenuModel')->getAllMenu();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN Menu',0,1,'C');
			 
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
			 
			foreach($data['Menu'] as $row) {
			    $pdf->Cell(85,6,$row['island'],1);
			    $pdf->Cell(30,6,$row['Menu'],1);
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Menu.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Menu';
		$data['menu'] = $this->model('MenuModel')->cariMenu();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('menu/index', $data);
		$this->view('templates/footer');
	}

	public function edit($menu_id){

		$data['title'] = 'Detail Menu';
		$data['menu'] = $this->model('MenuModel')->getMenuById($menu_id);
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('menu/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Menu';		
		$data['menu'] = $this->model('MenuModel')->getAllMenu();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('menu/create', $data);
		$this->view('templates/footer');
	}

	public function simpanMenu(){		

		if( $this->model('MenuModel')->tambahMenu($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Menu');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Menu');
			exit;	
		}
	}

	public function updateMenu(){	
		if( $this->model('MenuModel')->updateDataMenu($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Menu');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Menu');
			exit;	
		}
	}

	public function hapus($menu_id){
		if( $this->model('MenuModel')->deleteMenu($menu_id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Menu');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Menu');
			exit;	
		}
	}
}