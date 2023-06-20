<?php
defined('BASEPATH') or exit('No direct script access allowed');

function compress()
{
	$ci = &get_instance();
	$buffer = $ci->output->get_output();

	if (strpos($buffer, '<!DOCTYPE html>') === false || ENVIRONMENT !== 'production') {
		$ci->output->set_output($buffer);
		return $ci->output->_display();
	}

	$replace = [
		'/\t(\s+)?/' => '',
		'/\n(\s+)?/' => '',
		'/\>[^\S ]+/s' => '>',
		'/[^\S ]+\</s' => '<',
		'/(\s)+/s' => '\\1',
		'/<!--(.|\s)*?-->/' => '',
		'/\>\s+\</s' => '><',
		'/\<script type="text\/javascript"\>\<\/script\>/s' => '',
		'/\s+type="text\/javascript"/s' => '',
		'/\s+\</s' => ' <',
		'/\s+=\s+/s' => '=',
		'/\<\/script\>\<script\>/s' => '',
	];

	$buffer = preg_replace(
		array_keys($replace),
		array_values($replace),
		$buffer
	);

	$ci->output->set_output(trim($buffer));
	return $ci->output->_display();
}
