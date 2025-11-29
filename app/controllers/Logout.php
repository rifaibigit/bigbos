<?php

class Logout {

	public function index()
	{
		$data['title'] = 'Logout';
	}

	public function Logout(){
		// if( !session_id() ) session_start();
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		session_destroy();
		header('location: '. base_url . '/Login');
	}
}