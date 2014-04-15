<?php
$this->lang->load('form', $this->config->item('language'));
$this->load->helper('form');
?>
<?=$content ?>
<?php $this->load->view('templates/login_form'); ?>