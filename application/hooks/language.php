<?php
defined('BASEPATH') or exit('No direct script access allowed');

function language()
{
	$ci = &get_instance();
	$ci->load->helper('language');

	$language = $ci->session->userdata('language');

	if ($language) {
		$ci->load->language('awqat', $language);
	} else {
		$ci->load->language('awqat', 'indonesia');
	}
}
