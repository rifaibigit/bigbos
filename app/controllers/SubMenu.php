<?php

class SubMenu extends Controller {
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
		$data['title'] = 'Data Sub Menu';
		//$data['sub_menu'] = $this->model('SubMenuModel')->getAllSubMenu();

		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('submenu/index', $data);
		$this->view('templates/footer');
	}
	public function show()
	{
		$data['data'] = $this->model('SubMenuModel')->getSubMenu();

		$json = json_encode($data);
		echo $json;
	}

	public function show_bymenuid()
	{
		$menu_id = $_POST['id'];
		$data['data'] = $this->model('SubMenuModel')->getSubMenuByMenuId($menu_id);

		foreach($data['data'] as $row)
		{
			$output .= '<option value="'.$row['sub_menu_id'].'">'.$row['sub_menu'].'</option>';
			//$output .= $row['sub_menu'];
		}

		//Flasher::setMessage('Berhasil','echo' .$output,'success');

		echo $output;
	}

	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Menu';
		$data['sub_menu'] = $this->model('SubMenuModel')->getAllSubMenu();	
		$this->view('Menu/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['sub_menu'] = $this->model('SubMenuModel')->getAllSubMenu();

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
			 
			foreach($data['sub_menu'] as $row) {
			    $pdf->Cell(85,6,$row['island'],1);
			    $pdf->Cell(30,6,$row['Menu'],1);
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Menu.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Sub Menu';
		$data['sub_menu'] = $this->model('SubMenuModel')->cariSubMenu();
		$data['key'] = $_POST['key'];
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('submenu/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Sub Menu';
		$data['sub_menu'] = $this->model('SubMenuModel')->getSubMenuById($id);
        $data['menu'] = $this->model('MenuModel')->getMenuById($data['sub_menu']['menu_id']);
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('submenu/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Sub Menu';		
		$data['menu'] = $this->model('MenuModel')->getAllMenu();		
		$this->template('header', $data);
		$this->template('sidebar', $data);
		$this->view('submenu/create', $data);
		$this->view('templates/footer');
	}

	public function simpanSubMenu(){
		
        $data['sub_menu'] = $this->model('SubMenuModel')->getMaxSubMenuId_byMenuId($_POST['menu']);
        
        $data = array(
			'menu_id' => $_POST['menu'],
            'sub_menu_id' => $data['sub_menu']['sub_menu_id'] + 1,
			'sub_menu' => $_POST['sub_menu'],
			'url' => $_POST['url']
		);

		if( $this->model('SubMenuModel')->tambahSubMenu($data) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/SubMenu');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/SubMenu');
			exit;	
		}
	}

	public function updateSubMenu(){	
		if( $this->model('SubMenuModel')->updateDataSubMenu($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/SubMenu');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/SubMenu');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('SubMenuModel')->deleteSubMenu($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/SubMenu');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/SubMenu');
			exit;	
		}
	}
}