<?php
class Error extends Controller {
 
	function error_404()
	{
		$this->output->set_status_header('404');
		$url = base_url().$this->config->item('language_abbr').$this->config->item('index_menu');
		redirect($url,'refresh');
	}
}