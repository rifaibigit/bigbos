<?php

class Controller{
	public function view($view, $data = [])
	{
		require_once 'app/views/' . $view . '.php';
	}

	public function model($model)
	{
		require_once 'app/models/' . $model . '.php';
		return new $model;
	}

	public function template($view, $data = [])
	{
		
		$data['nama'] = $_SESSION['nama'];
		$data['username'] = $_SESSION['username'];
		$data['area'] = $_SESSION['area'];
		
		$username = $_SESSION['username'];
		//$data['user_dashboard'] = $_SESSION['user_dashboard'];
		$data['user_menu'] = $this->model('UserModel')->getUserMenu($username);
		$data['menu_access'] = $this->model('UserModel')->getUserMenuByID($username);
		$data['user_dashboard'] = $this->model('UserModel')->getUserDashboard($username);

		require_once 'app/views/templates/' . $view . '.php';
	}

}