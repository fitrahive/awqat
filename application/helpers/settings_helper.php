<?php
defined('BASEPATH') or exit('No direct script access allowed');

function method($value = null)
{
	$methods = [
		'Kemenag' => 'Kemenag, Indonesia',
		'MuslimWorldLeague' => 'Muslim World League',
		'Egyptian' => 'Egyptian General Authority of Survey',
		'Karachi' => 'University of Islamic Sciences, Karachi',
		'UmmAlQura' => 'Umm Al-Qura University, Makkah',
		'Dubai' => 'United Arab Emirates',
		'Qatar' => 'Qatar',
		'Kuwait' => 'Kuwait',
		'MoonsightingCommittee' => 'Moonsighting Committee Worldwide',
		'Singapore' => 'Majlis Ugama Islam Singapura, Singapore',
		'Turkey' => 'Diyanet İşleri Başkanlığı, Turkey',
		'Tehran' => 'Institute of Geophysics, University of Tehran',
		'NorthAmerica' => 'Islamic Society of North America',
	];

	return $value ? $methods[$value] : $methods;
}
