<?php

class SellingIn extends Controller {
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
		$data['title'] = 'Selling In';

		/* $data['nama'] = $_SESSION['nama'];
		$data['username'] = $_SESSION['username'];
		$username = $_SESSION['username']; */

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

		$data['sellingin'] = $this->model('SellingInModel')->getAllSellingin();
		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingin/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('SellingInModel')->getAllSellingin();

		$json = json_encode($data);
		echo $json;
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Selling In Report';
		$data['sellingin'] = $this->model('SellingInModel')->getAllSellingin();
		$this->view('sellingin/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['sellingin'] = $this->model('SellingInModel')->getAllSellingin();

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
		$data['sellingin'] = $this->model('SellingInModel')->cariSellingin();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingin/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Edit Selling In';
		$data['sellingin'] = $this->model('SellingInModel')->getSellinginById($id);
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingin/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Selling In';		
		$data['sellingin'] = $this->model('SellingInModel')->getAllSellingin();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('sellingin/create', $data);
		$this->view('templates/footer');
	}

	public function simpanSellingIn(){		

		if( $this->model('SellingInModel')->tambahSellingin($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/SellingIn');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/SellingIn');
			exit;	
		}
	}

	public function updateSellingIn(){	
		if( $this->model('SellingInModel')->updateDataSellingin($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/SellingIn');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/SellingIn');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('SellingInModel')->deleteSellingin($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/SellingIn');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/SellingIn');
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
				header('location: '. base_url . '/SellingIn');
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
				Flasher::setMessage('ERROR','File Excel Kosong!!!','danger');
				header('location: '. base_url . '/SellingIn');
				exit();
			}

			//$is_distributor = false;
			$qty = 0;
			$diskon = 0;
			$sale_price = 0;
			$value_exc = 0;

			for ($row = 2; $row <= $highestRow; $row++) //  Read a row of data into an array 
			{                                  
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );

				$cust_code = str_replace("'", "`",$rowData[0][3]);
				

				$sqlDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rowData[0][0])->format('Y-m-d');

				$price = array(
					'item_code' => $rowData[0][5],
					'tanggal' => $sqlDate
				);

				if($this->model('DistributorModel')->getDistByCode($cust_code) > 0)
				{
					$data['price'] = $this->model('PriceModel')->getDistPriceByItem($price);
					foreach ($data['price'] as $rows1):
						$sale_price = $rows1['dist_exc'];
					endforeach;
				}
				else
				{
					$data['price'] = $this->model('PriceModel')->getMTPriceByItem($price);
					foreach ($data['price'] as $rows2):
						$sale_price = $rows2['mt_exc'];
					endforeach;
				}

				//echo $sale_price;

				$qty = $rowData[0][7];
				$diskon = $rowData[0][9];

				if($sale_price == 0)
				{
					$sale_price = $rowData[0][8];
				}

				if($qty <> 0)
				{
					$value_exc = ($qty * $sale_price) - $diskon;
				}
				else
				{
					$diskon = 0;
					$value_exc = ($qty * $sale_price);
				}

				

				//var_dump($rowData[0][0]);

				$data1 = array(
					'id'=> null,
                    'tanggal' => $sqlDate,
                    'invoice' => $rowData[0][1],
                    'principal' => str_replace("'", "`",$rowData[0][2]),
                    'cust_code' => str_replace("'", "`",$rowData[0][3]),
                    'cust_name' => str_replace("'", "`",$rowData[0][4]),
                    'item_code' => $rowData[0][5],
                    'item_name' => str_replace("'", "`",$rowData[0][6]),
                    'qty' => $qty,
                    'sale_price' => $sale_price,
					'total_diskon' => $diskon,
                    'value_exc' => $value_exc,
					'value_inc' => $value_exc * 1.1,
					'create_by' => $_SESSION['username']
				);

