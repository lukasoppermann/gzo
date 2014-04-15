<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Microformats: vCard
|--------------------------------------------------------------------------
|
| The type of information available for vcards
|
*/
$config['microformats'] = array(
	'firstname' =>  '<span class="given-name">[value]</span>',
	'lastname' => '<span class="family-name">[value]</span>',
	'org' => '<span class="org">[value]</span>',
	// 'email' => '<span class="email"><a href="mailto:[value]">[value]</a></span>',
	'email' => '<a href="mailto:[value]">[value]</a>',	
	'home_phone' => '<div class="tel"><span class="type">home</span></span><a class="value" href="callto:[value]">[value]</a></div>',
	'work_phone' => '<div class="tel"><span class="type">work</span></span><a class="value" href="callto:[value]">[value]</a></div>',
	'mobile_phone' => '<div class="tel"><span class="type">mobile</span></span><a class="value" href="callto:[value]">[value]</a></div>',
	'fax' => '<div class="tel"><span class="type">fax</span></span><a class="value" href="callto:[value]">[value]</a></div>',
	'website' => '<a class="url" href="[value]">[name]</a>',
	'photo' => '<img class="photo" src="[value]" alt="[name]" />',
	'street' => '<span class="street-address">[value]</span>',
	'city' => '<span class="locality">[value]</span>',
	'zip' => '<span class="postal-code">[value]</span>',
	'region' => '<abbr class="region" title="[value]">[value]</abbr>',
	'country' => '<span class="country-name">[value]</span>'
);
$config['microformats_plain'] = array(
	'street',
	'city',
	'zip',
	'region',
	'country',
	'org'
);
/*
|--------------------------------------------------------------------------
| Microformats: vCard Template
|--------------------------------------------------------------------------
|
| The template for parsing data as a contact page
|
*/
$config['vcard_template'] = 'templates/vcard.php';
/*
|--------------------------------------------------------------------------
| Microformats: Calendar Template
|--------------------------------------------------------------------------
|
| The template for parsing data as a calendar page
|
*/
$config['cal_template'] = 'templates/cal.php';
/*
|--------------------------------------------------------------------------
| Microformats: Calendar Template
|--------------------------------------------------------------------------
|
| The template for parsing data as a calendar page
|
*/
$config['resume_template'] = 'templates/resume.php';

/* End of file microformats.php */
/* Location: ./system/application/config/microformats.php */