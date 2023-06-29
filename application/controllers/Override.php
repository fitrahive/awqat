<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Override extends BaseController
{
	public function notfound()
	{
		$this->output->set_status_header(404);
		$this->load->view('error');
	}

	public function server()
	{
		$this->output->set_status_header(500);
		$this->load->view('error');
	}
}
