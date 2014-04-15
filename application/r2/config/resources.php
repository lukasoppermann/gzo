<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Directories
|--------------------------------------------------------------------------
|
| Media Directory
*/
$config['dir']['media'] 	= 'media/';
$config['dir_media'] 		= 'media/';
/*
| Layout Directory
*/
$config['dir']['layout'] 	= 'media/layout/';
$config['dir_layout']	 	= 'media/layout/';
/*
| Images Directory
*/
$config['dir']['images'] 	= 'media/images/';
$config['dir_images']	 	= 'media/images/';
/*
| JavaScript Directory
*/
$config['dir']['js']		= 'libs/js/';
$config['dir_js']			= 'libs/js/';
/*
| Stylesheet Directory
*/
$config['dir']['css']		= 'libs/css/';
$config['dir_css']			= 'libs/css/';
/*
|--------------------------------------------------------------------------
| Files
|--------------------------------------------------------------------------
|
| JavaScript
|
*/
$config['js']['dir']				= $config['dir']['js'];
//
$config['js']['files'][0] 			= 'jquery'; // files in need to be loaded first
$config['js']['files'][1] 			= 'jquery.ui';
$config['js']['files'][2] 			= 'jquery.dialog.min';
//
$config['js']['scripts']			= array('jquery.geekga-1.2.min'); // files with variables to be replace
$config['js']['variables']			= array(array('code'=>'UA-7074034-10')); // variables to replace
//
$config['js']['tags']['file']		=  "\t".'<script type="text/javascript" src="[$var]"></script>'."\n";
$config['js']['tags']['script']		=  "\t".'<script type="text/javascript">'."\n".'[$var]'."\n".'</script>'."\n";
/*
|
| Cascading Style Sheets
|
*/
$config['css']['dir']				= $config['dir']['css'];
//
$config['css']['files']['reset'] 	= array('reset');
// $config['css']['files']['reset'] 	= array('reset','reset_second');
$config['css']['files']['screen'] 	= array('screen');
$config['css']['files']['ie'] 		= array('screen.ie');
$config['css']['files']['ie7'] 		= array('screen.ie7');
$config['css']['files']['ie6'] 		= array('screen.ie6');
//
$config['css']['tags']['reset'] 	= "\t".'<link rel="stylesheet" type="text/css" href="[$var]" media="screen" />'."\n";
$config['css']['tags']['screen'] 	= "\t".'<link rel="stylesheet" type="text/css" href="[$var]" media="screen" />'."\n";
$config['css']['tags']['ie']	 	= "\t".'<!--[if IE]>'."\n\t\t".'<link rel="stylesheet" type="text/css" href="[$var]" media="screen" />'."\n\t".'<![endif]-->'."\n";
$config['css']['tags']['ie8']	 	= "\t".'<!--[if IE 8]>'."\n\t\t".'<link rel="stylesheet" type="text/css" href="[$var]" media="screen" />'."\n\t".'<![endif]-->'."\n";
$config['css']['tags']['ie7']	 	= "\t".'<!--[if IE 7]>'."\n\t\t".'<link rel="stylesheet" type="text/css" href="[$var]" media="screen" />'."\n\t".'<![endif]-->'."\n";
$config['css']['tags']['ie6']	 	= "\t".'<!--[if IE 6]>'."\n\t\t".'<link rel="stylesheet" type="text/css" href="[$var]" media="screen" />'."\n\t".'<![endif]-->'."\n";
$config['css']['tags']['print'] 	= "\t".'<link rel="print" type="text/css" href="[$var]" media="print" />'."\n";
$config['css']['tags']['iphone'] 	= "\t".'<link rel="stylesheet" type="text/css" href="[$var]" media="handheld" />'."\n";
/*
|--------------------------------------------------------------------------
| Meta Data
|--------------------------------------------------------------------------
|
| Charset e.g. utf-8
*/
$config['charset'] = 'utf-8';
/*
| Author (of the Content)
*/
$config['author'] = 'R2 Felgenveredelung GmbH - r2-gmbh.com';
/*
| Developer (of the Webpage)
*/
$config['developer'] = 'Lukas Oppermann - veare.net';
/*
| Copyright
*/
$config['copyright'] = date('Y').' by R2 Felgenveredelung GmbH';
/*
| Keywords (10 Words / Word Groups)
*/
$config['keywords'] = 'R2 Felgenveredelung, Felgen polieren, hochglanzpolieren, Felgenpolitur, Felgenpolierer';
/*
| Description (not more than 150 characters)
*/
$config['description'] = 'R2 Felgenveredelung GmbH Oranienburg -  Ihr Partner im Bereich Felgen polieren, hochglanzpolieren, sowie für Felgenpolierer';
/*
| Robots (all; index, follow; noindex, nofollow)
*/
$config['robots'] = 'index, follow';
/*
|--------------------------------------------------------------------------
| Page Configuration
|--------------------------------------------------------------------------
|
| Site Name (Name of the Webpage, Displayed in the Title)
*/
$config['site_name'] = "R² Felgenveredelung";
/*
| Delimiter (with spaces before and after if you want spaces [title][delimiter][site_name])
*/
$config['delimiter'] = " | ";
/*
| Title (used if there is no title set in the controller)
*/
$config['title'] = "Willkommen bei R² Felgenveredelung GmbH";
/*
| Logo image
*/
$config['logo'] = "logo.png";
/*
| Alternative Text for Logo
*/
$config['logo_alt'] = " - return to homepage";
/*
| Slogan 
*/
$config['slogan'] = "stets zu Diensten";
/*
| Header Graphic 
*/
$config['header_img'] = "header_default.jpg";
/*
|--------------------------------------------------------------------------
| Templates
|--------------------------------------------------------------------------
|
| Default Template Email
*/
$config['template_email_txt_default'] = "email/email_txt";
$config['template_email_html_default'] = "email/email_html";
/*
| Default Template Entry
*/
// $config['template_entry_default'] = "template_entry"; // templates from config are used
/*
| Default Template Page
*/
// $config['template_page_default'] = "template_page"; // templates from config are used
/*
|--------------------------------------------------------------------------
| Data
|--------------------------------------------------------------------------
|
| Default Email Address
*/
$config['email'] = "info@veare.net";
/*
| Email Address for Contact Page & Information
*/
$config['email_contact'] = "info@veare.net";
/*
| Email Address for Proposal Requests
*/
$config['email_request'] = "request@veare.net";
/* End of file resources.php */
/* Location: ./system/application/config/resources.php */