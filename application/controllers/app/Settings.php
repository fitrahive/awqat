<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends BaseController
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged')) {
			return redirect('screen/login');
		}

		$this->load->helper('settings');
	}

	public function index()
	{
		$settings =  [
			'name' => $this->settings('name'),
			'address' => $this->settings('address'),
			'method' => $this->settings('method'),
			'locale' => $this->settings('locale'),
			'latitude' => $this->settings('coordinate.latitude'),
			'longitude' => $this->settings('coordinate.longitude'),
		];

		$this->load->view('app/settings', [
			'page' => 'Mosque Settings',
			'settings' => $settings,
		]);
	}

	public function process()
	{
		$this->form_validation->set_rules([
			[
				'field' => 'name',
				'label' => 'Mosque Name',
				'rules' => 'required',
			],
			[
				'field' => 'address',
				'label' => 'Mosque Address',
				'rules' => 'required',
			],
			[
				'field' => 'locale',
				'label' => 'Date Time Locale',
				'rules' => 'required|in_list[' . implode(',', array_keys(locale())) . ']',
				'errors' => [
					'in_list' => 'Date Time Locale is invalid.',
				],
			],
			[
				'field' => 'method',
				'label' => 'Prayer Calculation Method',
				'rules' => 'required|in_list[' . implode(',', array_keys(method())) . ']',
				'errors' => [
					'in_list' => 'Prayer Calculation Method is invalid.',
				],
			],
			[
				'field' => 'latitude',
				'label' => 'Latitude',
				'rules' => 'required|regex_match[/^(\-?|\+?)?\d+(\.\d+)?$/]',
				'errors' => [
					'regex_match' => 'Latitude is invalid.',
				],
			],
			[
				'field' => 'longitude',
				'label' => 'Longitude',
				'rules' => 'required|regex_match[/^(\-?|\+?)?\d+(\.\d+)$/]',
				'errors' => [
					'regex_match' => 'Longitude is invalid.',
				],
			],
		]);

		if (!$this->form_validation->run()) {
			$failed = current($this->form_validation->error_array());
			$this->session->set_flashdata('failed', $failed);
			return redirect(current_url());
		}

		$this->db->trans_begin();

		foreach (['name', 'address', 'locale', 'method', 'latitude', 'longitude'] as $key) {
			$value = $this->input->post($key);

			if (in_array($key, ['latitude', 'longitude'])) {
				$key = 'coordinate.' . $key;
			}

			$this->settings->where('key', $key)->update(['value' => $value]);
		}

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();

			$this->session->set_flashdata('failed', 'Mosque settings failed to update.');
			return redirect(current_url());
		}

		$this->db->trans_commit();

		$this->session->set_flashdata('success', 'Mosque settings updated successfully.');
		return redirect(current_url());
	}
}
