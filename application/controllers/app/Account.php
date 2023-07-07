<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends BaseController
{
	public $userdata;
	public Users_model $users;

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged')) {
			return redirect('screen/login');
		}

		$this->load->model('Users_model', 'users');

		$id = $this->session->userdata('userid');
		$this->userdata = $this->users->find($id);
	}

	public function index()
	{
		$csrf = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];

		$this->load->view('app/account', [
			'page' => 'Account Settings',
			'csrf' => $csrf,
		]);
	}

	public function process()
	{
		if ($this->input->post('login')) {
		}

		if ($this->input->post('password')) {
		}

		return show_404();
	}
}
