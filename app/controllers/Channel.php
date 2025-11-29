<?php

class Channel extends Controller {
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
		$data['title'] = 'Data Channel';
		$data['channel'] = $this->model('ChannelModel')->getAllChannel();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('channel/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('ChannelModel')->getAllChannel();

		$json = json_encode($data);
		echo $json;
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Channel';
		$data['channel'] = $this->model('ChannelModel')->getAllChannel();
		$this->view('channel/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['area'] = $this->model('AreaModel')->getAllArea();

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

	public function getOutletType($channel)
    {
        $data['data'] = $this->model('ChannelModel')->getOutletTypebyChannel($channel);

		$json = json_encode($data);
		echo $json;
    }

	public function cari()
	{
		$data['title'] = 'Data Channel';
		$data['channel'] = $this->model('ChannelModel')->cariChannel();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('channel/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Channel';
		$data['channel'] = $this->model('ChannelModel')->getChannelById($id);
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('channel/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Channel';		
		$data['channel'] = $this->model('ChannelModel')->getAllChannel();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('channel/create', $data);
		$this->view('templates/footer');
	}

	public function simpanChannel(){		

		if( $this->model('ChannelModel')->tambahChannel($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Channel');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Channel');
			exit;	
		}
	}

	public function updateChannel(){	
		if( $this->model('ChannelModel')->updateDataChannel($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Channel');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Channel');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('ChannelModel')->deleteChannel($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Channel');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Channel');
			exit;	
		}
	}
}