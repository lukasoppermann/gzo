<?php
$this->lang->load('form', $this->config->item('language'));
$this->load->helper('form');
?>
<h1><?=$title ?></h1>

<?php $this->load->view('templates/add_menu'); ?>


<?php $this->load->view('templates/add_page'); ?>