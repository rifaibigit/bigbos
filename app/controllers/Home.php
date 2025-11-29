<?php
class Home extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Data Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/Login');
			exit;
		}

	} 
	public function index()
	{
		$data['title'] = 'Dashboard';
		
		$data['nama'] = $_SESSION['nama'];
		$data['area'] = $_SESSION['area'];
		$data['dashboar'] = $_SESSION['user_dashboard'];
		$username = $_SESSION['username'];
		$data['user_dashboard'] = $this->model('UserModel')->getUserDashboard($username);

		$is_dashboard = 0;
		//foreach ($data['user_dashboard'] as $row):
		$is_dashboard = $data['user_dashboard']['dashboard'];
		//endforeach;

		if(isset($_POST['by_principal']))
		{
			$data['by_principal'] = $_POST['by_principal'];
		}else
		{
			$data['by_principal'] = "";
		}

		$this->template('header', $data);
		$this->template('sidebar', $data);

		if ($is_dashboard == 1)
		{
			$data['period_si'] = $this->model('ReportModel')->getPeriod_SI();
			$data['period_so'] = $this->model('ReportModel')->getPeriod_SO();
			$data['report_year'] = $this->model('ReportModel')->getReportYear();
			$data['principal'] = $this->model('ReportModel')->getPrincipalOut();
			// $data['chart_si'] =  $this->model('ReportModel')->getChart_SI_dashboard($data['report_year']['year']);
			// $data['chart_so'] =  $this->model('ReportModel')->getChart_SO_dashboard($data['report_year']['year']);
			// $data['si_channel'] = $this->model('ReportModel')->getSI_Channel_dashboard($data['report_year']['year']);
			// $data['si_dist'] = $this->model('ReportModel')->getSI_Dist_dashboard($data['report_year']['year']);
			// $data['so_channel'] = $this->model('ReportModel')->getSO_Channel_dashboard($data['report_year']['year']);
			// $data['si_region'] = $this->model('ReportModel')->getChart_SI_dist($data['report_year']['year']);
			// $data['so_region'] = $this->model('ReportModel')->getChart_SO_dist($data['report_year']['year']);
			// $data['si_asm'] = $this->model('ReportModel')->getChart_SI_asm($data['report_year']['year']);
			// $data['so_asm'] = $this->model('ReportModel')->getChart_SO_asm($data['report_year']['year']);
			// $data['ao_lord_last'] = $this->model('ReportModel')->getAO_Lord_last($data['period_so']);
			// //$data['ao_lord_now'] = $this->model('ReportModel')->getAO_Lord_now();
			// $data['ao_jordan_last'] = $this->model('ReportModel')->getAO_Jordan_last($data['period_so']);
			//$data['ao_jordan_now'] = $this->model('ReportModel')->getAO_Jordan_now();

			$this->view('home/index', $data);
		}
		else
		{
			$this->view('home/home', $data);
		}
		
		$this->view('templates/footer');
	}

	public function chart_si_show()
	{	
		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
		}
		$data['chart_si'] =  $this->model('ReportModel')->getChart_SI_dashboard($year);

		$json = json_encode($data);
		echo $json;
	}

	public function chart_so_show()
	{	
		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
		}
		$data['chart_so'] =  $this->model('ReportModel')->getChart_SO_dashboard($year);

		$json = json_encode($data);
		echo $json;
	}

	public function chart_si_channel_show()
	{	
		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
		}
		$data['si_channel'] =  $this->model('ReportModel')->getSI_Channel_dashboard2($year);

		$json = json_encode($data);
		echo $json;
	}

	public function chart_so_channel_show()
	{	
		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
		}
		$data['so_channel'] =  $this->model('ReportModel')->getSO_Channel_dashboard($year);

		$json = json_encode($data);
		echo $json;
	}

	public function si_region_show()
	{	
		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
		}
		$data['si_region'] = $this->model('ReportModel')->getChart_SI_dist($year);

		$json = json_encode($data);
		echo $json;
	}

	public function so_region_show()
	{	
		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
		}
		$data['so_region'] = $this->model('ReportModel')->getChart_SO_dist($year);

		$json = json_encode($data);
		echo $json;
	}

	public function si_asm_show()
	{	
		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
		}
		$data['si_asm'] = $this->model('ReportModel')->getChart_SI_asm($year);

		$json = json_encode($data);
		echo $json;
	}

	public function so_asm_show()
	{	
		if(isset($_POST['year']))
		{
			$year = $_POST['year'];
		}
		$data['so_asm'] = $this->model('ReportModel')->getChart_SO_asm($year);

		$json = json_encode($data);
		echo $json;
	}

	public function index2()
	{
		$data['title'] = 'Dashboard';
		
		$data['nama'] = $_SESSION['nama'];
		$data['area'] = $_SESSION['area'];
		$data['dashboar'] = $_SESSION['user_dashboard'];
		$username = $_SESSION['username'];
		$data['user_dashboard'] = $this->model('UserModel')->getUserDashboard($username);

		$is_dashboard = 0;
		//foreach ($data['user_dashboard'] as $row):
		$is_dashboard = $data['user_dashboard']['dashboard'];
		//endforeach;

		if(isset($_POST['by_principal']))
		{
			$data['by_principal'] = $_POST['by_principal'];
		}else
		{
			$data['by_principal'] = "";
		}

		$this->template('header', $data);
		$this->template('sidebar', $data);

		if ($is_dashboard == 1)
		{
			// $data['period_si'] = $this->model('ReportModel')->getPeriod_SI();
			// $data['period_so'] = $this->model('ReportModel')->getPeriod_SO();
			$data['report_year'] = $this->model('ReportModel')->getReportYear();
			// $data['principal'] = $this->model('ReportModel')->getPrincipalOut();
			$data['chart_si'] =  $this->model('ReportModel')->getChart_SI_dashboard($data['report_year']['year']);
			$data['chart_so'] =  $this->model('ReportModel')->getChart_SO_dashboard($data['report_year']['year']);
			// $data['si_channel'] = $this->model('ReportModel')->getSI_Channel_dashboard($data['report_year']['year']);
			// $data['si_dist'] = $this->model('ReportModel')->getSI_Dist_dashboard($data['report_year']['year']);
			// $data['so_channel'] = $this->model('ReportModel')->getSO_Channel_dashboard($data['report_year']['year']);
			// $data['si_region'] = $this->model('ReportModel')->getChart_SI_dist($data['report_year']['year']);
			// $data['so_region'] = $this->model('ReportModel')->getChart_SO_dist($data['report_year']['year']);
			// $data['si_asm'] = $this->model('ReportModel')->getChart_SI_asm($data['report_year']['year']);
			// $data['so_asm'] = $this->model('ReportModel')->getChart_SO_asm($data['report_year']['year']);
			// $data['ao_lord_last'] = $this->model('ReportModel')->getAO_Lord_last($data['period_so']);
			// //$data['ao_lord_now'] = $this->model('ReportModel')->getAO_Lord_now();
			// $data['ao_jordan_last'] = $this->model('ReportModel')->getAO_Jordan_last($data['period_so']);
			//$data['ao_jordan_now'] = $this->model('ReportModel')->getAO_Jordan_now();

			$this->view('home/index2', $data);
		}
		else
		{
			$this->view('home/home', $data);
		}
		
		$this->view('templates/footer');
	}

}