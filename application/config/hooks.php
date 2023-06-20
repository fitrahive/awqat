<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

$hook['pre_system'] = function () {
	$dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
	$dotenv->load();
};

$hook['display_override'][] = [
	'class' => '',
	'function' => 'compress',
	'filename' => 'compress.php',
	'filepath' => 'hooks',
];
