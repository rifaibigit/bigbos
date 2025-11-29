<?php

class Price extends Controller {
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
		$data['title'] = 'Price';

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

		$data['price'] = $this->model('PriceModel')->getAllPrice();
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('price/index', $data);
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

		$data['price'] = $this->model('PriceModel')->getAllPrice();

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
			$item_code='';

			if ($highestRow < 3)
			{
				Flasher::setMessage('ERROR','File Excel Kosong!!!','danger');
				header('location: '. base_url . '/Price');
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

				$sqlDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rowData[0][10])->format('Y-m-d');

				$data1 = array(
                    'id'=> null,
					//'principal' => str_replace("'", "`",$rowData[0][1]),
                    'item_code' => str_replace("'", "`",$rowData[0][2]),
					'price_exc' => $rowData[0][4],
					'price_inc' => $rowData[0][5],
					'mt_exc' => $rowData[0][6],
					'mt_inc' => $rowData[0][7],
					'dist_exc' => $rowData[0][8],
					'dist_inc' => $rowData[0][9],
					'valid_from' => $sqlDate,
					'create_by' => $_SESSION['username'],
					'edit_by' => $_SESSION['username']
                );

				if ($data1['item_code'] === "#N/A" or $data1['item_code'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "KODE ITEM" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/Price');
					exit();
				}

				if ($data1['price_exc'] === "#N/A" or $data1['price_exc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "PRICE EXC" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/Price');
					exit();
				}

				if ($data1['price_inc'] === "#N/A" or $data1['price_inc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "PRICE INC" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/Price');
					exit();
				}

				if ($data1['mt_exc'] === "#N/A" or $data1['mt_exc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "MT PRICE EXC" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/Price');
					exit();
				}

				if ($data1['mt_inc'] === "#N/A" or $data1['mt_inc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "MT PRICE INC" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/Price');
					exit();
				}

				if ($data1['dist_exc'] === "#N/A" or $data1['dist_exc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "DISTRIBUTOR EXC" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/Price');
					exit();
				}

				if ($data1['dist_inc'] === "#N/A" or $data1['dist_inc'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "DISTRIBUTOR INC" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/Price');
					exit();
				}

				if ($data1['valid_from'] === "#N/A" or $data1['valid_from'] === "") 
				{
					Flasher::setMessage('ERROR','pada data "VALID FROM" di baris ke ' .$row. '!!!','danger');
					header('location: '. base_url . '/Price');
					exit();
				}

				$selisih_bulan = (int)date("m") - (int)substr($data1['valid_from'],5,2);

				// if ( $selisih_bulan > 2) 
				// {
				// 	Flasher::setMessage('ERROR','data "VALID FROM" lebih dari 2 bulan yang lalu. Pada baris ke ' .$row. '!!!','danger');
				// 	header('location: '. base_url . '/Price');
				// 	exit();
				// }


				$data['price'] = $this->model('PriceModel')->getDuplicatePrice($data1);

				foreach ($data['price'] as $rrow) :
					$item_code=$rrow['item_code'];
				endforeach;

				if($item_code == $data1['item_code'])
				{
					$this->model('PriceModel')->updatePrice($data1);
					$update_count++;
				}
				else
				{
					$this->model('PriceModel')->tambahPrice($data1);
					$save_count++;
				}

				//$this->model('SellingOutModel')->tambahSellingout($data1);
			}

			unlink($target);

			Flasher::setMessage('Berhasil','diupload. '.$update_count.' baris data lama, '.$save_count.' baris data baru','success');
			//Flasher::setMessage('Berhasil','diupload','success');
			header('location: '. base_url . '/Price');
			exit;
		}
		else
		{
            Flasher::setMessage('Gagal','diupload','danger');
            header('location: '. base_url . '/Price');
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
					'principal' => str_replace("'", "`",$row['PRINCIPAL']),
                    'item_code' => str_replace("'", "`",$row['KODE_ITEM']),
					'price_exc' => $row['SL_EXC'],
					'price_inc' => $row['SL_INC'],
					'mt_exc' => $row['MT_EXC'],
					'mt_inc' => $row['MT_INC'],
					'dist_exc' => $row['DS_EXC'],
					'dist_inc' => $row['DS_INC'],
					'valid_from' => $row['VALID_FROM'],
					'create_by' => $_SESSION['username'],
					'edit_by' => $_SESSION['username']
				));
				
			}

			$this->model('PriceModel')->uploadPrice($data1);
		// }
    }

}