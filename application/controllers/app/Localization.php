<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Localization extends BaseController
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
			'adjustment.fajr' => $this->settings('adjustment.fajr'),
			'adjustment.sunrise' => $this->settings('adjustment.sunrise'),
			'adjustment.dhuhr' => $this->settings('adjustment.dhuhr'),
			'adjustment.asr' => $this->settings('adjustment.asr'),
			'adjustment.maghrib' => $this->settings('adjustment.maghrib'),
			'adjustment.isha' => $this->settings('adjustment.isha'),
			'label.fajr' => $this->settings('label.fajr'),
			'label.sunrise' => $this->settings('label.sunrise'),
			'label.dhuhr' => $this->settings('label.dhuhr'),
			'label.asr' => $this->settings('label.asr'),
			'label.maghrib' => $this->settings('label.maghrib'),
			'label.isha' => $this->settings('label.isha'),
		];

		$this->load->view('app/localizations', [
			'page' => 'Localizations',
			'settings' => $settings,
		]);
	}

	public function process()
	{
		$this->form_validation->set_rules([
			[
				'field' => 'label[fajr]',
				'label' => 'Fajr Label',
				'rules' => 'required',
			],
			[
				'field' => 'label[sunrise]',
				'label' => 'Sunrise Label',
				'rules' => 'required',
			],
			[
				'field' => 'label[dhuhr]',
				'label' => 'Dhuhr Label',
				'rules' => 'required',
			],
			[
				'field' => 'label[asr]',
				'label' => 'Asr Label',
				'rules' => 'required',
			],
			[
				'field' => 'label[maghrib]',
				'label' => 'Maghrib Label',
				'rules' => 'required',
			],
			[
				'field' => 'label[isha]',
				'label' => 'Isha Label',
				'rules' => 'required',
			],
			[
				'field' => 'adjustment[fajr]',
				'label' => 'Fajr Adjustment',
				'rules' => 'required|is_natural',
			],
			[
				'field' => 'adjustment[sunrise]',
				'label' => 'Sunrise Adjustment',
				'rules' => 'required|is_natural',
			],
			[
				'field' => 'adjustment[dhuhr]',
				'label' => 'Dhuhr Adjustment',
				'rules' => 'required|is_natural',
			],
			[
				'field' => 'adjustment[asr]',
				'label' => 'Asr Adjustment',
				'rules' => 'required|is_natural',
			],
			[
				'field' => 'adjustment[maghrib]',
				'label' => 'Maghrib Adjustment',
				'rules' => 'required|is_natural',
			],
			[
				'field' => 'adjustment[isha]',
				'label' => 'Isha Adjustment',
				'rules' => 'required|is_natural',
			],
		]);

		if (!$this->form_validation->run()) {
			$failed = current($this->form_validation->error_array());
			$this->session->set_flashdata('failed', $failed);
			return redirect(current_url());
		}

		$this->db->trans_begin();

		$settings = [
			'adjustment[fajr]',
			'adjustment[sunrise]',
			'adjustment[dhuhr]',
			'adjustment[asr]',
			'adjustment[maghrib]',
			'adjustment[isha]',
			'label[fajr]',
			'label[sunrise]',
			'label[dhuhr]',
			'label[asr]',
			'label[maghrib]',
			'label[isha]',
		];

		foreach ($settings as $key) {
			$value = $this->input->post($key);

			$key = str_replace('[', '.', $key);
			$key = str_replace(']', '', $key);

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