				if ($data1['tanggal'] === "#N/A" or $data1['tanggal'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "TANGGAL" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				// $selisih_bulan = (int)date("m") - (int)substr($data1['tanggal'],5,2);

				// if ( $selisih_bulan > 2) 
				// {
				// 	Flasher::setMessage('ERROR','tanggal "SALES" lebih dari 2 bulan yang lalu. Pada baris ke ' .$row. '!!!','danger');
				// 	header('location: '. base_url . '/SellingIn');
				// 	exit();
				// }

				if ($data1['invoice'] === "#N/A" or $data1['invoice'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "NO INVOICE" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['principal'] === "#N/A" or $data1['principal'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "PRINCIPAL" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['cust_code'] === "#N/A" or $data1['cust_code'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Cust Code" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['cust_name'] === "#N/A" or $data1['cust_name'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Cust Name" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['item_code'] === "#N/A" or $data1['item_code'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Item Code" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['item_name'] === "#N/A" or $data1['item_name'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Item Name" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['qty'] === "#N/A" or $data1['qty'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "QTY" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['sale_price'] === "#N/A" or $data1['sale_price'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Sale Price" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['total_diskon'] === "#N/A" or $data1['total_diskon'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Total Discount" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['value_exc'] === "#N/A" or $data1['value_exc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Value Exc" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
					exit();
				}

				if ($data1['value_inc'] === "#N/A" or $data1['value_inc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "Value Inc" di baris ke ' .$i. '!!!','danger');
					header('location: '. base_url . '/SellingIn');
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

				$cust_code = str_replace("'", "`",$rowData[0][3]);
				

				$sqlDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rowData[0][0])->format('Y-m-d');

				$price = array(
					'item_code' => $rowData[0][5],
					'tanggal' => $sqlDate
				);

				if($this->model('DistributorModel')->getDistByCode($cust_code) > 0)
				{
					$data['price'] = $this->model('PriceModel')->getDistPriceByItem($price);
					foreach ($data['price'] as $rows1):
						$sale_price = $rows1['dist_exc'];
					endforeach;
				}
				else
				{
					$data['price'] = $this->model('PriceModel')->getMTPriceByItem($price);
					foreach ($data['price'] as $rows1):
						$sale_price = $rows1['mt_exc'];
					endforeach;
				}

				//echo $sale_price;

				$qty = $rowData[0][7];
				$diskon = $rowData[0][9];

				if($sale_price == 0)
				{
					$sale_price = $rowData[0][8];
				}

				if($qty <> 0)
				{
					$value_exc = ($qty * $sale_price) - $diskon;
				}
				else
				{
					$diskon = 0;
					$value_exc = ($qty * $sale_price);
				}

				

				//var_dump($rowData[0][0]);

				$data1 = array(
					'id'=> null,
                    'tanggal' => $sqlDate,
                    'invoice' => $rowData[0][1],
                    'principal' => str_replace("'", "`",$rowData[0][2]),
                    'cust_code' => str_replace("'", "`",$rowData[0][3]),
                    'cust_name' => str_replace("'", "`",$rowData[0][4]),
                    'item_code' => $rowData[0][5],
                    'item_name' => str_replace("'", "`",$rowData[0][6]),
                    'qty' => $qty,
                    'sale_price' => $sale_price,
					'total_diskon' => $diskon,
                    'value_exc' => $value_exc,
					'value_inc' => $value_exc * 1.1,
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

				$this->model('SellingInModel')->tambahSellingin($data1);
			}

			unlink($target);

			Flasher::setMessage('Berhasil','diupload','success');
			header('location: '. base_url . '/SellingIn');
			exit;
		}
		else
		{
            Flasher::setMessage('Gagal','diupload','danger');
            header('location: '. base_url . '/SellingIn');
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
			
				// $cust_code = str_replace("'", "`",$row['CUST_CODE']);
				// $price = array(
				// 	'item_code' => str_replace("'", "`",$row['ITEM_CODE']),
				// 	'tanggal' => $row['TANGGAL']
				// );

				// if($this->model('DistributorModel')->getDistByCode($cust_code) > 0)
				// {
				// 	$data['price'] = $this->model('PriceModel')->getDistPriceByItem($price);
				// 	foreach ($data['price'] as $rows1):
				// 		$sale_price = (float)$rows1['dist_exc'];
				// 	endforeach;
				// }
				// else
				// {
				// 	$data['price'] = $this->model('PriceModel')->getMTPriceByItem($price);
				// 	foreach ($data['price'] as $rows1):
				// 		$sale_price = (float)$rows1['mt_exc'];
				// 	endforeach;
				// }

				// if($sale_price == 0)
				// {
				// 	$sale_price = (float)$row['SALE_PRICE'];
				// }

				// if($qty <> 0)
				// {
				// 	$value_exc = ($qty * $sale_price) - $diskon;
				// }
				// else
				// {
				// 	$diskon = 0;
				// 	$value_exc = ($qty * $sale_price);
				// }

				// $value_inc = $value_exc * 1.1;

				$qty = $row['QTY'];
				
				$diskon = (float)$row['TOTAL_DISCOUNT'];
				$sale_price = (float)$row['SALE_PRICE'];
				$value_exc = (float)$row['VALUE_EXC'];
				$value_inc = (float)$row['VALUE_INC'];

				array_push($data1, array(
					'id'=> null,
                    'tanggal' => $row['TANGGAL'],
                    'invoice' => str_replace("'", "`",$row['INVOICE']),
                    'principal' => str_replace("'", "`",$row['PRINCIPAL']),
                    'cust_code' => str_replace("'", "`",$row['CUST_CODE']),
                    'cust_name' => str_replace("'", "`",$row['CUST_NAME']),
                    'item_code' => str_replace("'", "`",$row['ITEM_CODE']),
                    'item_name' => str_replace("'", "`",$row['ITEM_NAME']),
                    'qty' => $qty,
                    'sale_price' => $sale_price,
					'total_diskon' => $diskon,
                    'value_exc' => $value_exc,
					'value_inc' => $value_inc,
					'create_by' => $_SESSION['username']
				));
				
			}

			$this->model('SellingInModel')->uploadSellingIn($data1);
			//$this->model('OutletModel')->uploadDataOutlet($json);
		// }
    }

}