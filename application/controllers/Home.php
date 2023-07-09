<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends BaseController
{
	public Quotes_model $quotes;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Quotes_model', 'quotes');
		$this->load->helper('screen');
	}

	public function index()
	{
		$theme = $this->settings('theme');
		$this->load->view('templates/' . $theme);
	}

	public function sync()
	{
		$name = $this->settings('name');
		$address = $this->settings('address');
		$theme = $this->settings('theme');
		$quotes = array_map(fn ($item) => $item->quote, $this->quotes->all());

		$label = [
			'fajr' => $this->settings('label.fajr'),
			'sunrise' => $this->settings('label.sunrise'),
			'dhuhr' => $this->settings('label.dhuhr'),
			'asr' => $this->settings('label.asr'),
			'maghrib' => $this->settings('label.maghrib'),
			'isha' => $this->settings('label.isha'),
		];

		$result = [
			'name' => $name,
			'address' => $address,
			'theme' => $theme,
			'quotes' => $quotes,
			'label' => $label,
			'method' => $this->settings('method'),
			'adjustment.fajr' => intval($this->settings('adjustment.fajr')),
			'adjustment.sunrise' => intval($this->settings('adjustment.sunrise')),
			'adjustment.dhuhr' => intval($this->settings('adjustment.dhuhr')),
			'adjustment.asr' => intval($this->settings('adjustment.asr')),
			'adjustment.maghrib' => intval($this->settings('adjustment.maghrib')),
			'adjustment.isha' => intval($this->settings('adjustment.isha')),
			'locale' => $this->settings('locale'),
			'adjustment.hijri' => intval($this->settings('adjustment.hijri')),
			'latitude' => $this->settings('coordinate.latitude'),
			'longitude' => $this->settings('coordinate.longitude'),
		];

		header('Content-Type: application/json');
		die(json_encode($result));
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
			return redirect('screen/settings');
		}

		return redirect('screen/login');
	}
}
