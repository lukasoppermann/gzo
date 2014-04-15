<?php
	echo form_fieldset('Contact')."\t";


		echo form_open(current_url(),array('id' => 'form', 'class' => 'contact_form'));
		echo "<br />";

		$error = form_error('name');
		$class = !empty($error) ? 'error' : '';
		echo form_label(lang('form_name'), 'name');
		echo form_input(array('name'=>'name', 'value'=>set_value('name'), 'id'=>'name', 'class'=>$class))."\n\t\t";
		echo form_error('name');
		echo "<br />";
		
		$error = form_error('email');
		$class = !empty($error) ? 'error' : '';
		echo form_label(lang('form_email'), 'email');
		echo form_input(array('name'=>'email', 'value'=>set_value('email'), 'id'=>'email', 'class'=>$class))."\n\t\t";
		echo form_error('email');
		echo "<br />";

		$error = form_error('subject');
		$class = !empty($error) ? 'error' : '';
		echo form_label(lang('form_subject'), 'subject');
		echo form_input(array('name'=>'subject', 'value'=>set_value('subject'), 'id'=>'subject', 'class'=>$class))."\n\t\t";
		echo form_error('subject');
		echo "<br />";

		$error = form_error('message');
		$class = !empty($error) ? 'error' : '';
		echo form_label(lang('form_message'), 'message');
		echo form_textarea(array('name'=>'message', 'value'=>set_value('message'), 'id'=>'message', 'class'=>$class))."\n\t\t";
		echo form_error('message');
		echo "<br />";

		echo form_submit('submit',lang('form_submit'))."\n\t\t";

	echo form_close()."\n";

echo form_fieldset_close();
?>