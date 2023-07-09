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
		if ($this->input->post('profile')) {
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
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required|alpha',
					'errors' => [
						'required' => 'Name cannot be empty',
						'alpha' => 'Name is invalid.',
					],
				],
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|valid_email',
					'errors' => [
						'required' => 'Email cannot be empty',
						'valid_email' => 'Email is invalid.',
					],
				],
			]);

			if (!$this->form_validation->run()) {
				$failed = current($this->form_validation->error_array());
				$this->session->set_flashdata('failed-profile', $failed);
				return redirect(current_url());
			}

			$username = $this->input->post('username');
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			$update = $this->users->update($this->userdata->id, [
				'login' => $username,
				'name' => $name,
				'email' => $email,
			]);

			if ($update) {
				$this->session->set_flashdata('success-profile', 'Profile updated successfully.');
				return redirect(current_url());
			}

			$this->session->set_flashdata('failed-profile', 'Profile failed to update.');
			return redirect(current_url());
		}

		if ($this->input->post('password')) {
			$this->form_validation->set_rules([
				[
					'field' => 'current',
					'label' => 'Current password',
					'rules' => 'required',
					'errors' => [
						'required' => 'Current password cannot be empty',
					],
				],
				[
					'field' => 'new',
					'label' => 'New password',
					'rules' => 'required',
					'errors' => [
						'required' => 'New password cannot be empty',
					],
				],
				[
					'field' => 'confirm',
					'label' => 'Confirm new password',
					'rules' => 'required|matches[new]',
					'errors' => [
						'required' => 'Confirm new password cannot be empty',
					],
				],
			]);

			if (!$this->form_validation->run()) {
				$failed = current($this->form_validation->error_array());
				$this->session->set_flashdata('failed-password', $failed);
				return redirect(current_url());
			}

			$current = $this->input->post('current');
			$new = $this->input->post('new');
			$confirm = $this->input->post('confirm');

			if (!password_verify($current, $this->userdata->password)) {
				$this->session->set_flashdata('failed-password', 'Current password is incorrect.');
				return redirect(current_url());
			}

			if (password_verify($new, $this->userdata->password)) {
				$this->session->set_flashdata('failed-password', 'The old password cannot be reused.');
				return redirect(current_url());
			}

			$update = $this->users->update($this->userdata->id, [
				'password' => password_hash($confirm, PASSWORD_BCRYPT)
			]);

			if ($update) {
				$this->session->set_flashdata('success-password', 'Password updated successfully.');
				return redirect(current_url());
			}

			$this->session->set_flashdata('failed-password', 'Password failed to update.');
			return redirect(current_url());
		}

		return show_404();
	}
}
