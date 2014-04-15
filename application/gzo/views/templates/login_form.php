<?php
$config = $this->config->item('auth');
echo form_fieldset('Login')."\t";
	echo form_open(base_url_lang(TRUE).$config['url_login'],array('id' => 'login_form', 'class' => 'form'));
		
		$error = form_error('user');
		$class = !empty($error) ? 'error' : '';
		echo "<div class='label'>";
		echo form_label(lang('form_username'), 'user');
		echo "</div>";
		echo "<div class='input'>";
		echo form_input(array('name'=>$config['user'], 'value'=>set_value('user',lang('form_username')), 'id'=>'user', 'class'=>$class))."\n\t\t";
		echo "</div>";
		echo form_error('user');
		echo "<br />";

		$error = form_error('password');
		$class = !empty($error) ? 'error' : '';
		echo "<div class='label'>";
		echo form_label(lang('form_password'), 'password');
		echo "</div>";
		echo "<div class='input'>";
		echo form_password(array('name'=>'password', 'value'=>set_value('password',lang('form_password')), 'id'=>'password', 'class'=>$class))."\n\t\t";
		echo "</div>";
		echo form_error('password');
		echo "<br />";

		echo "<div class='label-checkbox'>";
		echo form_label(lang('form_login_remember'), 'remember');
		echo form_checkbox(array('name' => 'remember', 'id' => 'remember', 'value' => TRUE, 'checked' => TRUE));
		echo "</div>";
		
		echo form_submit('submit',lang('form_submit'))."\n\t\t";

	echo form_close()."\n";
	
echo form_fieldset_close();
?>
