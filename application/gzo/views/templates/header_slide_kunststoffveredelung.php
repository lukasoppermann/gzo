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
		$array = array(
			'sam_0756.jpg',
			'sam_0771.jpg',
			'sam_0774.jpg',
			'sam_0776.jpg',
			'sam_0780.jpg',
			'sam_0782.jpg',
			'sam_0789.jpg',
			'sam_0793.jpg',
			'kunststoffbearbeitung.jpg'
			);
			shuffle($array);
		foreach($array as $id => $item)
		{
			echo '<img src="http://www.gzo-gmbh.com/media/images/slideshow/'.$item.'" width="950" height="350" alt="gzo oberflächentechnik - '.$item.'">';
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
