<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends BaseController
{
	public Users_model $users;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model', 'users');
	}

	public function index()
	{
		if ($this->session->userdata('logged')) {
			return redirect('screen/account');
		}

		$this->load->view('app/login', [
			'page' => 'Login',
		]);
	}

	public function process()
	{
		$this->form_validation->set_rules([
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|alpha_numeric',
				'errors' => [
					'required' => 'Username cannot be empty',
					'alpha_numeric' => 'Username is invalid.',
				],
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => 'Password cannot be empty',
				],
			],
		]);

		if (!$this->form_validation->run()) {
			$failed = current($this->form_validation->error_array());
			$this->session->set_flashdata('failed', $failed);
			return redirect(current_url());
		}

		$password = $this->input->post('password');
		$username = $this->input->post('username');
		$check = $this->users->findBy('login', $username);

		if (!$check) {
			$this->session->set_flashdata('failed', 'Username or password is incorrect.');
			return redirect(current_url());
		}

		if (!password_verify($password, $check->password)) {
			$this->session->set_flashdata('failed', 'Username or password is incorrect.');
			return redirect(current_url());
		}

		$this->session->set_userdata([
			'logged' => true,
			'userid' => $check->id,
		]);

		$this->session->set_flashdata('success', 'Assalamu\'alaikum akhy!');
		return redirect('screen/account');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect('screen/login');
	}
}
