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
<!-- r2 gmbh -->
<body<?=$this->data->variable('unique_id') ?>>

<div id="centered">
	<div id="top_menu">
		<ul id="lang_menu">
			<?=alt_site_url('',false)?>
		</ul>
		<!-- <span class="seperator float-right">|</span> -->
		<?=$meta ?>
	</div>
	<div id="header">
			<?=logo('r2_logo.png','home')?>
		<!-- <img class="header_img" src="<?=base_url().$this->config->item('dir_images').(!empty($header_img) ? $header_img : $this->config->item('header_img') ); ?>" alt="image" /> -->
		<div class="slideshow">

		<?php
		$array = array(
			"exklusivrad_02.jpg",
			"exklusivrad_poliert.jpg",
			"felge_1_detail_08.jpg",
			"felge_2_detail_04.jpg",
			"felge_3_detail_02.jpg",
			"felge_3_detail_10.jpg",
			"felge_4_detail_02.jpg",
			"felge_5_detail_08.jpg",
			"felge_5_detail_09.jpg",
			"felge_5_detail_14.jpg",
			"felge_5_detail_15.jpg",
			"felge_6_detail_07.jpg",
			"felge_7_detail_09.jpg",
			"felge_7_detail_91.jpg",
			"felgendetail_8062.jpg",
			"felgenkollektion.jpg"
			);
			shuffle($array);
		foreach($array as $id => $item)
		{
			echo '<img src="http://www.r2-gmbh.com/media/images/slideshow/'.$item.'" width="950" height="350" alt="r2 gmbh - '.$item.'">';
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
							<?=$navigation ?>
 					</div>
					<div id="main_content">
