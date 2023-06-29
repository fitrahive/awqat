<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseController extends CI_Controller
{
	public CI_Input $input;
	public CI_Output $output;
	public CI_Upload $upload;
	public CI_Session $session;
	public CI_Security $security;
	public CI_Form_validation $form_validation;

	public function __construct()
	{
		parent::__construct();
	}
}
