<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SellingOut extends Controller {
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
		$data['title'] = 'Selling Out';

		if(isset($_POST['by_month']))
		{
			$data['by_month'] = $_POST['by_month'];
		}else
		{
			$data['by_month'] = date('m');
		}
		if(isset($_POST['by_year']))
		{
			$data['by_year'] = $_POST['by_year'];
		}else
		{
			$data['by_year'] = date('Y');
		}

		$data['sellingout'] = $this->model('SellingOutModel')->getAllSellingout();
	
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingout/index', $data);
		$this->view('templates/footer');

		//@fopen("restart_apache.now","w");
	}
	public function show()
	{
		//$data['data'] = $this->model('SellingOutModel')->getAllSellingout();

		$json = json_encode($data);

		echo $json;
	}
	public function show2()
	{
		//$sql="SELECT * FROM selling_out";
		$query=$this->model('SellingOutModel')->getAllSellingout();

		//data array
		$array=array();

		$array=$query;
		
		//mengubah data array menjadi json
		echo '<pre>'; 
			print_r($array);
		echo '<pre>';
	}

	public function report()
	{
		$data['title'] = 'Report Selling Out';
		$data['sellingout'] = $this->model('SellingOutModel')->getAllSellingout();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingout/report', $data);
		$this->view('templates/footer');
	}

	public function lihatlaporan()
	{
		$data['title'] = 'Selling In Report';
		$data['sellingout'] = $this->model('SellingOutModel')->getAllSellingout();
		$this->view('sellingout/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['sellingout'] = $this->model('SellingOutModel')->getAllSellingout();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN Selling In',0,1,'C');
			 
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
			
			$pdf->Output('D', 'Laporan Selling In.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Selling In';
		$data['sellingout'] = $this->model('SellingOutModel')->cariSellingout();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingout/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Edit Selling In';
		$data['sellingout'] = $this->model('SellingOutModel')->getSellingoutById($id);
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingout/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Selling In';		
		$data['sellingout'] = $this->model('SellingOutModel')->getAllSellingout();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingout/create', $data);
		$this->view('templates/footer');
	}

	public function simpanSellingOut(){		

		if( $this->model('SellingOutModel')->tambahSellingout($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/SellingOut');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/SellingOut');
			exit;	
		}
	}

	public function updateSellingOut(){	
		if( $this->model('SellingOutModel')->updateDataSellingout($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/SellingOut');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/SellingOut');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('SellingOutModel')->deleteSellingout($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/SellingOut');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/SellingOut');
			exit;	
		}
	}

	public function importcsv(){
        if(isset($_POST['save']))
        {
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");
            $c = 0;

            while(($filesop = fgetcsv($handle, 1000, ";")) !== false)
            {
                $dateInput = explode('/',$filesop[9]);
				//var_dump($dateInput);
                $sqlDate = $dateInput[2].'-'.$dateInput[1].'-'.$dateInput[0];

                $data = array(
                    'id'=> null,
					'cust_code' => str_replace("'", "`",$filesop[0]),
                    'cust_name' => str_replace("'", "`",$filesop[1]),
					'alamat' => str_replace("'", "`",$filesop[2]),
					'outlet_type' => str_replace("'", "`",$filesop[3]),
					'item_code' => $filesop[4],
                    'item_name' => str_replace("'", "`",$filesop[5]),
					'qty' => $filesop[6],
					'value_exc' => str_replace(".", "", $filesop[7]),
					'value_inc' => str_replace(".", "", $filesop[8]),
                    'tanggal' => $sqlDate,
                    'invoice' => $filesop[10],
					'inv_status' => $filesop[11],
					'kode_dist' => $filesop[12],
					'nama_dist' => str_replace("'", "`",$filesop[13]),
                    'principal' => str_replace("'", "`",$filesop[14]),
					'pic' => str_replace("'", "`",$filesop[15]),
                    'area' => str_replace("'", "`",$filesop[16]),
					'region' => str_replace("'", "`",$filesop[17]),
                    'item_group' => str_replace("'", "`",$filesop[18])
                );
                
                if($c<>0){
                    $this->model('SellingOutModel')->tambahSellingout($data);
                }
                $c = $c + 1;
            }
            Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/SellingOut');
			exit;
        }else{
            Flasher::setMessage('Gagal','ditambahkan','danger');
            header('location: '. base_url . '/SellingOut');
            exit;	
        }
	}

	public function importExcel()
    {
		if(isset($_POST['save']))
        {
			$all_files = glob('app/upload/temp/*');

			foreach ($all_files as $file) {
				if (is_file($file))
				unlink($file); // hapus file
			}

			$tmp_name = $_FILES['file']['tmp_name'];
			$target = "app/upload/temp/".basename($_FILES['file']['name']);
			$size = $_FILES['file']['size'];

			if ($size > 1048576)
			{
				Flasher::setMessage('ERROR','Max ukuran file excel 1 MB!!!','danger');
				header('location: '. base_url . '/SellingOut');
				exit();
			}

			move_uploaded_file($tmp_name, $target);

			$arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
            if ('csv' == $extension) 
			{
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } 
			elseif ('xls' == $extension) 
			{
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } 
			else 
			{
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $objPHPExcel = $reader->load($target);
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

			if ($highestRow < 2)
			{
				unlink($target);
				Flasher::setMessage('ERROR',$highestRow.'File Excel Kosong!!!','danger');
				header('location: '. base_url . '/SellingOut');
				exit();
			}

			// $qty_item = 0;
			// $price_exc = 0;
			// $value_exc = 0;
			// $value_inc = 0;

			for ($row = 2; $row <= $highestRow; $row++) //  Read a row of data into an array 
			{                                  
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );

				$sqlDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rowData[0][9])->format('Y-m-d');
				//$sqlDate = $rowData[0][9];

				$price = array(
					'item_code' => $rowData[0][4],
					'tanggal' => $sqlDate
				);

				$qty_item = 0;
				$price_exc = 0;
				$value_exc = 0;
				$value_inc = 0;

				$data['price'] = $this->model('PriceModel')->getPriceByItem($price);
				if (isset($data['price']))
				{
					$qty_item = $rowData[0][6];
					foreach ($data['price'] as $rows1):
						$price_exc = $rows1['price_exc'];
					endforeach;
					
				}

				if($price_exc === 0)
				{
					$value_exc = $rowData[0][7];
					$value_inc = $rowData[0][8];
				}
				else
				{
					$value_exc = $qty_item * $price_exc;
					$value_inc = $value_exc * 1.1;
				}

				

				$data1 = array(
					'id'=> null,
					'cust_code' => str_replace("'", "`",$rowData[0][0]),
					'cust_name' => str_replace("'", "`",$rowData[0][1]),
					'alamat' => str_replace("'", "`",$rowData[0][2]),
					'outlet_type' => str_replace("'", "`",$rowData[0][3]),
					'item_code' => $rowData[0][4],
					'item_name' => str_replace("'", "`",$rowData[0][5]),
					'qty' => $rowData[0][6],
					'value_exc' => $value_exc,
					'value_inc' => $value_inc,
					'tanggal' => $sqlDate,
					'invoice' => $rowData[0][10],
					'inv_status' => $rowData[0][11],
					'kode_dist' => $rowData[0][12],
					'nama_dist' => str_replace("'", "`",$rowData[0][13]),
					'principal' => str_replace("'", "`",$rowData[0][14]),
					'asm' => str_replace("'", "`",$rowData[0][15]),
					'area' => str_replace("'", "`",$rowData[0][16]),
					'region' => str_replace("'", "`",$rowData[0][17]),
					'item_group' => str_replace("'", "`",$rowData[0][18]),
					'salesman' => str_replace("'", "`",$rowData[0][19]),
					'create_by' => $_SESSION['username']
				);

				if ($data1['cust_code'] === "#N/A" or $data1['cust_code'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "KODE CUSTOMER" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['cust_name'] === "#N/A" or $data1['cust_name'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "NAMA CUSTOMER" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['outlet_type'] === "#N/A" or $data1['outlet_type'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "TIPE OUTLET" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}


				if ($data1['item_code'] === "#N/A" or $data1['item_code'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "KODE ITEM" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['item_name'] === "#N/A" or $data1['item_name'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "NAMA ITEM" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['qty'] === "#N/A" or $data1['qty'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "QTY" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['value_exc'] === "#N/A" or $data1['value_exc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Value Exc" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['value_inc'] === "#N/A" or $data1['value_inc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Value Inc" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['tanggal'] === "#N/A" or $data1['tanggal'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "TANGGAL" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				// $selisih_bulan = (int)date("m") - (int)substr($data1['tanggal'],5,2);

				// if ( $selisih_bulan > 2) 
				// {
				// 	Flasher::setMessage('ERROR','tanggal "SALES" lebih dari 2 bulan yang lalu. Pada baris ke ' .$row. '!!!','danger');
				// 	header('location: '. base_url . '/SellingOut');
				// 	exit();
				// }

				if ($data1['invoice'] === "#N/A" or $data1['invoice'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "NO INVOICE" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['inv_status'] === "#N/A" or $data1['inv_status'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "STATUS INVOICE" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['kode_dist'] === "#N/A" or $data1['kode_dist'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "KODE DISTRIBUTOR" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['nama_dist'] === "#N/A" or $data1['nama_dist'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "NAMA DISTRIBUTOR" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['principal'] === "#N/A" or $data1['principal'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "PRINCIPAL" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['asm'] === "#N/A" or $data1['asm'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "PIC" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['area'] === "#N/A" or $data1['area'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "AREA" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['region'] === "#N/A" or $data1['region'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "REGION" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

				if ($data1['item_group'] === "#N/A" or $data1['item_group'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "GROUP SKU" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingOut');
					exit();
				}

			}

            for ($row = 2; $row <= $highestRow; $row++) //  Read a row of data into an array 
			{                                  
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );

				$sqlDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rowData[0][9])->format('Y-m-d');
				//$sqlDate = $rowData[0][9];

				$price = array(
					'item_code' => $rowData[0][4],
					'tanggal' => $sqlDate
				);

				$qty_item = 0;
				$price_exc = 0;
				$value_exc = 0;
				$value_inc = 0;

				$data['price'] = $this->model('PriceModel')->getPriceByItem($price);
				if (isset($data['price']))
				{
					$qty_item = $rowData[0][6];
					foreach ($data['price'] as $rows1):
						$price_exc = $rows1['price_exc'];
					endforeach;
					/* $value_exc = $qty_item * $price_exc;
					$value_inc = $value_exc * 1.1; */
				}

				if($price_exc === 0)
				{
					$price_exc = $rowData[0][7];
					$value_inc = $rowData[0][8];
				}
				else
				{
					$value_exc = $qty_item * $price_exc;
					$value_inc = $value_exc * 1.1;
				}
				

				$data1 = array(
					'id'=> null,
					'cust_code' => str_replace("'", "`",$rowData[0][0]),
					'cust_name' => str_replace("'", "`",$rowData[0][1]),
					'alamat' => str_replace("'", "`",$rowData[0][2]),
					'outlet_type' => str_replace("'", "`",$rowData[0][3]),
					'item_code' => $rowData[0][4],
					'item_name' => str_replace("'", "`",$rowData[0][5]),
					'qty' => $rowData[0][6],
					'value_exc' => $value_exc,
					'value_inc' => $value_inc,
					'tanggal' => $sqlDate,
					'invoice' => $rowData[0][10],
					'inv_status' => $rowData[0][11],
					'kode_dist' => $rowData[0][12],
					'nama_dist' => str_replace("'", "`",$rowData[0][13]),
					'principal' => str_replace("'", "`",$rowData[0][14]),
					'asm' => str_replace("'", "`",$rowData[0][15]),
					'area' => str_replace("'", "`",$rowData[0][16]),
					'region' => str_replace("'", "`",$rowData[0][17]),
					'item_group' => str_replace("'", "`",$rowData[0][18]),
					'salesman' => str_replace("'", "`",$rowData[0][19]),
					'create_by' => $_SESSION['username']
				);

				//====================================================================================================================
				// Untuk mencegah double input (Indra : dilost aja)

				/* 
				
				$update_count = 0;
				$save_count = 0;
				$invoice = '';

				$invoice='';

				$data['sellingout'] = $this->model('SellingOutModel')->getDuplicateSellingout($data1['cust_code'], $data1['outlet_type'], $data1['item_code'], $data1['qty'], $data1['value_exc'], $data1['value_inc'], $data1['tanggal'], $data1['invoice'], $data1['inv_status'], $data1['kode_dist']);

				foreach ($data['sellingout'] as $row) :
					$invoice=$row['invoice'];
				endforeach;

				if($invoice != '')
				{
					$this->model('SellingOutModel')->updateDataSellingout($data1);
					$update_count++;
				}
				else
				{
					$this->model('SellingOutModel')->tambahSellingout($data1);
					$save_count++;
				} */

				//========================================================================================================================

				$this->model('SellingOutModel')->tambahSellingout($data1);
			}

			unlink($target);

			Flasher::setMessage('Berhasil','diupload','success');
			header('location: '. base_url . '/SellingOut');
			exit;
		}
		else
		{
			unlink($target);

            Flasher::setMessage('Gagal','diupload','danger');
            header('location: '. base_url . '/SellingOut');
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
			
				$qty_item = 0;
				$price_exc = 0;
				$value_exc = 0;
				$value_inc = 0;

				// $price = array(
				// 	'item_code' => $row['KODE_ITEM_BIG'],
				// 	'tanggal' => $row['TANGGAL_INV'],
				// );

				// $data['price'] = $this->model('PriceModel')->getPriceByItem($price);
				// if (isset($data['price']))
				// {
				// 	$qty_item = $row['QTY'];
				// 	foreach ($data['price'] as $rows1):
				// 		$price_exc = $rows1['price_exc'];
				// 	endforeach;
				// }

				// if($price_exc === 0)
				// {
				// 	$price_exc = $row['VALUE_EXC'];
				// 	$value_inc = $row['VALUE_INC'];
				// }
				// else
				// {
				// 	$value_exc = $qty_item * $price_exc;
				// 	$value_inc = $value_exc * 1.1;
				// }

				$qty_item = $row['QTY'];
	
				$value_exc = (float)$row['VALUE_EXC'];
				$value_inc = (float)$row['VALUE_INC'];

				array_push($data1, array(
					'id'=> null,
					'cust_code' => str_replace("'", "`",$row['KODE_CUST_BIG']),
					'big_code' => str_replace("'", "`",$row['BIG_CODE']),
					'cust_name' => str_replace("'", "`",$row['NAMA_CUST_BIG']),
					'alamat' => str_replace("'", "`",$row['ALAMAT']),
					'outlet_type' => str_replace("'", "`",$row['TYPE_OUTLET_BIG']),
					'item_code' => str_replace("'", "`",$row['KODE_ITEM_BIG']),
					'item_name' => str_replace("'", "`",$row['NAMA_ITEM_BIG']),
					'qty' => $qty_item,
					'value_exc' => $value_exc,
					'value_inc' => $value_inc,
					'tanggal' => $row['TANGGAL_INV'],
					'invoice' => str_replace("'", "`",$row['NOMER_INV']),
					'inv_status' => str_replace("'", "`",$row['STATUS']),
					'kode_dist' => str_replace("'", "`",$row['KODE_DIST']),
					'nama_dist' => str_replace("'", "`",$row['NAMA_DIST']),
					'principal' => str_replace("'", "`",$row['PRINCIPAL']),
					'asm' => str_replace("'", "`",$row['PIC']),
					'area' => str_replace("'", "`",$row['AREA']),
					'region' => str_replace("'", "`",$row['REGION']),
					'item_group' => str_replace("'", "`",$row['GROUP_SKU']),
					'salesman' => str_replace("'", "`",$row['SALESMAN']),
					'create_by' => $_SESSION['username']
				));
				
			}

			$this->model('SellingOutModel')->uploadSellingOut($data1);
			//$this->model('OutletModel')->uploadDataOutlet($json);
		// }
    }

}