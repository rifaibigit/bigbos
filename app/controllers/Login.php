<?php

class Login extends Controller {
	public function index()
	{
		$data['title'] = 'Halaman Login';

		$this->view('login/index', $data);
	}

	public function prosesLogin() {
		$data['username'] = htmlspecialchars($_POST['username']);
		$data['password'] = htmlspecialchars($_POST['password']);

		$user['login'] = $this->model('LoginModel')->checkLogin($data);
		
			if($user['login']['username'] != '')
			{
				$_SESSION['username'] = $user['login']['username'];
				$_SESSION['nama'] = $user['login']['nama'];
				$_SESSION['session_login'] = 'sudah_login';
				$_SESSION['user_dashboard'] = $user['login']['dashboard']; 
				$_SESSION['area'] = $user['login']['area']; 

				//$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);
				//Flasher::setMessage('URL',base_url,'success');
				
				header('location: '. base_url . '/Home');
			}
			else
			{
				Flasher::setMessage('Username / Password','salah.','danger');
				header('location: '. base_url . '/Login');
				exit;
			}
		
	}

	/* public function prosesLogin2() {
		if($row = $this->model('LoginModel')->checkLogin($_POST) > 0 ) {
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['session_login'] = 'sudah_login'; 

				//$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);
				
				header('location: '. base_url . '/Home');
		} else {
			Flasher::setMessage('Username / Password','salah.','danger');
			header('location: '. base_url . '/Login');
			exit;	
		}
	} */
}