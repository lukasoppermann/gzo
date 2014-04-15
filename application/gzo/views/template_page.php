<?php
$CI = &get_instance();
$url = $CI->uri->segment_array();
$array = array('home', 'qualitaet', 'strahltechnik','gleitschleiftechnik');

if(in_array($url[1], $array))
{
	$this->load->view('templates/header_slide');	
}
elseif($url[1] == 'felgenveredelung')
{
	$this->load->view('templates/header_slide_felgen');	
}
elseif($url[1] == 'kunststoffveredelung')
{
	$this->load->view('templates/header_slide_kunststoffveredelung');	
}
else
{
	$this->load->view('templates/header');	
}

?>


<h2><?=$title ?></h2>
<?=$content ?>

<?php $this->load->view('templates/footer'); ?>