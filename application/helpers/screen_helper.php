<?php
defined('BASEPATH') or exit('No direct script access allowed');

function shalat($index = null)
{
	$names = ['fajr', 'sunrise', 'dhuhr', 'asr', 'maghrib', 'isha'];
	return $index ? $names[$index] : $names;
}
