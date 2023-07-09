<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Themes extends BaseController
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
		$theme = $this->settings('theme');

		$this->load->view('app/themes', [
			'page' => 'Screen Themes',
			'theme' => $theme,
		]);
	}

	public function change($theme)
	{
		if (!in_array($theme, array_keys(theme()))) {
			$this->session->set_flashdata('failed', 'Screen theme could not be found.');
			return redirect('screen/themes');
		}

		$update = $this->settings->where('key', 'theme')->update(['value' => $theme]);

		if ($update) {
			$this->session->set_flashdata('success', 'Screen theme updated successfully.');
			return redirect('screen/themes');
		}

		$this->session->set_flashdata('failed', 'Screen theme failed to update.');
		return redirect('screen/themes');
	}
}
