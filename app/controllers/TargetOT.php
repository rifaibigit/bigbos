<?php

class TargetOT extends Controller {
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
		$data['title'] = 'Target Outlet';

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

		$data['TargetOT'] = $this->model('TargetOTModel')->getAllTarget();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('target_ot/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
        if(isset($_POST['by_month']))
		{
			$data['by_month'] = $_POST['by_month'];
		}else
		{
			$data['by_month'] = date('m');
		}

		$data['data'] = $this->model('TargetOTModel')->getAllTarget();

        //Flasher::setMessage('Berhasil',$data['by_month'],'success');

		$json = json_encode($data);
		echo $json;
	}

	// public function cari()
	// {
	// 	$data['title'] = 'Selling In';
	// 	$data['sellingout'] = $this->model('TargetSLModel')->cariSellingout();
	// 	$data['key'] = $_POST['key'];
	// 	$this->template('header', $data);
	// 	$this->template('sidebar', $data);
	// 	$this->view('sellingout/index', $data);
	// 	$this->view('templates/footer');
	// }

	// public function edit($id){

	// 	$data['title'] = 'Edit Selling In';
	// 	$data['sellingout'] = $this->model('TargetSLModel')->getSellingoutById($id);
	// 	$this->template('header', $data);
	// 	$this->template('sidebar', $data);
	// 	$this->view('sellingout/edit', $data);
	// 	$this->view('templates/footer');
	// }

	// public function tambah(){
	// 	$data['title'] = 'Tambah Selling In';		
	// 	$data['sellingout'] = $this->model('TargetSLModel')->getAllTarget();		
	// 	$this->template('header', $data);
	// 	$this->template('sidebar', $data);
	// 	$this->view('sellingout/create', $data);
	// 	$this->view('templates/footer');
	// }

	public function importExcel()
    {
        if(isset($_POST['save']))
        {
			$tmp_name = $_FILES['file']['tmp_name'];
			$target = "app/upload/temp/".basename($_FILES['file']['name']);
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

			$update_count = 0;
			$save_count = 0;
			$big_code='';

			if ($highestRow < 3)
			{
				Flasher::setMessage('ERROR','File Excel Kosong!!!','danger');
				header('location: '. base_url . '/TargetSL');
				exit();
			}

            for ($row = 3; $row <= $highestRow; $row++) //  Read a row of data into an array 
			{                                  
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );

				$data1 = array(
                    'id'=> null,
					'tahun' => str_replace("'", "`",$rowData[0][1]),
                    'bulan' => str_replace("'", "`",$rowData[0][2]),
					'big_code' => str_replace("'", "`",$rowData[0][3]),
                    'qty' => (float)$rowData[0][4],
					'value' => (float)$rowData[0][5],
					'create_by' => $_SESSION['username'],
					'edit_by' => $_SESSION['username']
                );

				if ($data1['tahun'] === "#N/A" or $data1['tahun'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "TAHUN" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/TargetOT');
					exit();
				}

				if ($data1['bulan'] === "#N/A" or $data1['bulan'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "BULAN" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/TargetOT');
					exit();
				}

				$selisih_bulan = (int)date("m") - (int)$data1['bulan'];

				if ( $selisih_bulan > 2) 
				{
					Flasher::setMessage('ERROR','data "BULAN" lebih dari 2 bulan yang lalu. Pada baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/TargetOT');
					exit();
				}

				if ($data1['big_code'] === "#N/A" or $data1['big_code'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "BIG Code" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/TargetOT');
					exit();
				}

				if ($data1['qty'] === "#N/A" or $data1['qty'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "QTY" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/TargetOT');
					exit();
				}

				if ($data1['value'] === "#N/A" or $data1['value'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "VALUE" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/TargetOT');
					exit();
				}


				$data['target'] = $this->model('TargetOTModel')->getDuplicateTargetOT($data1);

				foreach ($data['target'] as $rrow) :
					$big_code=$rrow['big_code'];
				endforeach;

				if($big_code != '')
				{
					$this->model('TargetSLModel')->updateTarget($data1);
					$update_count++;
				}
				else
				{
					$this->model('TargetSLModel')->tambahTarget($data1);
					$save_count++;
				}

				//$this->model('SellingOutModel')->tambahSellingout($data1);
			}

			unlink($target);

			//Flasher::setMessage('Berhasil',$highestRow,'success');
			Flasher::setMessage('Berhasil','diupload. '.$update_count.' baris data lama, '.$save_count.' baris data baru','success');
			//Flasher::setMessage('Berhasil','diupload','success');
			header('location: '. base_url . '/TargetOT');
			exit;
		}
		else
		{
            Flasher::setMessage('Gagal','diupload','danger');
            header('location: '. base_url . '/TargetOT');
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
					'tahun' => str_replace("'", "`",$row['TAHUN']),
					'bulan' => (int)str_replace("'", "`",$row['BULAN']),
					'big_code' => str_replace("'", "`",$row['BIG_CODE']),
					'qty' => str_replace("'", "`",$row['QTY']),
					'value' => str_replace("'", "`",$row['VALUE']),
					'create_by' => $_SESSION['username'],
					'edit_by' => $_SESSION['username']
				));
				
			}

			$this->model('TargetOTModel')->uploadTargetOT($data1);
			//$this->model('OutletModel')->uploadDataOutlet($json);
		// }
    }

}