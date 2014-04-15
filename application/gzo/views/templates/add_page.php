<?
echo form_fieldset('Add Page')."\t";
	echo form_open(base_url_lang().'/add',array('id' => 'form', 'class' => 'form'));
		
		$error = form_error('menu_label');
		$class = !empty($error) ? 'error' : '';
		echo form_label('Label');
		echo form_input(array('name'=>'menu_label', 'value'=>set_value('menu_label','menu_label'), 'id'=>'menu_label', 'class'=>$class))."\n\t\t";
		echo form_error('menu_label');
		echo "<br />";

		$error = form_error('menu_path');
		$class = !empty($error) ? 'error' : '';
		echo form_label('Path');
		echo form_input(array('name'=>'menu_path', 'value'=>set_value('menu_path','menu_path'), 'id'=>'menu_path', 'class'=>$class))."\n\t\t";
		echo form_error('menu_path');
		echo "<br />";

		
		echo form_submit('submit',lang('form_submit'))."\n\t\t";

	echo form_close()."\n";
	
echo form_fieldset_close();

?>