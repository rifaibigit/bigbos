<?php

class Outlet extends Controller {
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
		$data['title'] = 'Data Outlet';
		//$data['outlet'] = $this->model('OutletModel')->getAllOutlet();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('outlet/index', $data);
		$this->view('templates/footer');
	}

	public function outletVisit()
	{
		$data['title'] = 'Data Outlet Visitasi';
		//$data['outlet'] = $this->model('OutletModel')->getAllOutlet();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('outlet/outlet_visit', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('OutletModel')->getAllOutlet();

		$json = json_encode($data);
		echo $json;
	}

	public function show2()
	{
		$data['data'] = $this->model('OutletModel')->getAllOutlet2();

		$json = json_encode($data);
		echo $json;
	}

	public function showVisit()
	{
		$data['data'] = $this->model('OutletModel')->getOutletVisit();

		$json = json_encode($data);
		echo $json;
	}

	public function show_byOutletCode($code)
	{
		$code = $_POST['id'];
		$data['data'] = $this->model('OutletModel')->getOutletById($code);

		$json = json_encode($data);
		echo $json;
	}

	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Outlet';
		$data['outlet'] = $this->model('OutletModel')->getAllOutlet();
		$this->view('outlet/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['outlet'] = $this->model('OutletModel')->getAllOutlet();

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
			 
			foreach($data['outlet'] as $row) {
			    $pdf->Cell(85,6,$row['island'],1);
			    $pdf->Cell(30,6,$row['area'],1);
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Outlet.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Outlet';
		$data['outlet'] = $this->model('OutletModel')->cariOutlet();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('outlet/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Outlet';
		$data['area'] = $this->model('AreaModel')->getAllArea();
		$data['outlet'] = $this->model('OutletModel')->getOutletById($id);
		$data['outlet_type'] = $this->model('ChannelModel')->getOutletType();
		$data['distributor'] = $this->model('DistributorModel')->getAllDist();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('outlet/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Outlet';	
		$data['area'] = $this->model('AreaModel')->getAllArea();	
		$data['outlet_type'] = $this->model('ChannelModel')->getOutletType();
		$data['distributor'] = $this->model('DistributorModel')->getAllDist();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('outlet/create', $data);
		$this->view('templates/footer');
	}

	public function simpanOutlet(){		

		if( $this->model('OutletModel')->tambahOutlet($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/Outlet');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/Outlet');
			exit;	
		}
	}

	public function updateOutlet(){	
		if( $this->model('OutletModel')->updateDataOutlet($_POST) > 0 ) {
			// Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/Outlet');
			exit;			
		}else{
			// Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/Outlet');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('OutletModel')->deleteOutlet($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/Outlet');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/Outlet');
			exit;	
		}
	}

	public function importExcel2()
    {
        // if(isset($_POST['save']))
        // {
			$json = json_decode($_POST['json'],true);

			$data1 = array();

			foreach($json as $row)
			{
			
				array_push($data1, array(
					'id'=> null,
					'area' => str_replace("'", "`",$row['AREA']),
					'outlet_code' => str_replace("'", "`",$row['CUST_CODE']),
					'outlet_name' => str_replace("'", "`",$row['CUST_NAME']),
					'alamat' => str_replace("'", "`",$row['ADDRESS']),
					'outlet_type' => str_replace("'", "`",$row['OUTLET_TYPE']),
					'total_outlet' => str_replace("'", "`",$row['TOTAL_OUTLET']),
					'dist_code' => str_replace("'", "`",$row['DIST_CODE']),
				));
				
			}

			$this->model('OutletModel')->uploadDataOutlet($data1);
			//$this->model('OutletModel')->uploadDataOutlet($json);
		// }
    }

	public function uploadNOO()
    {
        // if(isset($_POST['save']))
        // {
			$json = json_decode($_POST['json'],true);

			$data1 = array();

			foreach($json as $row)
			{
			
				array_push($data1, array(
					'id'=> null,
					'outlet_code' => str_replace("'", "`",$row['CUST_CODE']),
					'outlet_name' => str_replace("'", "`",$row['CUST_NAME']),
					'alamat' => str_replace("'", "`",$row['ADDRESS']),
					'area' => str_replace("'", "`",$row['AREA']),
					'outlet_type' => str_replace("'", "`",$row['OUTLET_TYPE']),
					'total_outlet' => str_replace("'", "`",$row['TOTAL_OUTLET']),
					'dist_code' => str_replace("'", "`",$row['DIST_CODE']),
					'register_date' => str_replace("'", "`",$row['REGISTER_DATE']),
				));
				
			}

			$this->model('OutletModel')->uploadNOO($data1);
			//$this->model('OutletModel')->uploadDataOutlet($json);
		// }
    }

	public function uploadOutlet()
    {
        // if(isset($_POST['save']))
        // {
			$json = json_decode($_POST['json'],true);

			$data1 = array();

			foreach($json as $row)
			{
			
				array_push($data1, array(
					'id'=> null,
					'big_code' => str_replace("'", "`",$row['BIG_CODE']),
					'outlet_code' => str_replace("'", "`",$row['CUST_CODE']),
					'outlet_name' => str_replace("'", "`",$row['CUST_NAME']),
					'alamat' => str_replace("'", "`",$row['ADDRESS']),
					'area' => str_replace("'", "`",$row['AREA']),
					'outlet_type' => str_replace("'", "`",$row['OUTLET_TYPE']),
					'total_outlet' => str_replace("'", "`",$row['TOTAL_OUTLET']),
					'dist_code' => str_replace("'", "`",$row['DIST_CODE']),
					'register_date' => str_replace("'", "`",$row['REGISTER_DATE']),
				));
				
			}

			$this->model('OutletModel')->uploadOutlet($data1);
			//$this->model('OutletModel')->uploadDataOutlet($json);
		// }
    }
}