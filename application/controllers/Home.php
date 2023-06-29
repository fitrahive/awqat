<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends BaseController
{
	public function index()
	{
		$this->load->view('templates/ar-rahman', []);
	}

	public function switch($language = '')
	{
		$language = $language ?: 'indonesia';
		$this->session->set_userdata('language', $language);

		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function screen()
	{
		if ($this->session->userdata('logged')) {
			return redirect('screen/profile');
		}

		return redirect('auth/login');
	}
}
