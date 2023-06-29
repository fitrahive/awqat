<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Override extends CI_Controller
{
	public CI_Output $output;

	public function notfound()
	{
		$this->output->set_status_header(404);
		$this->twig->display('error');
	}

	public function server()
	{
		$this->output->set_status_header(500);
		$this->twig->display('error');
	}
}
