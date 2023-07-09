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

function locale($value = null)
{
	$locales = [
		'af' => 'Afrikaans',
		'ar' => 'Arabic',
		'az' => 'Azerbaijani',
		'be' => 'Belarusian',
		'bg' => 'Bulgarian',
		'bn' => 'Bengali',
		'ca' => 'Catalan',
		'cs' => 'Czech',
		'cy' => 'Welsh',
		'da' => 'Danish',
		'de' => 'German',
		'el' => 'Greek',
		'en' => 'English',
		'es' => 'Spanish',
		'et' => 'Estonian',
		'eu' => 'Basque',
		'fa' => 'Persian',
		'fi' => 'Finnish',
		'fr' => 'French',
		'ga' => 'Irish',
		'gl' => 'Galician',
		'he' => 'Hebrew',
		'hi' => 'Hindi',
		'hr' => 'Croatian',
		'hu' => 'Hungarian',
		'hy' => 'Armenian',
		'id' => 'Indonesian',
		'is' => 'Icelandic',
		'it' => 'Italian',
		'ja' => 'Japanese',
		'ka' => 'Georgian',
		'kk' => 'Kazakh',
		'km' => 'Khmer',
		'ko' => 'Korean',
		'ky' => 'Kyrgyz',
		'lt' => 'Lithuanian',
		'lv' => 'Latvian',
		'mk' => 'Macedonian',
		'mn' => 'Mongolian',
		'ms' => 'Malay',
		'nb' => 'Norwegian Bokmål',
		'nl' => 'Dutch',
		'nn' => 'Norwegian Nynorsk',
		'pl' => 'Polish',
		'pt' => 'Portuguese',
		'ro' => 'Romanian',
		'ru' => 'Russian',
		'sk' => 'Slovak',
		'sl' => 'Slovenian',
		'sq' => 'Albanian',
		'sr' => 'Serbian',
		'sv' => 'Swedish',
		'th' => 'Thai',
		'tr' => 'Turkish',
		'uk' => 'Ukrainian',
		'uz' => 'Uzbek',
		'vi' => 'Vietnamese',
		'zh' => 'Chinese',
	];

	return $value ? $locales[$value] : $locales;
}

function theme($name = null)
{
	$themes = [
		'ar-rahman' => 'Ar-Rahman',
		'an-nur' => 'An-Nur',
		'al-hikmah' => 'Al-Hikmah',
	];

	return $name ? $themes[$name] : $themes;
}
