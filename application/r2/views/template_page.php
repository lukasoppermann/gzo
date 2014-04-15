<?php
$CI = &get_instance();
$url = $CI->uri->segment_array();
$array = array('qualitaet', 'home', 'dienstleistung');

if(in_array($url[1], $array))
{
	$this->load->view('templates/header_slide');	
}
else
{
	$this->load->view('templates/header');	
}

?>
<h2><?=$title ?></h2>
<?=$content ?>

<?php $this->load->view('templates/footer'); ?>