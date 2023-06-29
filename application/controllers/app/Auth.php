<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends BaseController
{
	public function index()
	{
		if ($this->session->userdata('logged')) {
			return redirect('screen/profile');
		}

		$csrf = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];

		$this->load->view('app/login', [
			'page' => 'Login',
			'csrf' => $csrf,
		]);
	}
}
