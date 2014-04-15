<?=doctype('xhtml'); ?>
<head>	
	<?=meta_tag(); ?>
  	<?=favicon('media/layout/favicon.ico','media/layout/iphone_icon.png'); ?>
	<?=$this->stylesheet->output(FALSE); ?>	
	<?=title($title); ?> 
	<!-- include jQuery library -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<!-- include Cycle plugin -->
	<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script>
	<style type="text/css">
	.slideshow { 
		overflow: hidden;
		height: 350px;
		width: 950px;
		margin: 0px 0px 0px 0px; 
	}
/*	.slideshow img { top: 5px;}*/
	</style>
	<script type="text/javascript">
	$(document).ready(function() {
	    $('#header .slideshow').cycle({
			fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
			speed:         2000,  // speed of the transition (any valid fx speed value) 
	 		timeout:       5000  // milliseconds between slide transitions (0 to disable auto advance) 		
		});
	});
	</script>
</head>
<body<?=$this->data->variable('unique_id') ?>>
<div id='bg_bottom'>
	<div id="logo_lines">
<div id="centered">
	<?=logo('gzo_logo.png','home')?>
	<div id="top_menu">
		<ul id="lang_menu">
			<?=alt_site_url('',false)?>
		</ul>
		<!-- SLIDE -->
		<?=$meta ?>
	</div>
	<div id="header">
		<!-- <img src="<?=base_url().$this->config->item('dir_images').(!empty($header_img) ? $header_img : $this->config->item('header_img') ); ?>" alt="image" /> -->
		<div class="slideshow">
		
		<?php
		if(substr(current_url(),-10) == 'highlights')
		{
			$CI = &get_instance();
			$CI->load->helper("file");
			
			$slideshow = '/media/images/iaa-2011-slideshow/';
			
			foreach(get_filenames('.'.$slideshow) as $file)
			{
				if(substr($file,-4) == '.jpg')
				{
					$array[] = $file;
				}
			}
			
			shuffle($array);

			foreach($array as $id => $item)
			{
				echo '<img src="'.base_url().$slideshow.$item.'" width="950" height="350" alt="r2 gmbh - '.$item.'">';
			}
		}
		else
		{
		$array = array(
			'01_Brillen_8132.jpg',
			'02_Brillenbuegel_8148.jpg',
			'03_Gussteile_8117.jpg',
			'04_Haefele_Gussteile_8101.jpg',
			'05_Kontaktteilchen_8112.jpg',
			'06_Minifix_8098.jpg',
			'07_Rohlinge_8110.jpg',
			'08_Schleifkoerper_8104.jpg',
			'09_Schleifkoerper_8108.jpg',
			'10_Schleifkoerpermix_8093.jpg',
			'11_Druckscheiben-02.jpg',
			'12_Griffe-01.jpg',
			'13_Implantate-02.jpg',
			'14_Lochmesser-05.jpg',
			'16_Med-Instrumente-01.jpg',
			'17_Moebelknopf-01.jpg',
			'18_Ampelmaenchen 150748.jpg',
			'19_brille_140674.jpg',
			'20_Griffe_140625.jpg',
			'21_Hueftgelenk_140646.jpg',
			'22_Huelsen_140628.jpg',
			'23_Knie_140645.jpg',
			'24_Nockenwelle_140723.jpg'
			);
			shuffle($array);
			foreach($array as $id => $item)
			{
				echo '<img src="http://www.gzo-gmbh.com/media/images/slideshow/'.$item.'" width="950" height="350" alt="gzo oberflächentechnik - '.$item.'">';
			}
		}
		?>

		</div>
	</div>
		<div id="container">	
			<div id="content_top">
			</div>
			<div id="content">
				<div id="content_container">
					<div id="sidebar">
						<div id="sidebar_inner">
							<?=$navigation ?>
							<?//=search() ?>	
						</div>
					</div>
					<div id="main_content">
