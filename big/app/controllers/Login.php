<?php

class Login extends Controller {

	public function index()
	{
		$data['title'] = 'Halaman Login';

		$this->view('login/login', $data);
	}

	public function prosesLogin() {
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];

		// echo $data['password'];
		// die;

		$user['login'] = $this->model('LoginModel')->checkLogin($data);

		
			if($user['login']['username'] != '')
			{
				$_SESSION['username'] = $user['login']['username'];
				$_SESSION['nama'] = $user['login']['nama'];
				$_SESSION['session_login'] = 'sudah_login';

				//$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);
				//Flasher::setMessage('Area',$_SESSION['area'],'success');
				
				header('location: '. base_url . '/Admin');
			}
			else
			{
				Flasher::setMessage('Username / Password','salah.','danger');
				header('location: '. base_url . '/Login');
				exit;
			}
		
	}

}