<div class="vcard">
	<?php echo (!empty($photo) ? $photo.'<br />'."\n": ''); ?>
	<div class="fn n">
		<?php echo $firstname.' '.$lastname?>
	</div>
		<?php echo (!empty($org) ? $org.'<br />'."\n": ''); ?>
		<?php echo (!empty($website) ? $website.'<br />'."\n": ''); ?>
		<?php echo (!empty($email) ? encrypt_email($email).'<br />'."\n": ''); ?>
		<?php echo (!empty($mobile_phone) ? $mobile_phone."\n": ''); ?>
		<?php echo (!empty($work_phone) ? $work_phone."\n": ''); ?>
		<?php echo (!empty($fax) ? $fax."\n": ''); ?>
	<div class="adr">
		<?php echo (!empty($type) ? $type.'<br />'."\n" : ''); ?>
		<a href="http://maps.google.com/maps?q=
		<?php echo str_replace(' ','+',(!empty($street_plain) ? $street_plain:'').','.(!empty($zip_plain) ? $zip_plain:'').','.(!empty($city_plain) ? $city_plain:'').','.(!empty($country_plain) ? $country_plain:'').'('.(!empty($org_plain) ? $org_plain:'').')'); ?>">
			<?php echo (!empty($street) ? $street.'<br />'."\n" : ''); ?>	
			<?php echo (!empty($zip) ? $zip.'<br />'."\n": ''); ?>	
			<?php echo (!empty($city) ? $city.'<br />'."\n": ''); ?>	
			<?php echo (!empty($region) ? $region.'<br />'."\n": ''); ?>	
			<?php echo (!empty($country) ? $country.'<br />'."\n": ''); ?>	
		</a>
	</div>
</div>
