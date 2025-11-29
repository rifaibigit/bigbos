<?php

class RO extends Controller {
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
		$data['title'] = 'Master data RO';

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

		$data['RO'] = $this->model('ROModel')->getAllRO();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('ro/index', $data);
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

		$data['data'] = $this->model('ROModel')->getAllRO();

        //Flasher::setMessage('Berhasil',$data['by_month'],'success');

		$json = json_encode($data);
		echo $json;
	}

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
			$outlet_type='';

			if ($highestRow < 3)
			{
				Flasher::setMessage('ERROR','File Excel Kosong!!!','danger');
				header('location: '. base_url . '/RO');
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
					'principal' => str_replace("'", "`",$rowData[0][3]),
					'area' => str_replace("'", "`",$rowData[0][4]),
					'outlet_type' => $rowData[0][5],
                    'ro' => (int)$rowData[0][7],
					'create_by' => $_SESSION['username'],
					'edit_by' => $_SESSION['username']
                );

				if ($data1['tahun'] === "#N/A" or $data1['tahun'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "TAHUN" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/RO');
					exit();
				}

				if ($data1['bulan'] === "#N/A" or $data1['bulan'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "BULAN" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/RO');
					exit();
				}

				$selisih_bulan = (int)date("m") - (int)$data1['bulan'];

				if ( $selisih_bulan > 2) 
				{
					Flasher::setMessage('ERROR','data "BULAN" lebih dari 2 bulan yang lalu. Pada baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/RO');
					exit();
				}

				if ($data1['principal'] === "#N/A" or $data1['principal'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "PRINCIPAL" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/RO');
					exit();
				}

				if ($data1['area']=== "#N/A" or $data1['area'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "AREA" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/RO');
					exit();
				}

				if ($data1['outlet_type'] === "#N/A" or $data1['outlet_type'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "TIPE OUTLET" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/RO');
					exit();
				}

				if ($data1['ro'] === "#N/A" or $data1['ro'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "RO" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/RO');
					exit();
				}


				$data['ro'] = $this->model('ROModel')->getDuplicateRO($data1);

				foreach ($data['ro'] as $rrow) :
					$outlet_type=$rrow['outlet_type'];
				endforeach;

				if($outlet_type != '')
				{
					$this->model('ROModel')->updateRO($data1);
					$update_count++;
				}
				else
				{
					$this->model('ROModel')->tambahRO($data1);
					$save_count++;
				}

				//$this->model('SellingOutModel')->tambahSellingout($data1);
			}

			unlink($target);

			Flasher::setMessage('Berhasil','diupload. '.$update_count.' baris data lama, '.$save_count.' baris data baru','success');
			//Flasher::setMessage('Berhasil','diupload','success');
			header('location: '. base_url . '/RO');
			exit;
		}
		else
		{
            Flasher::setMessage('Gagal','diupload','danger');
            header('location: '. base_url . '/RO');
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
					'principal' => str_replace("'", "`",$row['PRINCIPAL']),
					'area' => str_replace("'", "`",$row['AREA']),
					'outlet_type' => str_replace("'", "`",$row['OUTLET_TYPE']),
					'desc' => str_replace("'", "`",$row['DESCRIPTION']),
					'ro' => $row['RO'],
					'create_by' => $_SESSION['username'],
					'edit_by' => $_SESSION['username']
				));
				
			}

			$this->model('ROModel')->uploadRO($data1);
			//$this->model('OutletModel')->uploadDataOutlet($json);
		// }
    }

}