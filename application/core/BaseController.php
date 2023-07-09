<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseController extends CI_Controller
{
	public $db;
	public CI_Input $input;
	public CI_Output $output;
	public CI_Upload $upload;
	public CI_Session $session;
	public CI_Security $security;
	public Settings_model $settings;
	public CI_Form_validation $form_validation;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Settings_model', 'settings');
	}

	protected function settings($key)
	{
		$setting = $this->settings->findBy('key', $key);

		if ($setting) {
			return $setting->value;
		}

		return null;
	}
}
