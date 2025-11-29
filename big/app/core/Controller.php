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
		require_once 'app/views/templates/' . $view . '.php';
	}

}